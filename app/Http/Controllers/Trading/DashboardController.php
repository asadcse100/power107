<?php

namespace App\Http\Controllers\Trading;

use App\Http\Controllers\Controller;
use App\Models\Trading\TradingProduct;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{

    public function market()
    {
        return view('trade.market');
    }

    public function level()
    {
        $data['title'] = __('Sellar profile | Sellar Level');
        $data['level'] = User::getLevel();
        //dd($data);        
        return view('trade.level.sellar_level', $data);
    }

    public function role()
    {
        $data['title'] = __('Sellar Role | Sellar Price Category');
        return view('ecom.sellers.upgrade.role', $data);
    }

    public function trading($id = NULL)
    {
        $data = TradingProduct::liveTrade($id);
        $data['title'] = __('Online Trading | Product Trading');
        return view('trade.layouts.new.trading', $data);
    }
}
