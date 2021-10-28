<?php

namespace App\Http\Controllers\Friend;

use App\Models\Friend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Friend\FriendRequest;

class UnFriendController extends Controller
{
    public function __invoke(FriendRequest $request)
    {
        $friend = Friend::where('user_id',auth()->id())
                    ->where('friend_id',$request->friend_id)
                    ->where('accepted',1)
                    ->orWhere('user_id',$request->friend)
                    ->where('friend_id',auth()->id())
                    ->where('accepted',1)
                    ->first();
        if($friend){
            $friend->delete();
        }else {
            return response()->json([
                'message' => 'Not Found'
            ],404);
        }

    }
}
