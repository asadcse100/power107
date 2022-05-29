@extends('layouts.back.app')

@section('content')
    
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">{{translate('Home')}}</a></li>
      <li class="breadcrumb-item active">{{__('Refferal Users')}}</li>
    </ul>
  </div>

<section class="no-padding-top">
  <div class="container-fluid">
    @include('flash::message')
    <div class="row">
        
      <div class="col-lg-12">
            <div class="pull-right clearfix">
                <form class="" id="sort_brands" action="" method="GET">
                    <div class="box-inline pad-rgt pull-left">
                        <div class="" style="min-width: 200px; margin: 15px">
                            <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type name & Enter for Search') }}">
                        </div>
                    </div>
                </form>
            </div>
        <div class="block">
          <div class="title"><strong>{{__('Refferal Users')}}</strong></div>                 
          <div class="panel-body">
            <table class="table table-striped table-sm">
                <thead class="table-bordered">
                    <tr>
                        <th>#</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Phone')}}</th>
                        <th>{{__('Email Address')}}</th>
                        <th>{{__('Reffered By')}}</th>
                    </tr>
                </thead>
                <tbody class="table-bordered">
                    @foreach($refferal_users as $key => $refferal_user)
                    @if ($refferal_user != null)
                        <tr>
                            <td>{{ ($key+1) + ($refferal_users->currentPage() - 1)*$refferal_users->perPage() }}</td>
                            <td>{{$refferal_user->name}}</td>
                            <td>{{$refferal_user->phone}}</td>
                            <td>{{$refferal_user->email}}</td>
                            <td>
                                @if (\App\ModelEcom\User::find($refferal_user->referred_by) != null)
                                    {{ \App\ModelEcom\User::find($refferal_user->referred_by)->name }} ({{ \App\ModelEcom\User::find($refferal_user->referred_by)->email }})
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            
        </div>
        </div>
            <div class="clearfix">
                <div class="pull-right">
                    {{ $refferal_users->appends(request()->input())->links() }}
                </div>
            </div>
      </div>
    </div>
  </div>
</section>
@endsection
