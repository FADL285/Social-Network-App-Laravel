<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Models\Like;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $liked  = Like::where('user_id',auth()->id())->where('post_id',$this->id)->first() ? true:false;

        return [
            'id' => $this->id,
            'body' => $this->body,
            'image' => $this->image,
            'liked' => $liked,
            'likes' => $this->likes()->count(),
            'comments' => CommentResource::collection($this->comments),
            'user' => new UserResource($this->user),
            'created_at' => Carbon::parse($this->created_at)->diffForHumans()
        ];
    }
}
