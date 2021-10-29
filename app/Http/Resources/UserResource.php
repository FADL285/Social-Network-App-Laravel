<?php

namespace App\Http\Resources;

use App\Models\Friend;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $friend_request = Friend::where('user_id',$this->id)->where('friend_id',auth()->id())->where('accepted',0)->first() ? true:false;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'friend_request_exists' => $friend_request,
            'friends' => UserResource::collection($this->friends),
        ];
    }
}
