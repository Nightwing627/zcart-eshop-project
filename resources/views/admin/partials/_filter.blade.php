<div class="box collapsed-box">
	<div class="box-header with-bcart">
		<h3 class="box-title"><i class="fa fa-filter"></i> </h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn bg-orange btn-flat" data-widget="collapse"><i class="fa fa-plus"></i> {{ trans('app.filter') }}</button>
		</div>
	</div> <!-- /.box-header -->
	<div class="box-body">
	    {!! Form::open(['route' => 'admin.order.order.create', 'method' => 'get', 'id' => 'form', 'data-toggle' => 'validator']) !!}
	    <div class="row">
	    	<div class="col-md-4 nopadding-right">
			    <div class="form-group">
			        {!! Form::label('customer_id', trans('app.form.by_customer')) !!}
			        {!! Form::select('customer_id', $customers , null, ['class' => 'form-control select2', 'placeholder' => trans('app.placeholder.filter_by_customer')]) !!}
			      <div class="help-block with-errors"></div>
			    </div>
	    	</div>
	    	<div class="col-md-4 sm-padding">
			    <div class="form-group">
			        {!! Form::label('status_id', trans('app.form.by_status')) !!}
			        {!! Form::select('status_id', $statuses , null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.filter_by_status')]) !!}
			      <div class="help-block with-errors"></div>
			    </div>
	    	</div>
	    	<div class="col-md-4 nopadding-left">
			    <div class="form-group">
			        {!! Form::label('payment_status_id', trans('app.form.by_payments')) !!}
			        {!! Form::select('payment_status_id', $payments , null, ['class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.filter_by_status')]) !!}
			      <div class="help-block with-errors"></div>
			    </div>
	    	</div>
	    </div>

        {!! Form::submit(trans('app.form.proceed'), ['class' => 'btn btn-flat btn-new']) !!}

	    {!! Form::close() !!}
	</div> <!-- /.box-body -->
</div> <!-- /.box -->
