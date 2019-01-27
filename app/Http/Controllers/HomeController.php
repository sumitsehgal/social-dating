<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Plan;
use Carbon\Carbon;  
use App\Mail\Contacts;
use Illuminate\Support\Facades\Mail;
use Session;

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
        $currentAt =  \Carbon\Carbon::now()->subMinutes(User::ONLINE_TIME_WINDOW);
        $activeUsers = User::whereNotIn('id', [$loggedUser->id])->where('lastActivity', '>=', $currentAt)->limit(12)->get();
        $pendingRequests = $loggedUser->getFriendRequests();

        return view('home', compact('users', 'activeUsers', 'allUsers', 'pendingRequests'));
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

    public function postContact(Request $request)
    {
        $mail = Mail::to('theprofessional1992@gmail.com')->send(new Contacts($request));
        // if(!$mail)
        // {
        //     Session::flash('message', 'There is some internal Problem. Please try again.'); 
        //     Session::flash('alert-class', 'alert-danger');
        //     return view('contact');    
        // }
        Session::flash('message', 'Thank you for Contacting. We will contact you soon.'); 
        Session::flash('alert-class', 'alert-success');
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
    
        return view('welcome', compact('plans', 'users', 'onlineMale', 'onlineFemale'));
    }

    public function about()
    {
        return view('about');
    }
}
