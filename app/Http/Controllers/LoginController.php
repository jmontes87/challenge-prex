<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;


class LoginController extends Controller
{

    /**
     * login
     *
     * @responseFile storage/responses/login.get.json
     *
     * @param  \App\Http\Requests\LoginRequest  $request The login request.
     * @return \App\Http\Resources\LoginResource The login resource containing the generated token.
     */
    public function login(LoginRequest $request) {

        $user = Auth::user();
        $token = $user->createToken('authToken');
        return new LoginResource($token);
    }

}
