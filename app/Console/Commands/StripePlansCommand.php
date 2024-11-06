<?php

namespace App\Console\Commands;

use App\Models\Plan;
use Illuminate\Console\Command;
use Log;

class StripePlansCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stripe:plans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stripe Plans';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $plans = $stripe->products->all();
        foreach ($plans->data as $plan) {
            $price = $stripe->prices->retrieve($plan->default_price, []);
            Plan::updateOrCreate(['name' => $plan->name], [
                'price' => $price->unit_amount,
                'stripe_price_id' => $price->id,
                'interval' => $price->recurring->interval,
            ]);
        }
    }
}
