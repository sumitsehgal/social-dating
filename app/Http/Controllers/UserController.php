<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function checkEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user && !empty($user))
        {
            return response()->json([
                'response'=>false
            ]);
        }else
        {
            return response()->json([
                'response'=>true
            ]);
        }
        exit;
    }
}
