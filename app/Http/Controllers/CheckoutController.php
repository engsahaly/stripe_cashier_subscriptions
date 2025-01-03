<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Plan $plan)
    {
        // $query = Auth::user()->newSubscription($plan->slug, $plan->stripe_price_id );
        // return $query->when($plan->slug == 'monthly-plan', function () use ($query) {
        //     return $query->trialDays(7);
        // })

        if ($plan->slug == 'lifetime-plan') {
            return $this->checkoutLifetimeMembership();
        }
        
        return Auth::user()->newSubscription($plan->slug, $plan->stripe_price_id )
        ->checkout([
            'success_url' => route('home', ['message' => 'Subscribed Successfully']),
            'cancel_url' => route('plans'),
        ]);
    }

    public function checkoutLifetimeMembership()
    {
        $price = Plan::firstWhere('slug', 'lifetime-plan')->stripe_price_id;
        return Auth::user()
        ->checkout($price, [
            'success_url' => route('home').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('plans'),
        ]);
    }

    public function index2(Plan $plan)
    {
        return view('checkout.payment-method', get_defined_vars());
    }

    public function post(Request $request)
    {
        $plan = Plan::findOrFail($request->plan_id);
        $subscription =Auth::user()->newSubscription($plan->slug, $plan->stripe_price_id )->create($request->payment_method);
        if ($subscription->stripe_status == 'active') {
            return redirect()->route('home', ['message'=> 'Subscribed Successfully']);
        }
    }
}
