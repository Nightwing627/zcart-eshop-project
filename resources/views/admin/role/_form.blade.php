<div class="row">
  <div class="col-md-8 nopadding-right">
    <div class="form-group">
      {!! Form::label('name', trans('app.form.name').'*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.role_name') }}"></i>
      {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('app.placeholder.role_name'), 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>
  <div class="col-md-4 nopadding-left">
    <div class="form-group">
      {!! Form::label('public', trans('app.form.role_type').'*', ['class' => 'with-help']) !!}
      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{ trans('help.role_type') }}"></i>
      {!! Form::select('public', ['0' => trans('app.restricted'), '1' => trans('app.public')], null, ['id' => 'user-role-status', 'class' => 'form-control select2-normal', 'placeholder' => trans('app.placeholder.status'), 'required']) !!}
      <div class="help-block with-errors"></div>
    </div>
  </div>
</div>

<div class="form-group">
  {!! Form::label('description', trans('app.form.description')) !!}
  {!! Form::textarea('description', null, ['class' => 'form-control summernote', 'placeholder' => trans('app.placeholder.description')]) !!}
</div>

<div class="form-group">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>
            {!! Form::label('modules', trans('app.modules'), ['class' => 'with-help']) !!}
            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.permission_modules') }}"></i>
          </th>
          <th>
            {!! Form::label('permissions', trans('app.form.permissions'), ['class' => 'with-help']) !!}
            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="top" title="{{ trans('help.set_role_permissions') }}"></i>
          </th>
        </tr>
      </thead>
    </table>
    <table class="table table-striped" id="tbl-permissions">
      <tbody>
        @php
          $role_permissions = isset($role) ? $role->permissions()->pluck('slug')->toArray() : [];
        @endphp
        @foreach($modules as $module)
          @php
            $access_level = snake_case($module->access);
            $module_name = snake_case($module->name);
            $module_enabled = find_string_in_array($role_permissions, $module_name);
          @endphp
          <tr class="{{ $access_level . '-module'}}"
            {{
              ('common' == $access_level ||
                isset($role) &&
                (
                  ($role->public == 1 && 'merchant' == $access_level) ||
                  ($role->public == 0 && 'platform' == $access_level)
                )
              ) ? 'show' : 'hidden' }}>
            <td>
              {{ Form::hidden($module_name, 0) }}
              {!! Form::checkbox($module_name, Null, $module_enabled ? 1 : Null, ['id' => $module_name, 'class' => 'icheckbox_line role-module']) !!}
              {!! Form::label($module_name, strtoupper($module->name)) !!}
            </td>
            @foreach($module->permissions as $permission)
              <td>
                <div class="checkbox">
                    <label class="">
                        {!! Form::checkbox("permissions[]", $permission->id, Null, ['class' => $module_name . '-permission icheck', $module_enabled ? '' : 'disabled']) !!} {{ $permission->name }}
                    </label>
                </div>
              </td>
            @endforeach
          </tr>
        @endforeach
      </tbody>
    </table>
</div>

<p class="help-block">* {{ trans('app.form.required_fields') }}</p>