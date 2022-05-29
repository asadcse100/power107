@extends('trading.layouts.app')
@section('content')

<section class="content-header">
    @section('css')
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <link href="{{asset('trading')}}/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('trading')}}/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="{{asset('trading')}}/plugins/table/datatable/dt-global_style.css">
    <link href="{{asset('trading')}}/assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('trading')}}/plugins/table/datatable/custom_dt_multiple_tables.css">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->  
    @endsection
</section>
    <div class="row layout-top-spacing">
    <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing" style="margin-top: -18px; margin-left: 15px">
        <div class="widget widget-chart-one">

            <div class="widget-content">
                <div class="tabs tab-content" style="margin-left: 20px">
                    <div class="tabcontent" > 
                        <div id="candlestick">
                            <div id="candledata">
                                Time Fram : <a href="#">1m</a> | <a href="#">5m</a> | <a href="#">15m</a> | <a href="#">30m</a> | <a href="#">1h</a> | <a href="#">1d</a> | <a href="#">1m</a> | <a href="#">1y</a> | <a href="#">All Time</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
                
<div class="col-xl-2 col-lg-4 col-sm-12  layout-spacing" style="margin-top: -18px;margin-left: -28px;">
    <div class="widget-content widget-content-area br-6" style="padding-top: 28px;">
        <div class="table-responsive mb-4 mt-4">
            <table id="zero-config" class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Change</th>
                    </tr>
                </thead>
                <tbody>

                @if(isset($data['groupByProductName']))
                    @foreach($data['groupByProductName'] as $product)
                    <tr>
                        @if(!empty($product[0]))
                        <td><a href="{{Route('products.trading', 1)}}">                            
                            {!! $product[0] !!}
                            </a></td>
                        @endif
                        <td>2.3%</td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<div class="row layout-top-spacing">    

<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: -42px; padding-left: 30px;">
    <div class="widget widget-table-two" style="margin-right:-14px;">
            
            <div class="widget-heading">
                <h6 class="text-center text-success">Buy Orders</h6>
            </div>


            <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="buy-tab" data-toggle="tab" href="#buy" role="tab" aria-controls="buy" aria-selected="true">Buy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="open-tab" data-toggle="tab" href="#open" role="tab" aria-controls="open" aria-selected="false">Open Order</a>
                </li>
            </ul>
            <div class="tab-content" id="simpletabContent">
                <div class="tab-pane fade show active" id="buy" role="tabpanel" aria-labelledby="buy-tab">
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Voliume</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left text-success">$100.20</td>
                                <td class="text-center text-success">5000000</td>
                                <td class="text-center text-success">4332</td>
                                <td class="text-center text-success">1234</td>
                                <td class="text-center text-success">$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-success">$100.20</td>
                                <td class="text-center text-success">5000000</td>
                                <td class="text-center text-success">4332</td>
                                <td class="text-center text-success">1234</td>
                                <td class="text-center text-success">$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-success">$100.20</td>
                                <td class="text-center text-success">5000000</td>
                                <td class="text-center text-success">4332</td>
                                <td class="text-center text-success">1234</td>
                                <td class="text-center text-success">$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-success">$100.20</td>
                                <td class="text-center text-success">5000000</td>
                                <td class="text-center text-success">4332</td>
                                <td class="text-center text-success">1234</td>
                                <td class="text-center text-success">$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-success">$100.20</td>
                                <td class="text-center text-success">5000000</td>
                                <td class="text-center text-success">4332</td>
                                <td class="text-center text-success">1234</td>
                                <td class="text-center text-success">$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-success">$100.20</td>
                                <td class="text-center text-success">5000000</td>
                                <td class="text-center text-success">4332</td>
                                <td class="text-center text-success">1234</td>
                                <td class="text-center text-success">$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-success">$100.20</td>
                                <td class="text-center text-success">5000000</td>
                                <td class="text-center text-success">4332</td>
                                <td class="text-center text-success">1234</td>
                                <td class="text-center text-success">$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-success">$100.20</td>
                                <td class="text-center text-success">5000000</td>
                                <td class="text-center text-success">4332</td>
                                <td class="text-center text-success">1234</td>
                                <td class="text-center text-success">$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-success">$100.20</td>
                                <td class="text-center text-success">5000000</td>
                                <td class="text-center text-success">4332</td>
                                <td class="text-center text-success">1234</td>
                                <td class="text-center text-success">$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-success">$100.20</td>
                                <td class="text-center text-success">5000000</td>
                                <td class="text-center text-success">4332</td>
                                <td class="text-center text-success">1234</td>
                                <td class="text-center text-success">$5088881.00</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
  
                </div>
                <div class="tab-pane fade" id="open" role="tabpanel" aria-labelledby="open-tab">
                    
                    <p class="mb-4">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.                                                
                    </p>

                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p> 

                </div>
            </div>



            </div>
        </div>


        
<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top:-42px;">
    <div class="widget widget-table-two" style="margin-right:-14px; margin-left:-14px;">
            <div class="widget-heading">
                <h6 class="text-center text-success">Sell Orders</h6>
            </div>


            <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="sell-tab" data-toggle="tab" href="#sell" role="tab" aria-controls="sell" aria-selected="true">Sell</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="close-tab" data-toggle="tab" href="#close" role="tab" aria-controls="close" aria-selected="false">Close Order</a>
                </li>
            </ul>
            <div class="tab-content" id="simpletabContent">
                <div class="tab-pane fade show active" id="sell" role="tabpanel" aria-labelledby="sell-tab">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped mb-4">
                        <thead>
                            <tr>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Volium</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left text-danger" >$100.20</td>
                                <td class="text-center text-danger text-danger" >5000000</td>
                                <td class="text-center text-danger text-danger" >4332</td>
                                <td class="text-center text-danger text-danger" >1234</td>
                                <td class="text-right text-danger text-danger" >$50.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-danger" >$100.20</td>
                                <td class="text-center text-danger" >5000000</td>
                                <td class="text-center text-danger" >4332</td>
                                <td class="text-center text-danger" >1234</td>
                                <td class="text-right text-danger" >$50.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-danger" >$100.20</td>
                                <td class="text-center text-danger" >5000000</td>
                                <td class="text-center text-danger" >4332</td>
                                <td class="text-center text-danger" >1234</td>
                                <td class="text-right text-danger" >$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-danger" >$100.20</td>
                                <td class="text-center text-danger" >5000000</td>
                                <td class="text-center text-danger" >4332</td>
                                <td class="text-center text-danger" >1234</td>
                                <td class="text-right text-danger" >$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-danger" >$100.20</td>
                                <td class="text-center text-danger" >5000000</td>
                                <td class="text-center text-danger" >4332</td>
                                <td class="text-center text-danger" >1234</td>
                                <td class="text-right text-danger" >$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-danger" >$100.20</td>
                                <td class="text-center text-danger" >5000000</td>
                                <td class="text-center text-danger" >4332</td>
                                <td class="text-center text-danger" >1234</td>
                                <td class="text-right text-danger" >$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-danger" >$100.20</td>
                                <td class="text-center text-danger" >5000000</td>
                                <td class="text-center text-danger" >4332</td>
                                <td class="text-center text-danger" >1234</td>
                                <td class="text-right text-danger" >$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-danger" >$100.20</td>
                                <td class="text-center text-danger" >5000000</td>
                                <td class="text-center text-danger" >4332</td>
                                <td class="text-center text-danger" >1234</td>
                                <td class="text-right text-danger" >$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-danger" >$100.20</td>
                                <td class="text-center text-danger" >5000000</td>
                                <td class="text-center text-danger" >4332</td>
                                <td class="text-center text-danger" >1234</td>
                                <td class="text-right text-danger" >$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-danger" >$100.20</td>
                                <td class="text-center text-danger" >5000000</td>
                                <td class="text-center text-danger" >4332</td>
                                <td class="text-center text-danger" >1234</td>
                                <td class="text-right text-danger" >$5088881.00</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="tab-pane fade" id="close" role="tabpanel" aria-labelledby="close-tab">                    
                    <p class="mb-4">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.                                                
                    </p>

                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
            </div>

            </div>
        </div>

<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12"  style="margin-top: -42px; padding-right: 28px;">
    <div class="widget widget-table-two" style="margin-left:-14px;">
            <div class="widget-heading">
                <h6 class="text-center"><span class="text-success">Buy</span>/<span class="text-danger">Sell</span> Orders</h6><br><hr>
            </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped mb-4">
                        <thead>
                            <tr>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Volium</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left text-danger" >$100.20</td>
                                <td class="text-center text-danger" >5000000</td>
                                <td class="text-center text-danger" >4332</td>
                                <td class="text-center text-danger" >1234</td>
                                <td class="text-right text-danger" >$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-danger" >$100.20</td>
                                <td class="text-center text-danger" >5000000</td>
                                <td class="text-center text-danger" >4332</td>
                                <td class="text-center text-danger" >1234</td>
                                <td class="text-right text-danger" >$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-danger" >$100.20</td>
                                <td class="text-center text-danger" >5000000</td>
                                <td class="text-center text-danger" >4332</td>
                                <td class="text-center text-danger" >1234</td>
                                <td class="text-right text-danger" >$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-success">$100.20</td>
                                <td class="text-center text-success">5000000</td>
                                <td class="text-center text-success">4332</td>
                                <td class="text-center text-success">1234</td>
                                <td class="text-right text-success">$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-success">$100.20</td>
                                <td class="text-center text-success">5000000</td>
                                <td class="text-center text-success">4332</td>
                                <td class="text-center text-success">1234</td>
                                <td class="text-right text-success">$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-danger" >$100.20</td>
                                <td class="text-center text-danger" >5000000</td>
                                <td class="text-center text-danger" >4332</td>
                                <td class="text-center text-danger" >1234</td>
                                <td class="text-right text-danger" >$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-success">$100.20</td>
                                <td class="text-center text-success">5000000</td>
                                <td class="text-center text-success">4332</td>
                                <td class="text-center text-success">1234</td>
                                <td class="text-right text-success">$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-danger" >$100.20</td>
                                <td class="text-center text-danger" >5000000</td>
                                <td class="text-center text-danger" >4332</td>
                                <td class="text-center text-danger" >1234</td>
                                <td class="text-right text-danger" >$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-danger" >$100.20</td>
                                <td class="text-center text-danger" >5000000</td>
                                <td class="text-center text-danger" >4332</td>
                                <td class="text-center text-danger" >1234</td>
                                <td class="text-right text-danger" >$5088881.00</td>
                            </tr>
                            <tr>
                                <td class="text-left text-success">$100.20</td>
                                <td class="text-center text-success">5000000</td>
                                <td class="text-center text-success">4332</td>
                                <td class="text-center text-success">1234</td>
                                <td class="text-right text-success">$5088881.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div><br>


                
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="text-center">
                <h6 class="text-center">My Orders</h6><hr>
            </div>
            <div class="table-responsive mb-4 mt-4">
                <table class="multi-table table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>@lang('Name')</th>
                            <th>@lang('Products')</th>
                            <th>@lang('Price')</th>
                            <th>@lang('Quantity')</th>
                            <th>@lang('Total')</th>
                            <th class="text-center">@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Onion Bd</td>
                        <td>Image</td>
                        <td>$100.40</td>                        
                        <td>1000kg</td>
                        <td>$100400</td>
                        <td class="text-center"><a href="#" class="btn btn-outline-warning btn-sm">Close Order</a> <a href="#" class="btn btn-outline-info btn-sm">Stop Limit</a></td>
                        </tr>
                        <tr>
                            <td>Onion Bd</td>
                            <td>Image</td>
                            <td>1000kg</td>
                            <td>50000kg</td>
                            <td>2.8%</td>
                            <td>Trade this market</td>
                        </tr>
                        <tr>
                            <td>Onion Bd</td>
                            <td>Image</td>
                            <td>1000kg</td>
                            <td>50000kg</td>
                            <td>2.8%</td>
                            <td>Trade this market</td>
                        </tr>
                        <tr>
                            <td>Onion Bd</td>
                            <td>Image</td>
                            <td>1000kg</td>
                            <td>50000kg</td>
                            <td>2.8%</td>
                            <td>Trade this market</td>
                        </tr>
                        <tr>
                            <td>Onion Bd</td>
                            <td>Image</td>
                            <td>1000kg</td>
                            <td>50000kg</td>
                            <td>2.8%</td>
                            <td>Trade this market</td>
                        </tr>
                        <tr>
                            <td>Onion Bd</td>
                            <td>Image</td>
                            <td>1000kg</td>
                            <td>50000kg</td>
                            <td>2.8%</td>
                            <td>Trade this market</td>
                        </tr>
                        <tr>
                            <td>Onion In</td>
                            <td>Image</td>
                            <td>1000kg</td>
                            <td>50000kg</td>
                            <td>2.8%</td>
                            <td>Trade this market</td>
                        </tr>
                        <tr>
                            <td>Onion Bd</td>
                            <td>Image</td>
                            <td>1000kg</td>
                            <td>50000kg</td>
                            <td>2.8%</td>
                            <td>Trade this market</td>
                        </tr>
                        
                    </tbody>
                </div>

                <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%"><br><br>
                        <h6 class="text-center">My Orders History</h6><hr>
                    <thead>
                        <tr>
                            <th>@lang('Name')</th>
                            <th>@lang('Products')</th>
                            <th>@lang('Price')</th>
                            <th>@lang('Quantity')</th>
                            <th>@lang('Total')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Onion Bd</td>
                        <td>Image</td>
                        <td>$100.40</td>                        
                        <td>1000kg</td>
                        <td>$100400</td>
                        </tr>
                        <tr>
                            <td>Onion Bd</td>
                            <td>Image</td>
                            <td>1000kg</td>
                            <td>50000kg</td>
                            <td>2.8%</td>
                        </tr>
                        <tr>
                            <td>Onion Bd</td>
                            <td>Image</td>
                            <td>1000kg</td>
                            <td>50000kg</td>
                            <td>2.8%</td>
                        </tr>
                        <tr>
                            <td>Onion Bd</td>
                            <td>Image</td>
                            <td>1000kg</td>
                            <td>50000kg</td>
                            <td>2.8%</td>
                        </tr>
                        <tr>
                            <td>Onion Bd</td>
                            <td>Image</td>
                            <td>1000kg</td>
                            <td>50000kg</td>
                            <td>2.8%</td>
                        </tr>
                        <tr>
                            <td>Onion Bd</td>
                            <td>Image</td>
                            <td>1000kg</td>
                            <td>50000kg</td>
                            <td>2.8%</td>
                        </tr>
                        <tr>
                            <td>Onion In</td>
                            <td>Image</td>
                            <td>1000kg</td>
                            <td>50000kg</td>
                            <td>2.8%</td>
                        </tr>
                        <tr>
                            <td>Onion Bd</td>
                            <td>Image</td>
                            <td>1000kg</td>
                            <td>50000kg</td>
                            <td>2.8%</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.33.1/apexcharts.min.js" integrity="sha512-oyNqW6ArxqcGtg9kzTbOQqKC+q7+tS9Ab09S44+VbZiKY6xJtMNA6v13vJwoqiKLGJuQQwams0W5E19QnLfxWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">

// ========== Trading ====================

        
    $('#candledata').on('click', function() {
        var candleId = $(this).val();
        console.log(candleId);
        candleDataLoad(candleId);
    });


    function candleDataLoad(candleId)
    {
        
        //--############ FOR Load Union Data---------------------------
        var route = "{{ url('/products/trading') }}";
        var data = {
            "_token": "{{ csrf_token() }}",
            candleId: candleId
        };

        $.ajax({
            type: "POST",
            url: route,
            data: data,
            dataType: 'json'
        }).done(function(response) {
            var union = '';

            console.log(oldValue);
            $.each(response, function(i, item) {
                if (langId == 1) {
                    union += '<option '+selected+' value="' + response[i].id + '">' + response[i]
                        .union_name_eng + '</option>';
                }
            });
        });
    }



$(document).ready(function() {
    var livetrde = '<?=json_encode($liveTrade);?>';
    livetrdeObj = JSON.parse(livetrde);
  console.log(livetrdeObj);
  
         options = {
          series: [{
          data: livetrdeObj
        }],
          chart: {
          type: 'candlestick',
          height: 550
        },
        title: {
          text: 'CandleStick Chart',
          align: 'left'
        },
        xaxis: {
          type: 'datetime'
        },
        tooltip: {
          enabled: true,
        },
        yaxis: {
          tooltip: {
            enabled: true
          }
        }
        };

        var chartC = new ApexCharts(document.querySelector("#candlestick"), options);
        chartC.render();
      });
  
    </script>
@endsection

@section('script')
    <script src="{{asset('trading')}}/plugins/table/datatable/datatables.js"></script>
    <script src="{{asset('trading')}}/plugins/apex/apexcharts.min.js"></script>
    <script src="{{asset('trading')}}/assets/js/dashboard/dash_1.js"></script>
    <script src="{{asset('trading')}}/plugins/table/datatable/custom_miscellaneous.js"></script>
   
    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
    </script>


    <script>
        $(document).ready(function() {
            $('table.multi-table').DataTable({
                "oLanguage": {
                    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                   "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7,
                drawCallback: function () {
                    $('.t-dot').tooltip({ template: '<div class="tooltip status" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' })
                    $('.dataTables_wrapper table').removeClass('table-striped');
                }
            });
        } );
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection