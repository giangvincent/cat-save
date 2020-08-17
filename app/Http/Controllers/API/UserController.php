<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Carbon\Carbon;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public $successStatus = 200;
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Login api
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $afterLogin['token'] = $user->createToken($user->name)->accessToken;
            return response()->json(['success' => $afterLogin], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    /**
     * Register Api
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:191',
            'password' => 'required|max:191',
            'c_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->error()], 401);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->sendEmailVerificationNotification();
        Auth::login($user);
        $afterRegister['token'] = $user->createToken($user->name)->accessToken;

        return response()->json(['success' => $afterRegister], $this->successStatus);
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }

    /**
     * @param  $provider
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginByProvider(Request $request, $provider)
    {
        if ($provider == 'google') {
            return $this->checkGoogle($request->social_token);
        }

        if ($provider == 'facebook') {
            return $this->checkFacebook($request->social_token);
        }
    }

    /**
     * @param String $social_token
     * @return void
     */
    public function checkGoogle($social_token)
    {
        try {
            $checkToken = $this->client->get("https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=$social_token");
            $responseGoogle = json_decode($checkToken->getBody()->getContents(), true);

            return $this->checkUserByEmail($responseGoogle);
        } catch (\Exception $e) {
            return $this->responseBadRequest(['message' => $e->getMessage()]);
        }
    }

    /**
     * @param String $social_token
     * @return void
     */
    public function checkFacebook($social_token)
    {
        try {
            $checkToken = $this->client->get("https://graph.facebook.com/v3.1/me?fields=id,name,email&access_token=$social_token");
            $responseFacebook = json_decode($checkToken->getBody()->getContents(), true);

            return $this->checkUserByEmail($responseFacebook);
        } catch (\Exception $e) {
            return $this->responseBadRequest(['message' => $e->getMessage()]);
        }
    }

    /**
     * @param $profile
     * @return void
     */
    public function checkUserByEmail($profile)
    {
        $user = User::where('email', $profile['email'])->first();
        if (!$user) {
            $user = User::create([
                'name' => $profile['name'],
                'email' => $profile['email'],
                'password' => bcrypt(str_random(8)),
            ]);
        }

        $user->forceFill([
            'verified' => true,
            'email' => $user['email'],
            'email_verified_at' => Carbon::now(),
        ])->save();
        $tokenResult = $user->createToken('Personal Access Client');
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addMonth();
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
}
