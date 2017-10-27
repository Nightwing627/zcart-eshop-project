<div class="modal-dialog modal-md">
    <div class="modal-content">
        {!! Form::open(['route' => 'admin.order.order.find', 'method' => 'get', 'id' => 'form', 'data-toggle' => 'validator']) !!}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        	{{ trans('app.form.search') }}
        </div>
        <div class="modal-body">
            <div class="form-group">
                {!! Form::label('search', trans('app.form.search_customer')) !!}
                <div class="input-group">
                  {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.search_customer'), 'required']) !!}
                  <span class="input-group-addon" id="basic-addon1" data-toggle="tooltip" data-placement="left" title="{{ trans('help.search_customer') }}"><i class="fa fa-question-circle"></i></span>
                </div>
              <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="modal-footer">
            {!! Form::submit(trans('app.form.proceed'), ['class' => 'btn btn-flat btn-new']) !!}
        </div>
        {!! Form::close() !!}
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog -->

