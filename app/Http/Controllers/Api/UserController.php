<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userLogin(Request $request)
    {

        $credentials = ApiValidate::login($request, User::class);
        // $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = User::find(Auth::guard('web')->user()->id);
            // $user->firebase_token = $request->firebase_token;
            $user->save();
            return Api::setResponse('user', $user->withToken());
        } else {
            return Api::setError('Invalid credentials');
        }
    }
}
