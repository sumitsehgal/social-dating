<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;

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

    public function userDetails(Request $request, $id)
    {
        $user = User::find($id);
        $currentUser = User::find(Auth::user()->id);
        return view('users.details', compact('user', 'currentUser'));
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('users.profile', compact('user'));
    }

    public function postProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = $user->my_validate($request->all());
        $user->fill($data);
        $user->save();
        //$user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        if(!empty($request->get('file')))
            $user->addMediaFromRequest('file')->toMediaCollection('avatars');

        if(empty($user->profile))
        {
            $profile = new Profile();
            $user->profile()->save($profile);
            $user = User::find(Auth::user()->id);
        } 
        $user->profile->fill($request->all());
        $user->profile->save();

        return redirect('/user/'.Auth::user()->id);

    }

    public function addFriend(Request $request, $id)
    {
        $user = User::find(Auth::user()->id);
        $recipient = User::find($id);
        if($recipient)
        {
            $user->befriend($recipient);
            return response()->json([
                'status' => true,
                'message' => 'Friend Request Sent'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Internal Server Problem'
        ]);

    }

    public function removeFriend(Request $request, $id)
    {
        $user = User::find(Auth::user()->id);
        $recipient = User::find($id);
        if($recipient)
        {
            $user->unfriend($recipient);
            return response()->json([
                'status' => true,
                'message' => 'Cancelled Friend Request'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Internal Server Problem'
        ]);

    }

    public function acceptFriend(Request $request, $id)
    {
        $user = User::find(Auth::user()->id);
        $recipient = User::find($id);
        if($recipient)
        {
            $user->acceptFriendRequest($recipient);
            return response()->json([
                'status' => true,
                'message' => 'Accepted'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Internal Server Problem'
        ]);

    }

    public function declineFriend(Request $request, $id)
    {
        $user = User::find(Auth::user()->id);
        $recipient = User::find($id);
        if($recipient)
        {
            $user->denyFriendRequest($recipient);
            return response()->json([
                'status' => true,
                'message' => 'Denied'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Internal Server Problem'
        ]);
        
    }

}
