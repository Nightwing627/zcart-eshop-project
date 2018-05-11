@extends('admin.layouts.master')

@section('content')
	<div class="box">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs nav-justified">
				<li class="{{ Request::is('admin/account/profile') ? 'active' : '' }}"><a href="#profile_tab" data-toggle="tab">
					<i class="fa fa-user hidden-sm"></i>
					{{ trans('app.profile') }}
				</a></li>
				<li class="{{ Request::is('admin/account/billing') ? 'active' : '' }}"><a href="#billing_tab" data-toggle="tab">
					<i class="fa fa-credit-card hidden-sm"></i>
					{{ trans('app.billing') }}
				</a></li>
			</ul>
			<div class="tab-content">
			    <div class="tab-pane {{ Request::is('admin/account/profile') ? 'active' : '' }}" id="profile_tab">
		    		@include('admin.account._profile')
			    </div>
			  	<!-- /.tab-pane -->

			    <div class="tab-pane {{ Request::is('admin/account/billing') ? 'active' : '' }}" id="billing_tab">
		    		@include('admin.account._billing')
			    </div>
			    <!-- /.tab-pane -->
			</div>
			<!-- /.tab-content -->
		</div>
	</div> <!-- /.box -->
@endsection

@section('page-script')

  @include('plugins.stripe-scripts')

@endsection
