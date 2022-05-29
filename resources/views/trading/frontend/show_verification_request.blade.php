@extends('layouts.back.app')

@section('content')

  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">{{translate('Home')}}</a></li>
      <li class="breadcrumb-item active">{{__('Trading User Verification')}}</li>
    </ul>
  </div>

<section class="no-padding-top">
  <div class="container-fluid">
    @include('flash::message')
    <div class="row">
        
      <div class="col-lg-12">
        <div class="block">
          <div class="title"><strong>{{__('Trading User Verification')}}</strong></div>                 
          <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
            <div class="panel-heading">
                <h3 class="text-lg">{{__('User Info')}}</h3>
            </div>
            <div class="row">
                <label class="col-sm-3 control-label" for="name">{{__('Name')}}</label>
                <div class="col-sm-9">
                    <p>{{ $trading_user->user->name }}</p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 control-label" for="name">{{__('Email')}}</label>
                <div class="col-sm-9">
                    <p>{{ $trading_user->user->email }}</p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 control-label" for="name">{{__('Address')}}</label>
                <div class="col-sm-9">
                    <p>{{ $trading_user->user->address }}</p>
                </div>
            </div>
            <div class="row">
                <label class="col-sm-3 control-label" for="name">{{__('Phone')}}</label>
                <div class="col-sm-9">
                    <p>{{ $trading_user->user->phone }}</p>
                </div>
            </div>
        </div>
        
            <div class="col-md-6">
            <div class="panel-heading">
                <h3 class="text-lg">{{__('Verification Info')}}</h3>
            </div>
            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                <tbody>
                    @foreach (json_decode($trading_user->informations) as $key => $info)
                        <tr>
                            <th>{{ $info->label }}</th>
                            @if ($info->type == 'text' || $info->type == 'select' || $info->type == 'radio')
                                <td>{{ $info->value }}</td>
                            @elseif ($info->type == 'multi_select')
                                <td>
                                    {{ implode(json_decode($info->value), ', ') }}
                                </td>
                            @elseif ($info->type == 'file')
                                <td>
                                    <a href="{{ asset($info->value) }}" target="_blank" class="btn-info">{{__('Click here')}}</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <div class="text-center">
                <a href="{{ route('trading_user.reject', $trading_user->id) }}" class="btn btn-outline-danger btn-sm">{{__('Reject')}}</a></li>
                <a href="{{ route('trading_user.approve', $trading_user->id) }}" class="btn btn-outline-success btn-sm">{{__('Accept')}}</a>
            </div>
        </div>
        </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
