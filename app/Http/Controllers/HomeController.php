<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Plan;
use Carbon\Carbon;  

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->middleware('auth');
        $loggedUser = Auth::user();
        $allUsers = User::whereNotIn('id', [$loggedUser->id])->paginate(12);
        if ($request->ajax()) 
        {
            $view = view('elements.singleuser', compact('allUsers'))->render();
            return response()->json(['html'=>$view]);
        }

        $users = User::whereNotIn('id', [$loggedUser->id])->get();
        $activeUsers = User::whereNotIn('id', [$loggedUser->id])->where('lastActivity', '>=', User::ONLINE_TIME_WINDOW)->limit(12)->get();
        return view('home', compact('users', 'activeUsers', 'allUsers'));
    }

    public function allUsers()
    {
        $this->middleware('auth');
        $loggedUser = Auth::user();
        $allUsers = User::whereNotIn('id', [$loggedUser->id])->paginate(12);
        return view('allusers', compact('allUsers'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function memberships()
    {
        $this->middleware('auth');
        $plans = Plan::all();
        return view('memberships', compact('plans'));
    }

    public function welcome()
    {
        $plans = Plan::all();
        $users = User::paginate();
        $loggedUser = Auth::user();
        $userId = isset($loggedUser->id) ? $loggedUser->id : null;
        $onlineMale = User::where('gender', User::MALE_GENDER)
                            ->where('lastActivity', '>=', User::ONLINE_TIME_WINDOW);
        if($loggedUser)
            $onlineMale->whereNotIn('id', [$userId]);
        $onlineMale = $onlineMale->count();
        $onlineFemale = User::where('gender', User::FEMALE_GENDER)
                            ->where('lastActivity', '>=', User::ONLINE_TIME_WINDOW);
        if($loggedUser)
            $onlineFemale->whereNotIn('id', [$userId]);
        $onlineFemale = $onlineFemale->count();
    
        return view('welcome', compact('plans', 'users', 'onlineMale', 'onlineFemale'));
    }

    public function about()
    {
        return view('about');
    }
}
