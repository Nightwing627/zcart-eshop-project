<div class="modal-dialog modal-md">
    <div class="modal-content">
    	{!! Form::open(['route' => 'admin.import', 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']) !!}
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        	{{ trans('app.import') }}
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-9 nopadding-right">
                    <input id="uploadFile" placeholder="{{ trans('app.placeholder.select_csv_file') }}" class="form-control" disabled="disabled" style="height: 28px;" />
                </div>
                <div class="col-md-3 nopadding-left">
                    <div class="fileUpload btn btn-primary btn-block btn-flat">
                      <span>{{ trans('app.form.upload') }}</span>
                      <input type="file" name="csv_file" id="uploadBtn" class="upload" />
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            {!! Form::submit(trans('app.form.upload'), ['class' => 'btn btn-flat btn-new']) !!}
        </div>
        {!! Form::close() !!}
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog -->
