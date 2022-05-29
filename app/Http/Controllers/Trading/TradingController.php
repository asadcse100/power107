<?php

namespace App\Http\Controllers\Trading;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trading\TradingOption;
use App\Models\Addon;
use App\Models\Order;
use App\Models\BusinessSetting;
use App\Models\Trading\TradingConfig;
use App\Models\Trading\TradingUser;
use App\Models\Trading\TradingPayment;
use App\Models\Trading\TradingEarningDetail;
use App\Models\User;
use App\Models\Customer;
use App\Models\Category;
use Session;
use Cookie;
use Auth;
use Hash;

class TradingController extends Controller
{
    //
    public function index(){
        return view('trading.frontend.dashboard');
    }

    public function trading_option_store(Request $request){
        //dd($request->all());
        $trading_option = TradingOption::where('type', $request->type)->first();
        if($trading_option == null){
            $trading_option = new TradingOption;
        }
        $trading_option->type = $request->type;

        $commision_details = array();
        if ($request->type == 'user_registration_first_purchase') {
            $trading_option->percentage = $request->percentage;
        }
        elseif ($request->type == 'product_sharing') {
            $commision_details['commission'] = $request->amount;
            $commision_details['commission_type'] = $request->amount_type;
        }
        elseif ($request->type == 'category_wise_trading') {
            foreach(Category::all() as $category) {
                $data['category_id'] = $request['categories_id_'.$category->id];
                $data['commission'] = $request['commison_amounts_'.$category->id];
                $data['commission_type'] = $request['commison_types_'.$category->id];
                array_push($commision_details, $data);
            }
        }
        elseif ($request->type == 'max_trading_limit') {
            $trading_option->percentage = $request->percentage;
        }
        $trading_option->details = json_encode($commision_details);
        if ($request->has('status')) {
            $trading_option->status = 1;
        }
        else {
            $trading_option->status = 0;
        }
        $trading_option->save();
        flash("This has been updated successfully")->success();
        return back();
    }

    public function configs(){
            return view('trading.frontend.configs');
    }

    public function config_store(Request $request){
        $form = array();
        $select_types = ['select', 'multi_select', 'radio'];
        $j = 0;
        for ($i=0; $i < count($request->type); $i++) {
            $item['type'] = $request->type[$i];
            $item['label'] = $request->label[$i];
            if(in_array($request->type[$i], $select_types)){
                $item['options'] = json_encode($request['options_'.$request->option[$j]]);
                $j++;
            }
            array_push($form, $item);
        }
        $trading_config = TradingConfig::where('type', 'verification_form')->first();
        $trading_config->value = json_encode($form);
        if($trading_config->save()){
            flash("Verification form updated successfully")->success();
            return back();
        }
    }

    public function apply_for_trading(Request $request){
        return view('trading.frontend.apply_for_trading');
    }

    public function store_trading_user(Request $request){
        
        if(!Auth::check()){
            if(User::where('email', $request->email)->first() != null){
                flash(__('Email already exists!'))->error();
                return back();
            }
            if($request->password == $request->password_confirmation){
                $user = new User;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->user_type = "trading";
                $user->password = Hash::make($request->password);
                $user->save();

                $user_id = User::latest()->first()->id;
                // $customer = new Customer;
                // $customer->user_id = $user_id;
                // $customer->save();

                auth()->login($user, false);
            }
            else{
                flash(__('Sorry! Password did not match.'))->error();
                return back();
            }
        }

        $trading_user = Auth::user()->trading_user;
        if ($trading_user == null) {
            $trading_user = new TradingUser;
            $trading_user->user_id = Auth::user()->id;
        }
        $data = array();
        $i = 0;
        foreach (json_decode(TradingConfig::where('type', 'verification_form')->first()->value) as $key => $element) {
            $item = array();
            if ($element->type == 'text') {
                $item['type'] = 'text';
                $item['label'] = $element->label;
                $item['value'] = $request['element_'.$i];
            }
            elseif ($element->type == 'select' || $element->type == 'radio') {
                $item['type'] = 'select';
                $item['label'] = $element->label;
                $item['value'] = $request['element_'.$i];
            }
            elseif ($element->type == 'multi_select') {
                $item['type'] = 'multi_select';
                $item['label'] = $element->label;
                $item['value'] = json_encode($request['element_'.$i]);
            }
            elseif ($element->type == 'file') {
                $item['type'] = 'file';
                $item['label'] = $element->label;
                $item['value'] = $request['element_'.$i]->store('uploads/trading_verification_form');
            }
            array_push($data, $item);
            $i++;
        }
        $trading_user->informations = json_encode($data);
        if($trading_user->save()){
            flash(__('Your verification request has been submitted successfully!'))->success();
            return redirect()->route('home');
        }

        flash(__('Sorry! Something went wrong.'))->error();
        return back();
    }

    public function users(){
        $trading_users = TradingUser::paginate(12);
        return view('trading.frontend.users', compact('trading_users'));
    }

    public function show_verification_request($id){
        $trading_user = TradingUser::findOrFail($id);
        return view('trading.frontend.show_verification_request', compact('trading_user'));
    }

    public function approve_user($id)
    {
        $trading_user = TradingUser::findOrFail($id);
        $trading_user->status = 1;
        if($trading_user->save()){
            flash(__('trading user has been approved successfully'))->success();
            return redirect()->route('trading.frontend.users');
        }
        flash(__('Something went wrong'))->error();
        return back();
    }

    public function reject_user($id)
    {
        $trading_user = TradingUser::findOrFail($id);
        $trading_user->status = 0;
        $trading_user->informations = null;
        if($trading_user->save()){
            flash(__('trading user request has been rejected successfully'))->success();
            return redirect()->route('trading.frontend.users');
        }
        flash(__('Something went wrong'))->error();
        return back();
    }

    public function updateApproved(Request $request)
    {
        $trading_user = TradingUser::findOrFail($request->id);
        $trading_user->status = $request->status;
        if($trading_user->save()){
            return 1;
        }
        return 0;
    }

    public function payment_modal(Request $request)
    {
        $trading_user = TradingUser::findOrFail($request->id);
        return view('trading.frontend.payment_modal', compact('trading_user'));
    }

    public function payment_store(Request $request){
        $trading_payment = new TradingPayment;
        $trading_payment->trading_user_id = $request->trading_user_id;
        $trading_payment->amount = $request->amount;
        $trading_payment->payment_method = $request->payment_method;
        $trading_payment->save();

        $trading_user = TradingUser::findOrFail($request->trading_user_id);
        $trading_user->balance -= $request->amount;
        $trading_user->save();

        flash(__('Payment completed'))->success();
        return back();
    }

    public function payment_history($id){
        $trading_user = TradingUser::findOrFail(decrypt($id));
        $trading_payments = $trading_user->trading_payments();
        return view('trading.frontend.payment_history', compact('trading_payments', 'trading_user'));
    }

    public function user_index(){
        //echo "string";
         $trading_user = Auth::user()->trading_user;
         $trading_payments = $trading_user->trading_payments();
         //dd($trading_payments->toArray());
         return view('trading.frontend.index', compact('trading_payments'));
    }

    public function payment_settings(){
        $trading_user = Auth::user()->trading_user;
        return view('trading.frontend.payment_settings', compact('trading_user'));
    }

    public function payment_settings_store(Request $request){
        $trading_user = Auth::user()->trading_user;
        $trading_user->paypal_email = $request->paypal_email;
        $trading_user->bank_information = $request->bank_information;
        $trading_user->save();
        flash(__('trading payment settings has been updated successfully'))->success();
        return redirect()->route('trading.frontend.user.index');
    }

    public function processtradingPoints(Order $order){
        if(Addon::where('unique_identifier', 'trading_system')->first() != null && \App\Addon::where('unique_identifier', 'trading_system')->first()->activated){
            if(TradingOption::where('type', 'user_registration_first_purchase')->first()->status){
                if ($order->user != null && $order->user->orders->count() == 1) {
                    if($order->user->referred_by != null){
                        $user = User::find($order->user->referred_by);
                        if ($user != null) {
                            $amount = (TradingOption::where('type', 'user_registration_first_purchase')->first()->percentage * $order->grand_total)/100;
                            $trading_user = $user->trading_user;
                            if($trading_user != null){
                                $trading_user->balance += $amount;
                                $trading_user->save();
                            }
                        }
                    }
                }
            }
            if(TradingOption::where('type', 'product_sharing')->first()->status){
                foreach ($order->orderDetails as $key => $orderDetail) {
                    $amount = 0;
                    if($orderDetail->product_referral_code != null){
                        $referred_by_user = User::where('referral_code', $orderDetail->product_referral_code)->first();
                        if($referred_by_user != null) {
                            if(TradingOption::where('type', 'product_sharing')->first()->details != null && json_decode(TradingOption::where('type', 'product_sharing')->first()->details)->commission_type == 'amount'){
                                $amount = json_decode(TradingOption::where('type', 'product_sharing')->first()->details)->commission;
                            }
                            elseif(TradingOption::where('type', 'product_sharing')->first()->details != null && json_decode(TradingOption::where('type', 'product_sharing')->first()->details)->commission_type == 'percent') {
                                $amount = (json_decode(TradingOption::where('type', 'product_sharing')->first()->details)->commission * $orderDetail->price)/100;
                            }
                            $trading_user = $referred_by_user->trading_user;
                            if($trading_user != null){
                                $trading_user->balance += $amount;
                                $trading_user->save();
                            }
                        }
                    }
                }
            }
            elseif (TradingOption::where('type', 'category_wise_trading')->first()->status) {
                foreach ($order->orderDetails as $key => $orderDetail) {
                    $amount = 0;
                    if($orderDetail->product_referral_code != null) {
                        $referred_by_user = User::where('referral_code', $orderDetail->product_referral_code)->first();
                        if($referred_by_user != null) {
                            if(TradingOption::where('type', 'category_wise_trading')->first()->details != null){
                                foreach (json_decode(TradingOption::where('type', 'category_wise_trading')->first()->details) as $key => $value) {
                                    if($value->category_id == $orderDetail->product->category->id){
                                        if($value->commission_type == 'amount'){
                                            $amount = $value->commission;
                                        }
                                        else {
                                            $amount = ($value->commission * $orderDetail->price)/100;
                                        }
                                    }
                                }
                            }
                            $trading_user = $referred_by_user->trading_user;
                            if($trading_user != null){
                                $trading_user->balance += $amount;
                                $trading_user->save();
                            }
                        }
                    }
                }
            }
        }
    }

    public function refferal_users()
    {
        $refferal_users = User::where('referred_by', '!=' , null)->paginate(10);
        return view('trading.frontend.refferal_users', compact('refferal_users'));
    }
}
