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
        \Stripe\Stripe::setApiKey(config("services.stripe.key"));
        try
        {
            $response = \Stripe\Token::create(array(
            "card" => array(
                "number"    => $request->cardnumber,
                "exp_month" => $request->expmonth,
                "exp_year"  => $request->expyear,
                "cvc"       => $request->cvv,
                "name"      => $request->name
            )));
        }catch(\Stripe\Error\Base $e)
        {
            $body = $e->getJsonBody();
            $err  = $body['error'];
            $message = !empty($err['message']) ? $err['message'] : "Your Details are Incorrect";
            Session::flash('message', $message);
            Session::flash('alert-class', 'alert-danger'); 
            return view('memberships.upgrade', compact('plan')); 
        }
        if(isset($response->id) && !empty($response->id))
        {
            $stripeToken = $response->id;
            $user = Auth::user();
            // TODO Already Check -> If Exist then Swap to the Higher
            if($user->subscribed())
            {
                $response = $user->subscription($plan->title)->swap();
            }
            else
            {
                $response = $user->newSubscription($plan->title, $planId)->create($stripeToken);
            }
            if($response)
            {
                Session::flash('message', 'Thank you for Subscribing.'); 
                Session::flash('alert-class', 'alert-success');
                return view('memberships.upgrade', compact('plan')); 
            }
        }
    	
    }
}
