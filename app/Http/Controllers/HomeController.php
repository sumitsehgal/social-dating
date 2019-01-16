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
    public function index()
    {
        $this->middleware('auth');
        $loggedUser = Auth::user();
        $users = User::whereNotIn('id', [$loggedUser->id])->get();
        //dd($users);
        return view('home', compact('users'));
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
        $onlineMale = User::where('gender', User::MALE_GENDER)
                            ->where('lastActivity', '>=', User::ONLINE_TIME_WINDOW)
                            ->count();
        $onlineFemale = User::where('gender', User::FEMALE_GENDER)
                            ->where('lastActivity', '>=', User::ONLINE_TIME_WINDOW)
                            ->count();
        return view('welcome', compact('plans', 'users', 'onlineMale', 'onlineFemale'));
    }

    public function about()
    {
        return view('about');
    }
}
