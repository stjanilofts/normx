<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function postLogin(Request $request)
    {
        //Auth::logout();

        if($request->ajax()) {
            if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
                // Authentication passed...
                return response()->json(['success'=>1], 200);
            } else {
                return response()->json(['success'=>0], 200);
            }
        }
    }

    public function getLogout(Request $request)
    {
        Auth::logout();

        return redirect()->to('/');
    }
}