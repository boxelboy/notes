<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials, true)) {
            $status = true;
            session(['user' => Auth::user()]);
        } else {
            $status = false;
        }
        return response()->json(['status' => $status]);

    }
}