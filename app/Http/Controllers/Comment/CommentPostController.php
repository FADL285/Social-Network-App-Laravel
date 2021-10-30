<?php

namespace App\Http\Controllers\Comment;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;

class CommentPostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Post $post)
    {
        return CommentResource::collection(Comment::where('post_id',$post->id)->get());
    }
}
