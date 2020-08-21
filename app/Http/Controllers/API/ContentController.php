<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Models\Content;
use App\Models\Category;
use App\Models\Tag;

use Validator;
use Carbon\Carbon;
use ImageOptimizer;

class ContentController extends Controller
{
    public $contentData = array();
    public function createContent(Request $request)
    {
        $input = $request->all();
        $this->contentData['title'] = $input['title'];
        $this->contentData['images'] = array();

        foreach ($input['images'] as $image) {
            $imageCreate = \Image::make($image);
            $imageName =  uniqid(rand()) . '.jpg';
            $imagePath = 'upload/contents/' . $imageName;
            $imageCreate->save(public_path('upload'). '/contents/' . $imageName);
            ImageOptimizer::optimize(public_path('upload'). '/contents/' . $imageName);
            array_push($this->contentData['images'], $imagePath);
        }
        
        $this->contentData['slug'] = Str::slug($input['title'], '-');
        $this->contentData['hashtags'] = json_encode($input['tags']);
        $this->contentData['images'] = json_encode($this->contentData['images']);
        $this->contentData['author_id'] = Auth::user()->id;
        $this->contentData['common_key'] = isset($input['common_key']) ? $input['common_key'] : uniqid(rand());
        $this->contentData['cat_id'] = $input['cat_id'];

        $contentDb = Content::create($this->contentData);
        $this->createTags($input['tags'], $contentDb);
        return response()->json(['success' => 200]);
    }

    public function createTags($tags, $contentDb)
    {
        foreach ($tags as $tag) {
            $tagDB = Tag::updateOrCreate([
                'name' => $tag,
                'slug' => Str::slug($tag, '-'),
            ]);
            $contentDb->tags()->attach($tagDB);
        }
    }

    public function getContents()
    {
        $contents = array();
        Content::where('status', 'publish')
            ->orderBy('id', 'desc')
            ->chunk(100, function ($content) use (&$contents) {
                if ($content) {
                    // array_push($contents, $content);
                    $contents = $content;
                }
            });
        return response()->json($contents, 200);
    }
}
