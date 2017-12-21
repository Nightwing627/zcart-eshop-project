<div class="form-group">
    {!! Form::label('subject', trans('app.form.subject').'*') !!}
    {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.subject'), 'required']) !!}
    <div class="help-block with-errors"></div>
</div>

<div class="form-group">
    {!! Form::label('message', trans('app.form.message').'*') !!}
    {!! Form::textarea('message', Null, ['class' => 'form-control summernote', 'rows' => '2', 'placeholder' => trans('app.placeholder.message'), 'required']) !!}
    <div class="help-block with-errors"></div>
</div>