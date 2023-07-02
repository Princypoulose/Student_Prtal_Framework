<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TokenController extends Controller
{
    public function setToken(Request $request) {
        $accessToken = $request->input('accessToken');
        $refreshToken = $request->input('refreshToken');

        // set cookie for 1 hour
        Cookie::queue(Cookie::make('accessToken', $accessToken, 60));
        Cookie::queue(Cookie::make('refreshToken', $refreshToken, 60));

        return response()->json(['message' => 'Tokens stored in cookies']);
    }
}
