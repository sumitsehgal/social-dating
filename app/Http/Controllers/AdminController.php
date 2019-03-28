<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function dashboard()
    {

        $users = User::orderBy('id','DESC')->paginate();
        $loggedUser = Auth::user();
        $userId = isset($loggedUser->id) ? $loggedUser->id : null;

        $currentAt =  \Carbon\Carbon::now()->subMinutes(User::ONLINE_TIME_WINDOW);

        $onlineMale = User::where('gender', User::MALE_GENDER)
                            ->where('lastActivity', '>=', $currentAt);
        if($loggedUser)
            $onlineMale->whereNotIn('id', [$userId]);
        $onlineMale = $onlineMale->count();
        $onlineFemale = User::where('gender', User::FEMALE_GENDER)
                            ->where('lastActivity', '>=', $currentAt);
        if($loggedUser)
            $onlineFemale->whereNotIn('id', [$userId]);
        $onlineFemale = $onlineFemale->count();

        return view('admin.dashboard', compact( 'onlineMale', 'onlineFemale', 'users'));
    }

    public function getUsers(Request $request, $slug = 'all')
    {
        $users = User::orderBy('id','DESC');
        $loggedUser = Auth::user();
        $userId = isset($loggedUser->id) ? $loggedUser->id : null;
        $currentAt =  \Carbon\Carbon::now()->subMinutes(User::ONLINE_TIME_WINDOW);
        switch($slug)
        {
            case 'online':
                $users->where('lastActivity', '>=', $currentAt)->whereNotIn('id', [$userId]);
            break;
            case 'male':
                $users->where('gender', User::MALE_GENDER)->where('lastActivity', '>=', $currentAt)->whereNotIn('id', [$userId]);
            break;
            case 'female':
                $users->where('gender', User::FEMALE_GENDER)->where('lastActivity', '>=', $currentAt)->whereNotIn('id', [$userId]);
            break;
        }

        $users = $users->paginate();

        return view('admin.users', compact( 'users'));

    }
}
