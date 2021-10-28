<?php

namespace App\Http\Controllers\Friend;

use App\Models\Friend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Friend\FriendRequest;

class AcceptFriendController extends Controller
{
    public function __invoke(FriendRequest $request)
    {
        $friend = Friend::where('user_id',$request->friend_id)
                ->where('friend_id',auth()->id())
                ->where('accepted','!=',1)
                ->first();

        if($friend){
            $friend->update([
                'accepted' => true,
            ]);

            return [
                'message' => 'Friend Request Accepted Successfully',
            ];
        }else {
            return response()->json([
                'message' => 'Not Found',
            ],404);
        }
    }
}
