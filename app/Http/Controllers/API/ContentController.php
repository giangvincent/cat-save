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
    public function createContent()
    {
        $this->contentData['title'] = $input['title'];
        $this->contentData['images'] = array();

        $input = $request->all();
        foreach ($image as $input['images']) {
            $imageCreate = Image::make($image);
            $imagePath = public_path(). 'contents/' . uniqid(rand()) . '.jpg';
            $imageCreate->save($imagePath);
            ImageOptimizer::optimize($imagePath);
            array_push($this->contentData['images'], $imagePath);
        }
        
        $this->contentData['slug'] = Str::slug($input['title'], '-');
        $this->contentData['hashtags'] = implode($input['tags'], ",");
        $this->contentData['author_id'] = Auth::user()->id;
        $this->contentData['common_key'] = isset($input['common_key']) ? $input['common_key'] : uniqid(rand());
        $this->contentData['cat_id'] = $input['cat_id'];

        $contentDb = Content::create($this->contentData);
        $this->createTags($input['tags'], $contentDb);
        return response()->json(['success' => 200]);
    }

    public function createTags($tags, $contentDb)
    {
        foreach ($tag as $tags) {
            $tagDB = Tag::create([
                'name' => $tag,
                'slug' => Str::slug($tag, '-'),
            ]);
            $contentDb->tags()->attach($tagDB);
        }
    }
}
