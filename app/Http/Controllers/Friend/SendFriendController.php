<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Friend\FriendRequest;
use App\Models\Friend;
use Illuminate\Http\Request;

class SendFriendController extends Controller
{
    public function __invoke(FriendRequest $request)
    {

        $friend = Friend::where('user_id',auth()->id())
                ->where('friend_id',$request->friend_id)
                ->orWhere('user_id',$request->friend_id)
                ->where('friend_id',auth()->id())
                ->first();

        if($friend){
            return response()->json([
                'message' => 'Friend Request Sent Before',
            ],403);
        }else {
            Friend::create([
                'user_id' => auth()->id(),
                'friend_id' => $request->friend_id,
            ]);
    
            return [
                'message' => 'Friend Request Sent Successfully'
            ];
        }
    }
}
