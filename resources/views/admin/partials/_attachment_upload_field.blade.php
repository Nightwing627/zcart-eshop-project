<div class="row">
    <div class="col-md-9 nopadding-right">
        <input id="uploadFile" placeholder="{{ trans('app.placeholder.attachment') }}" class="form-control" disabled="disabled" style="height: 28px;" />
    </div>
    <div class="col-md-3 nopadding-left">
        <div class="fileUpload btn btn-primary btn-block btn-flat">
          	<span>{{ trans('app.form.upload') }}</span>
            <input type="file" name="attachment" id="uploadBtn" class="upload" />
      	</div>
    </div>
</div>