<?php

namespace App\Http\Controllers\Like;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Like\LikeRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class LikeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(LikeRequest $request)
    {
        $like = Like::where('user_id',auth()->id())->where('post_id',$request->post_id)->first();

        if($like){
            $like->delete();

            return new PostResource(Post::find($request->post_id));
        }else {
            Like::create([
                'user_id' => auth()->id(),
                'post_id' => $request->post_id,
            ]);

            return new PostResource(Post::find($request->post_id));
        }

    }
}
