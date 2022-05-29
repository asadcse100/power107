@extends('layouts.back.app')

@section('content')
    
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">{{translate('Home')}}</a></li>
      <li class="breadcrumb-item active">{{__('Trading Users')}}</li>
    </ul>
  </div>

<section class="no-padding-top">
  <div class="container-fluid">
    @include('flash::message')
    <div class="row">
        
      <div class="col-lg-12">
            
        <div class="block">
          <div class="title"><strong>{{translate('Trading')}}</strong></div>                 
          <div class="panel-body">
            <table class="table table-striped table-sm">
                <thead class="table-bordered">
                    <tr>
                        <th>#</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Phone')}}</th>
                        <th>{{__('Email Address')}}</th>
                        <th>{{__('Verification Info')}}</th>
                        <th>{{__('Approval')}}</th>
                        <th>{{ __('Due Amount') }}</th>
                        <th width="15%">{{ translate('Options')}}</th>
                    </tr>
                </thead>
                <tbody class="table-bordered">


                    @foreach($trading_users as $key => $trading_user)
                    @if($trading_user->user != null)
                        <tr>
                            <td>{{ ($key+1) + ($trading_users->currentPage() - 1)*$trading_users->perPage() }}</td>
                            <td>{{$trading_user->user->name}}</td>
                            <td>{{$trading_user->user->phone}}</td>
                            <td>{{$trading_user->user->email}}</td>
                            <td>
                                @if ($trading_user->informations != null)
                                    <a href="{{ route('trading_users.show_verification_request', $trading_user->id) }}">
                                        <div class="label label-table label-info">
                                            {{__('Show')}}
                                        </div>
                                    </a>
                                @endif
                            </td>
                            <td>
                                <input onchange="update_approved(this)" value="{{ $trading_user->id }}" type="checkbox" <?php if($trading_user->status == 1) echo "checked";?> >
                            </td>
                            <td>
                                @if ($trading_user->balance >= 0)
                                    {{ single_price($trading_user->balance) }}
                                @endif
                            </td>
                            <td>
                                <div class="btn-group dropdown">
                                    <button class="btn btn-outline-info btn-sm dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                        {{__('Actions')}} <i class="dropdown-caret"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a onclick="show_payment_modal('{{$trading_user->id}}');">{{__('Pay Now')}}</a></li>
                                        <li><a href="{{route('trading_user.payment_history', encrypt($trading_user->id))}}">{{__('Payment History')}}</a></li>
                                        {{-- <li><a onclick="confirm_modal('{{route('sellers.destroy', $trading_user->id)}}');">{{__('Delete')}}</a></li> --}}
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="pull-right">
                    {{ $trading_users->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
        </div>


      </div>

    </div>
  </div>

  <div class="modal fade" id="payment_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>

    <div class="modal fade" id="profile_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">

            </div>
        </div>
    </div>

</section>

@endsection

@section('script')
    <script type="text/javascript">
        function show_payment_modal(id){

            $.post('{{ route('trading_user.payment_modal') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
                $('#payment_modal #modal-content').html(data);
                $('#payment_modal').modal('show', {backdrop: 'static'});
                $('.demo-select2-placeholder').select2();
            });
        }

        function update_approved(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('trading_user.approved') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showAlert('success', 'Approved sellers updated successfully');
                }
                else{
                    showAlert('danger', 'Something went wrong');
                }
            });
        }

        // function sort_sellers(el){
        //     $('#sort_sellers').submit();
        // }
    </script>
@endsection
