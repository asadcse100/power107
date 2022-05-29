<?php

namespace App\Models\Trading;

use Illuminate\Database\Eloquent\Model;

class TradingUser extends Model
{
    //
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function trading_payments()
    {
      return $this->hasMany(TradingPayment::class)->orderBy('created_at', 'desc')->paginate(12);
    }
}
