<form class="form-horizontal" action="{{ route('trading_user.payment_store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">{{__('Trading Payment')}}</h4>
    </div>

    <div class="modal-body">
        <div>
            <table class="table table-responsive">
                <tbody>
                    <tr>
                        @if($trading_user->balance >= 0)
                            <td>{{ __('Due Amount') }}</td>
                            <td><strong>{{ single_price($trading_user->balance) }}</strong></td>
                        @endif
                    </tr>
                    <tr>
                        <td>{{ __('Paypal Email') }}</td>
                        <td>{{ $trading_user->paypal_email }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Bank Information') }}</td>
                        <td>{{ $trading_user->bank_information }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        @if ($trading_user->balance > 0)
            <input type="hidden" name="trading_user_id" value="{{ $trading_user->id }}">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="amount">{{__('Amount')}}</label>
                <div class="col-sm-9">
                    <input type="number" min="0" step="0.01" name="amount" id="amount" value="{{ $trading_user->balance }}" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="payment_method">{{__('Payment Method')}}</label>
                <div class="col-sm-9">
                    <select name="payment_method" id="payment_method" class="form-control demo-select2-placeholder" required>
                        <option value="">{{__('Select Payment Method')}}</option>
                        <option value="Paypal">{{__('Paypal')}}</option>
                        <option value="Bank">{{__('Bank')}}</option>
                    </select>
                </div>
            </div>
        @endif

    </div>
    <div class="modal-footer">
        <div class="panel-footer text-right">
            @if ($trading_user->balance > 0)
                <button class="btn btn-purple" type="submit">{{__('Pay')}}</button>
            @endif
            <button class="btn btn-default" data-dismiss="modal">{{__('Cancel')}}</button>
        </div>
    </div>
</form>
