<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $user = User::where('email',$request->email)->first();

        if($user && Hash::make($request->password,[$user->getAuthPassword()])){
            return [
                'token' => $user->createToken(time())->plainTextToken
            ];
        }else {
            return response()->json([
                'message' => 'these credentials do not match our records.'
            ],401);
        }
    }
}
