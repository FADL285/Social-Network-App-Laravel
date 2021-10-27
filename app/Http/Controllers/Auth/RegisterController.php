<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Image;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => Image::store('avatar'),
        ]);

        return [
            'token' => $user->createToken(time())->plainTextToken
        ];
    }
}
