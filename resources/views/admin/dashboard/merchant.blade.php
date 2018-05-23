@extends('admin.layouts.master')

{{-- @section('buttons')
@endsection --}}

@section('content')

	@include('admin.partials._subscription_notice')

    @if(! Auth::user()->isVerified())
		<div class="alert alert-info alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<strong><i class="icon fa fa-info-circle"></i>{{ trans('app.notice') }}</strong>
			{{ trans('messages.email_verification_notice') }}
	    	<a href="{{ route('verify') }}">{{ trans('app.resend_varification_link') }}</a>
		</div>
    @endif

	@if(Request::session()->has('impersonated'))
		<strong>Impersonated ID :: {{ Request::session()->get('impersonated') }}</strong>
	@endif

    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Unfulfilled Orders</span>
              <span class="info-box-number">90</span>

              	<div class="progress">
                	<div class="progress-bar progress-bar-warning" style="width: 70%"></div>
              	</div>
              	<span class="progress-description">
                    70% of today's total
                </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              	<span class="info-box-text">Last sale</span>
              	<span class="info-box-number">41,410</span>
              	<div class="progress" style="background: transparent;"></div>
              	<span class="progress-description">
                    1 hour ago
                </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Today's Total</span>
              <span class="info-box-number">760</span>

              	<div class="progress">
                	<div class="progress-bar progress-bar-success" style="width: 70%"></div>
              	</div>
              	<span class="progress-description">
              		<i class="fa fa-arrow-up small text-muted"></i>
                    70% from yesterday
                </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-cogs"></i></span>

            <div class="info-box-content">
              	<span class="info-box-text">Resource Uses</span>
              	<span class="info-box-number">20%</span>

              	<div class="progress">
                	<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              	</div>
              	<span class="progress-description">
                    70% Increase in 30 Days
                </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-8 col-sm-7 col-xs-12">
			{{-- @if(Auth::user()->isOnGracePeriod()) --}}
				<div class="callout callout-danger">
			        <h4>
			        	<i class="icon fa fa-bell-o"></i> {{ trans('app.alert') }}
			    		<a href="{{ route('admin.account.subscription.resume') }}" class="btn bg-navy pull-right"><i class="fa fa-rocket"></i>  {{ trans('app.take_action') }}</a>
			        </h4>

			        <p>{{ trans('messages.you_have_disputes_solve', ['disputes' => 13]) }}</p>
			    </div>
			{{-- @endif --}}

			{{-- @if(Auth::user()->isOnGracePeriod()) --}}
				<div class="callout callout-warning">
			        <h4>
			        	<i class="icon fa fa-bell-o"></i> {{ trans('app.alert') }}
			    		<a href="{{ route('admin.account.subscription.resume') }}" class="btn bg-navy pull-right"><i class="fa fa-rocket"></i>  {{ trans('app.take_action') }}</a>
			        </h4>

			        <p>{{ trans('messages.you_have_refund_request', ['requests' => 6]) }}</p>
			    </div>
			{{-- @endif --}}

          	<!-- TABLE: LATEST ORDERS -->
         	<div class="box">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs nav-justified">
						<li class="active"><a href="#orders_tab" data-toggle="tab">
							<i class="fa fa-shopping-cart hidden-sm"></i>
							{{ trans('app.latest_orders') }}
						</a></li>
						<li><a href="#inventory_tab" data-toggle="tab">
							<i class="fa fa-cubes hidden-sm"></i>
							{{ trans('app.recently_added_products') }}
						</a></li>
						<li><a href="#low_stock_tab" data-toggle="tab">
							<i class="fa fa-cube hidden-sm"></i>
							{{ trans('app.low_stock_items') }}
						</a></li>
					</ul>
		            <!-- /.nav .nav-tabs -->

					<div class="tab-content">
					    <div class="tab-pane active" id="orders_tab">
				            <div class="box-body">
				              <div class="table-responsive">
				                <table class="table no-margin">
				                  <thead>
				                  <tr>
				                    <th>Order ID</th>
				                    <th>Item</th>
				                    <th>Status</th>
				                    <th>Popularity</th>
				                  </tr>
				                  </thead>
				                  <tbody>
				                  <tr>
				                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
				                    <td>Call of Duty IV</td>
				                    <td><span class="label label-success">Shipped</span></td>
				                    <td>
				                      <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
				                    </td>
				                  </tr>
				                  <tr>
				                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
				                    <td>Samsung Smart TV</td>
				                    <td><span class="label label-warning">Pending</span></td>
				                    <td>
				                      <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
				                    </td>
				                  </tr>
				                  <tr>
				                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
				                    <td>iPhone 6 Plus</td>
				                    <td><span class="label label-danger">Delivered</span></td>
				                    <td>
				                      <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
				                    </td>
				                  </tr>
				                  <tr>
				                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
				                    <td>Samsung Smart TV</td>
				                    <td><span class="label label-info">Processing</span></td>
				                    <td>
				                      <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
				                    </td>
				                  </tr>
				                  <tr>
				                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
				                    <td>Samsung Smart TV</td>
				                    <td><span class="label label-warning">Pending</span></td>
				                    <td>
				                      <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
				                    </td>
				                  </tr>
				                  <tr>
				                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
				                    <td>iPhone 6 Plus</td>
				                    <td><span class="label label-danger">Delivered</span></td>
				                    <td>
				                      <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
				                    </td>
				                  </tr>
				                  <tr>
				                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
				                    <td>Call of Duty IV</td>
				                    <td><span class="label label-success">Shipped</span></td>
				                    <td>
				                      <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
				                    </td>
				                  </tr>
				                  </tbody>
				                </table>
				              </div>
				              <!-- /.table-responsive -->
				            </div>
				            <!-- /.box-body -->
				            <div class="box-footer clearfix">
				              <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
				              <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
				            </div>
				            <!-- /.box-footer -->
						</div>
			            <!-- /.tab-pane -->
					    <div class="tab-pane" id="inventory_tab">
					    	<p>recently_added_products</p>
						</div>
			            <!-- /.tab-pane -->
					    <div class="tab-pane" id="low_stock_tab">
					    	<p>low_stock_items</p>
						</div>
			            <!-- /.tab-pane -->
					</div>
		            <!-- /.tab-content -->
				</div>
	            <!-- /.nav-tabs-custom -->
          	</div>
          	<!-- /.box -->
	    </div>

        <div class="col-md-4 col-sm-5 col-xs-12 nopadding-left">
        	{{-- @if('plan resourse usesing 80% +') --}}
          		<div class="box box-solid">
					<div class="box-header">
						<h3 class="box-title text-warning"><i class="fa fa-cogs"></i> Resource Uses</h3>
						<div class="box-tools pull-right">
		                	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
	            	<!-- /.box-header -->
		            <div class="box-body">
		              	<span class="progress-description">
		                    User
		                </span>
						<div class="progress active">
			                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
			                  <span class="show">40% Complete</span>
			                </div>
			            </div>

		              	<span class="progress-description">
		                    Stock
		                </span>
						<div class="progress active">
			                <div class="progress-bar progress-bar-red progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
			                  <span class="show">80% Complete</span>
			                </div>
			            </div>

						<div class="callout callout-info" style="margin-bottom: 0!important;">
			            	<i class="fa fa-support"></i> It's time to updgreade your plan
					    </div>
		        	</div>
					<div class="box-footer">
						<div class="box-tools pull-right">
		                	<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" data-placement="left" title="{{ trans('app.never_show_this') }}"><i class="fa fa-trash"></i></button>
						</div>
					</div>
		        </div>
        	{{-- @endif --}}

          	<div class="box box-solid">
	            <div class="box-header with-border">
	              <h3 class="box-title text-warning">Last 15 days</h3>
	              <div class="box-tools pull-right">
	                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
	              </div>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	            	<p><span class="lead"> Sales: {{ '$900' }} </span><span class="pull-right text-muted">14 Orders</span></p>
	        		<div>{!! $chart->container() !!}</div>

        			<table class="table table-default">
        				<thead>
        					<tr>
        						<td><span class="info-box-text"> Brackdown</span></td>
        						<td>&nbsp;</td>
        					</tr>
        				</thead>
        				<tbody>
        					<tr>
        						<td>Orders</td>
        						<td>$1100</td>
        					</tr>
        					<tr>
        						<td>Refunds</td>
        						<td>-$200</td>
        					</tr>
        					<tr>
        						<td>Total Sales</td>
        						<td>$900</td>
        					</tr>
        				</tbody>
        			</table>
	            </div>
	            <!-- /.box-body -->
          	</div>
          	<!-- /.box -->

	        <!-- PRODUCT LIST -->
	        <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title">Top Selling Products</h3>

	              	<div class="box-tools pull-right">
	                	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                	<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	              	</div>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              	<ul class="products-list product-list-in-box">
		                <li class="item">
		                  <div class="product-img">
		                    <img src="http://placehold.it/50" alt="Product Image">
		                  </div>
		                  <div class="product-info">
		                    <a href="javascript::;" class="product-title">Samsung TV
		                      <span class="label label-warning pull-right">$1800</span></a>
		                        <span class="product-description">
		                          Samsung 32" 1080p 60Hz LED Smart HDTV.
		                        </span>
		                  </div>
		                </li>
		                <!-- /.item -->
		                <li class="item">
		                  <div class="product-img">
		                    <img src="http://placehold.it/50" alt="Product Image">
		                  </div>
		                  <div class="product-info">
		                    <a href="javascript::;" class="product-title">Bicycle
		                      <span class="label label-info pull-right">$700</span></a>
		                        <span class="product-description">
		                          26" Mongoose Dolomite Men's 7-speed, Navy Blue.
		                        </span>
		                  </div>
		                </li>
		                <!-- /.item -->
		                <li class="item">
		                  <div class="product-img">
		                    <img src="http://placehold.it/50" alt="Product Image">
		                  </div>
		                  <div class="product-info">
		                    <a href="javascript::;" class="product-title">Xbox One <span class="label label-danger pull-right">$350</span></a>
		                        <span class="product-description">
		                          Xbox One Console Bundle with Halo Master Chief Collection.
		                        </span>
		                  </div>
		                </li>
		                <!-- /.item -->
		                <li class="item">
		                  <div class="product-img">
		                    <img src="http://placehold.it/50" alt="Product Image">
		                  </div>
		                  <div class="product-info">
		                    <a href="javascript::;" class="product-title">PlayStation 4
		                      <span class="label label-success pull-right">$399</span></a>
		                        <span class="product-description">
		                          PlayStation 4 500GB Console (PS4)
		                        </span>
		                  </div>
		                </li>
		                <!-- /.item -->
	              	</ul>
	            </div>
	            <!-- /.box-body -->
	            <div class="box-footer text-center">
	              <a href="javascript::;" class="uppercase">View All Products</a>
	            </div>
	            <!-- /.box-footer -->
	        </div>
	        <!-- /.box -->

			<span class="spacer20"></span>
			<a href="{{ route('admin.support.ticket.index') }}" class="btn btn-default">View Tickets</a>
			<a href="{{ route('admin.support.ticket.create') }}" class="ajax-modal-btn btn btn-default">Submit a Ticket</a>
			<span class="spacer10"></span>
	    </div>
    </div>
    <!-- /.row -->

@endsection

@section('page-script')
	{{-- <script src=//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js charset=utf-8></script> --}}
	<script src=//cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js charset=utf-8></script>
	{{-- <script src="https://code.highcharts.com/js/modules/exporting.js"></script> --}}
	{!! $chart->script() !!}
@endsection
