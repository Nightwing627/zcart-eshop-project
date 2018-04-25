<div class="box collapsed-box">
	<div class="box-header with-bcart">
		<h3 class="box-title"><i class="fa fa-cubes"></i> </h3>
		<div class="box-tools pull-right">
			<a href="{{ route('admin.exim', 'products') }}" class="ajax-modal-btn btn btn-new btn-flat">{{ trans('app.exim') }}</a>

			<button type="button" class="btn btn-new btn-flat" data-widget="collapse"><i class="fa fa-plus"></i> {{ trans('app.add_inventory') }}</button>
		</div>
	</div> <!-- /.box-header -->

	<div class="box-body">
        <div class="form-group">
          <div class="input-group input-group-lg">
            <span class="input-group-addon"> <i class="fa fa-search text-muted"></i> </span>
            {!! Form::text('searchProduct', null, ['id' => 'searchProduct', 'class' => 'form-control', 'placeholder' => trans('app.placeholder.search_product')]) !!}
          </div>
        </div>
        <div id="productFounds"></div>
	</div> <!-- /.box-body -->
</div> <!-- /.box -->