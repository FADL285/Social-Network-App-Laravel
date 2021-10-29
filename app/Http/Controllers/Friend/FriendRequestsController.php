<?php

namespace App\Http\Controllers\Friend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class FriendRequestsController extends Controller
{
    public function __invoke()
    {
        $users = User::whereHas('friends_requests',function ($q){
            $q->where('friend_id',auth()->id());
        })->get();

        return UserResource::collection($users);
    }
}
