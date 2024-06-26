<?php

namespace App\Http\Controllers\Trading;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trading\TradingRole;
use Auth;

class TradingRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trading_roles = TradingRole::all();
        return view('trading.trading_roles.index', compact('trading_roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trading.trading_roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('permissions')){
            $role = new TradingRole;
            $user_id = Auth::User()->id;
            $role->for_user_id = $user_id;
            $role->name = $request->name;
            $role->permissions = json_encode($request->permissions);
            if($role->save()){
                flash(__('Role has been inserted successfully'))->success();
                return redirect()->route('trading_roles.index');
            }
        }
        flash(__('Something went wrong'))->error();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = TradingRole::findOrFail(decrypt($id));
        return view('trading.trading_roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = TradingRole::findOrFail($id);

        if($request->has('permissions')){
            $role->name = $request->name;
            $role->permissions = json_encode($request->permissions);
            if($role->save()){
                flash(__('Role has been updated successfully'))->success();
                return redirect()->route('trading_roles.index');
            }
        }
        flash(__('Something went wrong'))->error();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(TradingRole::destroy($id)){
            flash(__('Trading Role has been deleted successfully'))->success();
            return redirect()->route('trading_roles.index');
        }
        else{
            flash(__('Something went wrong'))->error();
            return back();
        }
    }
}
