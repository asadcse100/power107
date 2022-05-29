@extends('trading.layouts.app')
@section('css')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="{{asset('newpos')}}/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="{{asset('newpos')}}/plugins/table/datatable/custom_dt_miscellaneous.css">
    <link rel="stylesheet" type="text/css" href="{{asset('newpos')}}/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="{{asset('newpos')}}/plugins/table/datatable/dt-global_style.css">
    <link href="{{asset('newpos')}}/assets/css/components/tabs-accordian/custom-tabs.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('newpos')}}/plugins/font-icons/fontawesome/css/regular.css">
    <!--  END CUSTOM STYLE FILE  -->
    <style>
        .feather-icon .icon-section {
            padding: 30px;
        }
        .feather-icon .icon-section h4 {
            color: #bfc9d4;
            font-size: 17px;
            font-weight: 600;
            margin: 0;
            margin-bottom: 16px;
        }
        .feather-icon .icon-content-container {
            padding: 0 16px;
            width: 86%;
            margin: 0 auto;
            border: 1px solid #191e3a;
            border-radius: 6px;
        }
        .feather-icon .icon-section p.fs-text {
            padding-bottom: 30px;
            margin-bottom: 30px;
        }
        .feather-icon .icon-container { cursor: pointer; }
        .feather-icon .icon-container svg {
            color: #bfc9d4;
            margin-right: 6px;
            vertical-align: middle;
            width: 20px;
            height: 20px;
            fill: rgba(0, 23, 55, 0.08);
        }
        .feather-icon .icon-container:hover svg {
            color: #888ea8;
        }
        .feather-icon .icon-container span { display: none; }
        .feather-icon .icon-container:hover span { color: #888ea8; }
        .feather-icon .icon-link {
            color: #888ea8;
            font-weight: 600;
            font-size: 14px;
        }

    </style>
@endsection

@section('content')
        <!--  BEGIN CONTENT AREA  -->

<div class="col-lg-12" style="margin-top: 5px;">
    <div class="widget-content widget-content-area">
    	<h5 class="text-center">Trading Market</h5><hr>
    	<div class="row">
    		<div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-account-invoice-two">
                    <div class="info">
                        <h6 class="">Onion Bd</h6>
                        <p class="inv-balance">$103,44</p>
                    </div>
                    <div class="acc-action text-success">
                        <i data-feather="arrow-up"></i><span class="icon-name"></span><strong> 2.9%</strong>
                    </div>
                </div>
            </div>
    		<div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-account-invoice-two">
                    <div class="info">
                        <h6 class="">Onion Bd</h6>
                        <p class="inv-balance">$103,44</p>
                    </div>
                    <div class="acc-action text-danger">
                        <i data-feather="arrow-down"></i><span class="icon-name"></span><strong> 2.9%</strong>
                    </div>
                </div>
            </div>
    		<div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-account-invoice-two">
                    <div class="info">
                        <h6 class="">Onion Bd</h6>
                        <p class="inv-balance">$103,44</p>
                    </div>
                    <div class="acc-action text-success">
                        <i data-feather="arrow-up"></i><span class="icon-name"></span><strong> 2.9%</strong>
                    </div>
                </div>
            </div>
    		<div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-account-invoice-two">
                    <div class="info">
                        <h6 class="">Onion Bd</h6>
                        <p class="inv-balance">$103,44</p>
                    </div>
                    <div class="acc-action text-danger">
                        <i data-feather="arrow-down"></i><span class="icon-name"></span><strong> 2.9%</strong>
                    </div>
                </div>
            </div>
    		<div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-account-invoice-two">
                    <div class="info">
                        <h6 class="">Onion Bd</h6>
                        <p class="inv-balance">$103,44</p>
                    </div>
                    <div class="acc-action text-success">
                        <i data-feather="arrow-up"></i><span class="icon-name"></span><strong> 2.9%</strong>
                    </div>
                </div>
            </div>
    		<div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-account-invoice-two">
                    <div class="info">
                        <h6 class="">Onion Bd</h6>
                        <p class="inv-balance">$103,44</p>
                    </div>
                    <div class="acc-action text-success">
                        <i data-feather="arrow-up"></i><span class="icon-name"></span><strong> 2.9%</strong>
                    </div>
                </div>
            </div>
    	</div>                	
    </div>
</div>


<div class="col-lg-12" style="margin-top: 5px;">
    <div class="widget-content widget-content-area">
        <div class="table-responsive mb-4">
            <table id="individual-col-search" class="table table-hover">
                <thead>
                    <tr>
                        <th>@lang('Name')</th>
                        <th>@lang('Products')</th>
                        <th>@lang('Price')</th>
                        <th>@lang('Stock')</th>
                        <th>@lang('Volium')</th>
                        <th>@lang('24 Hours Change')</th>
                        <th>@lang('Market')</th>
                    </tr>
                </thead>

                <tbody>
                	<tr>
                    	<td>Onion Bd</td>
                    	<td>Image</td>
                    	<td>$100.59</td>
                    	<td>1000kg</td>
                    	<td>50000kg</td>
                    	<td class="text-danger">
                         <i data-feather="arrow-down"></i><span class="icon-name"></span><strong> 2.9%</strong></td>
                    	<td><a href="#" class="btn btn-outline-info btn-lg">Trade Market=></a></td>
                	</tr>
                	<tr>
                    	<td>Onion Bd</td>
                    	<td>Image</td>
                    	<td>$100.59</td>
                    	<td>1000kg</td>
                    	<td>50000kg</td>
                    	<td class="text-success"><i data-feather="arrow-up"></i><span class="icon-name"></span><strong> 2.9%</strong></td>
                    	<td><a href="#" class="btn btn-outline-info btn-lg">Trade Market=></a></td>
                	</tr>
                	<tr>
                    	<td>Onion Bd</td>
                    	<td>Image</td>
                    	<td>$100.59</td>
                    	<td>1000kg</td>
                    	<td>50000kg</td>
                    	<td class="text-danger"><i data-feather="arrow-down"></i><span class="icon-name"></span><strong> 2.9%</strong></td>
                    	<td><a href="#" class="btn btn-outline-info btn-lg">Trade Market=></a></td>
                	</tr>
                	<tr>
                    	<td>Onion Bd</td>
                    	<td>Image</td>
                    	<td>$100.59</td>
                    	<td>1000kg</td>
                    	<td>50000kg</td>
                    	<td class="text-danger"><i data-feather="arrow-down"></i><span class="icon-name"></span><strong> 2.9%</strong></td>
                    	<td><a href="#" class="btn btn-outline-info btn-lg">Trade Market=></a></td>
                	</tr>
                	<tr>
                    	<td>Onion Bd</td>
                    	<td>Image</td>
                    	<td>$100.59</td>
                    	<td>1000kg</td>
                    	<td>50000kg</td>
                    	<td>2.8%</td>
                    	<td><a href="#" class="btn btn-outline-info btn-lg">Trade Market=></a></td>
                	</tr>
                	<tr>
                    	<td>Onion Bd</td>
                    	<td>Image</td>
                    	<td>$100.59</td>
                    	<td>1000kg</td>
                    	<td>50000kg</td>
                    	<td>2.8%</td>
                    	<td><a href="#" class="btn btn-outline-info btn-lg">Trade Market=></a></td>
                	</tr>
                	<tr>
                    	<td>Onion Bd</td>
                    	<td>Image</td>
                    	<td>$100.59</td>
                    	<td>1000kg</td>
                    	<td>50000kg</td>
                    	<td>2.8%</td>
                    	<td><a href="#" class="btn btn-outline-info btn-lg">Trade Market=></a></td>
                	</tr>
                	<tr>
                    	<td>Onion Bd</td>
                    	<td>Image</td>
                    	<td>$100.59</td>
                    	<td>1000kg</td>
                    	<td>50000kg</td>
                    	<td>2.8%</td>
                    	<td><a href="#" class="btn btn-outline-info btn-lg">Trade Market=></a></td>
                	</tr>
                	
                </tbody>


                <tfoot>
                	<tr>
                        <th>@lang('Products')</th>
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                        <th class="invisible"></th>
                	</tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


        <!--  END CONTENT AREA  -->

    @section('js')
    <script src="{{asset('newpos')}}/plugins/table/datatable/datatables.js"></script>
    <script src="{{asset('newpos')}}/plugins/table/datatable/custom_miscellaneous.js"></script>

    <script src="{{asset('newpos')}}/assets/js/scrollspyNav.js"></script>
    <script src="{{asset('newpos')}}/plugins/font-icons/feather/feather.min.js"></script>
    <script type="text/javascript">
        feather.replace();
    </script>
    @endsection
@endsection