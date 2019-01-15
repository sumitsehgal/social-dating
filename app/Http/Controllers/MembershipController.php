<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Plan;
use Session;

class MembershipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function upgrade(Request $request, $planId)
    {
        $plan = Plan::where('stripe_plan_id',$planId)->first();
        if(!$plan)
            return abort(404);
        return view('memberships.upgrade', compact('plan'));
    }

    public function postUpgrade(Request $request, $planId)
    {
        $plan = Plan::where('stripe_plan_id',$planId)->first();
        // TODO Validation Pending
        \Stripe\Stripe::setApiKey("pk_test_NnuiwSp0c3X7JGfPhmF1yMeV");
    	$response = \Stripe\Token::create(array(
		  "card" => array(
		    "number"    => $request->cardnumber,
		    "exp_month" => $request->expmonth,
		    "exp_year"  => $request->expyear,
		    "cvc"       => $request->cvv,
		    "name"      => $request->name
		)));
        if(isset($response->id) && !empty($response->id))
        {
            $stripeToken = $response->id;
            $user = Auth::user();
            // TODO Already Check -> If Exist then Swap to the Higher
            $response = $user->newSubscription($plan->title, $planId)->create($stripeToken);
            if($response)
            {
                Session::flash('message', 'Thank you for Subscribing.'); 
                return view('memberships.upgrade', compact('plan')); 
            }
        }
    	
    }
}
