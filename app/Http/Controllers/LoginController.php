<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;

class LoginController extends Controller
{
    public function login(LoginRequest $request) {

        $user = Auth::user();
        $token = $user->createToken('authToken');

        return new LoginResource($token);
    }

}
