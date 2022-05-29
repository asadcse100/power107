@extends('trading.layouts.app')

@section('content')

  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">{{ translate('Home')}}</a></li>
      <li class="breadcrumb-item active">{{__('Trading')}}</li>
    </ul>
  </div>

<section class="no-padding-top">
    <div class="container-fluid">
          <div class="row">                    
          <div class="col-lg-6">
          <div class="block">
             <div class="title"><strong class="d-block">{{__('Basic Trading')}}</strong>
            </div>
            <div class="block-body">
             <form class="form-horizontal" action="{{ route('trading.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                            <input type="hidden" name="type" value="user_registration_first_purchase">
                            <div class="col-lg-4">
                                <label class="control-label">{{__('User Registration & First Purchase')}}</label>
                            </div>
                            <div class="col-lg-6">
                                @php
                                    if(\App\Models\Trading\TradingOption::where('type', 'user_registration_first_purchase')->first() != null){
                                        $percentage = \App\Models\Trading\TradingOption::where('type', 'user_registration_first_purchase')->first()->percentage;
                                        $status = \App\Models\Trading\TradingOption::where('type', 'user_registration_first_purchase')->first()->status;
                                    }
                                    else {
                                        $percentage = null;
                                    }
                                @endphp
                                <input type="number" min="0" step="0.01" max="100" class="form-control" name="percentage" value="{{ $percentage }}" placeholder="Percentage of Order Amount" required>
                            </div>
                            <div class="col-lg-2">
                                <label class="control-label">%</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2">
                                <label class="control-label">{{__('Status')}}</label>
                            </div>
                            <div class="col-lg-8">
                                <label class="switch">
                                    <input value="1" name="status" type="checkbox" @if ($status)
                                        checked
                                    @endif>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-outline-success btn-sm" type="submit">{{__('Save')}}</button>
                            </div>
                        </div>
                        </div>
            </form>
            </div>
          </div>
      </div>
      <div class="col-lg-6">
          <div class="block">
             <div class="title"><strong class="d-block">{{__('Product Sharing Trading')}}</strong>
              <span class="d-block">Lorem ipsum dolor sit amet consectetur.</span>
            </div>
            <div class="block-body">
             <form class="form-horizontal" action="{{ route('trading.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                            <input type="hidden" name="type" value="product_sharing">
                            <div class="col-lg-4">
                                <label class="control-label">{{__('Product Sharing and Purchasing')}}</label>
                            </div>
                            <div class="col-lg-6">
                                @php
                                    if(\App\Models\Trading\TradingOption::where('type', 'product_sharing')->first() != null && \App\Models\Trading\TradingOption::where('type', 'product_sharing')->first()->details != null){
                                        $commission_product_sharing = json_decode(\App\Models\Trading\TradingOption::where('type', 'product_sharing')->first()->details)->commission;
                                        $commission_type_product_sharing = json_decode(\App\Models\Trading\TradingOption::where('type', 'product_sharing')->first()->details)->commission_type;
                                        $status = \App\Models\Trading\TradingOption::where('type', 'product_sharing')->first()->status;
                                    }
                                    else {
                                        $commission_product_sharing = null;
                                        $commission_type_product_sharing = null;
                                    }
                                @endphp
                                
                                    <input type="number" min="0" step="0.01" max="100" class="form-control" name="amount" value="{{ $commission_product_sharing }}" placeholder="Percentage of Order Amount" required>
                                </div>
                                
                            
                            <div class="col-lg-2">
                                <select class="demo-select2" name="amount_type">
                                    <option value="amount" @if ($commission_type_product_sharing == "amount") selected @endif>$</option>
                                    <option value="percent" @if ($commission_type_product_sharing == "percent") selected @endif>%</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label">{{__('Status')}}</label>
                            </div>
                            <div class="col-lg-9">
                                <label class="switch">
                                    <input value="1" name="status" type="checkbox" @if ($status)
                                        checked
                                    @endif>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-outline-success btn-sm" type="submit">{{__('Save')}}</button>
                            </div>
                        </div>
            </form>
            </div>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="block">
             <div class="title"><strong class="d-block">{{__('Product Sharing Trading (Category Wise)')}}</strong>
              <span class="d-block">Lorem ipsum dolor sit amet consectetur.</span>
            </div>
            <div class="block-body">
             <form class="form-horizontal" action="{{ route('trading.store') }}" method="POST">
                        @csrf
                        @php
                            if(\App\Models\Trading\TradingOption::where('type', 'category_wise_trading')->first() != null){
                                $category_wise_trading_status = \App\Models\Trading\TradingOption::where('type', 'category_wise_trading')->first()->status;
                            }
                        @endphp
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="control-label">{{__('Status')}}</label>
                            </div>
                            <div class="col-lg-8">
                                <label class="switch">
                                    <input value="1" name="status" type="checkbox" @if ($category_wise_trading_status)
                                        checked
                                    @endif>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        @if (\App\Models\Trading\TradingOption::where('type', 'category_wise_trading')->first() != null)
                            <input type="hidden" name="type" value="category_wise_trading">
                            @foreach (\App\Models\Trading\Category::all() as $key => $category)
                                @php
                                    $found = false;
                                @endphp
                                @if(\App\Models\Trading\TradingOption::where('type', 'category_wise_trading')->first()->details != null)
                                    @foreach (json_decode(\App\Models\Trading\TradingOption::where('type', 'category_wise_trading')->first()->details) as $key => $data)
                                        @if($data->category_id == $category->id)
                                            @php
                                                $found = true;
                                                $value = $data;
                                            @endphp
                                        @endif
                                    @endforeach
                                @endif
                                @if ($found)
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-7">
                                            <input type="hidden" name="categories_id_{{ $value->category_id }}" value="{{ $value->category_id }}">
                                            <input type="text" class="form-control" value="{{ \App\Models\Trading\Category::find($value->category_id)->name }}" readonly>
                                            </div>
                                            <div class="col-lg-2">
                                            <input type="number" min="0" step="0.01" class="form-control" name="commison_amounts_{{ $value->category_id }}" value="{{ $value->commission }}">
                                        </div>
                                        <div class="col-lg-2">
                                            <select class="demo-select2" name="commison_types_{{ $value->category_id }}">
                                                <option value="amount" @if($value->commission_type == 'amount') selected @endif>$</option>
                                                <option value="percent" @if($value->commission_type == 'percent') selected @endif>%</option>
                                            </select>
                                        </div>
                                        </div> 
                                    </div>
                                @else
                                    <div class="form-group">
                                        <div class="row">
                                        <div class="col-lg-7">
                                            <input type="hidden" name="categories_id_{{ $category->id }}" value="{{ $category->id }}">
                                            <input type="text" class="form-control" value="{{ $category->name }}" readonly>
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="number" min="0" step="0.01" class="form-control" name="commison_amounts_{{ $category->id }}" value="0"></div>
                                        <div class="col-lg-2">
                                            <select class="demo-select2" name="commison_types_{{ $category->id }}">
                                                <option value="amount">$</option>
                                                <option value="percent">%</option>
                                            </select>
                                        </div>
                                    </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        <div class="form-group">
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-outline-success btn-sm" type="submit">{{__('Save')}}</button>
                            </div>
                        </div>
            </form>
            </div>
          </div>
        </div>

          </div>
      </div>
  </section>
@endsection
