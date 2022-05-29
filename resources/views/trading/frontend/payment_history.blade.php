@extends('layouts.back.app')

@section('content')

<!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">{{translate('Home')}}</a></li>
      <li class="breadcrumb-item active">{{ __('Trading payments of ').$trading_user->user->name }}</li>
    </ul>
  </div>

<section class="no-padding-top">
  <div class="container-fluid">
    @include('flash::message')
    <div class="row">
        
      <div class="col-lg-12">
           
        <div class="block">
          <div class="title"><strong>{{ __('Trading payments of ').$trading_user->user->name }}</strong></div>                 
          <div class="panel-body">
            <table class="table table-striped table-sm">
                <thead class="table-bordered">
                    <tr>
                        <th>#</th>
                        <th>{{__('Date')}}</th>
                        <th>{{__('Amount')}}</th>
                        <th>{{ __('Payment Method') }}</th>
                    </tr>
                </thead>
                <tbody class="table-bordered">
                    @foreach($trading_payments as $key => $payment)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $payment->created_at }}</td>
                        <td>
                            {{ single_price($payment->amount) }}
                        </td>
                        <td>{{ ucfirst($payment->payment_method) }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            
        </div>
        </div>

        <div class="clearfix">
            <div class="pull-right">
                {{ $trading_payments->appends(request()->input())->links() }}
            </div>
        </div>


      </div>

    </div>
  </div>
</section>


@endsection
