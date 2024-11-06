<?php

namespace App\Models;

use Laravel\Cashier\Cashier;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $guarded = [];

    public function price()
    {
        return Cashier::formatAmount($this->price, env('CASHIER_CURRENCY', 'usd'));
    }
}
