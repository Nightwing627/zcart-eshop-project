@extends('admin.layouts.master')

@section('content')
	@php
		$requestLabel = request()->route()->parameters['label'];
	@endphp

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-2 nopadding">
        	@include('admin.message._left_nav')
        </div>
        <!-- /.col -->
        <div class="col-md-10 nopadding-right">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ get_msg_folder_name_from_label($requestLabel) }}</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              	<div class="mailbox-controls">
	                <!-- Check all button -->
					<div class="btn-group ">
						<button type="button" class="btn btn-sm btn-default checkbox-toggle"><i class="fa fa-square-o" data-toggle="tooltip" data-placement="top" title="{{ trans('app.select_all') }}"></i>
						</button>
						<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<span class="caret"></span>
							<span class="sr-only">Toggle Dropdown</span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ route('admin.support.message.massUpdate', [App\Message::STATUS_NEW, 'status']) }}" class="massAction" data-doafter="reload">
								<i class="fa fa-envelope-o"></i> {{ trans('app.new') }}</a></li>
							<li><a href="{{ route('admin.support.message.massUpdate', App\Message::STATUS_READ, 'status') }}" class="massAction" data-doafter="reload"><i class="fa fa-envelope-open"></i> {{ trans('app.read') }}</a></li>
							<li><a href="{{ route('admin.support.message.massUpdate', App\Message::STATUS_UNREAD, 'status') }}" class="massAction" data-doafter="reload"><i class="fa fa-envelope"></i> {{ trans('app.unread') }}</a></li>
							<li class="divider"></li>

							@if($requestLabel <= \App\Message::LABEL_DRAFT)
								<li><a href="{{ route('admin.support.message.massUpdate', App\Message::LABEL_SPAM, 'label') }}" class="massAction" data-doafter="remove"><i class="fa fa-filter"></i> {{ trans('app.spam') }}</a></li>

								<li><a href="{{ route('admin.support.message.massUpdate', App\Message::LABEL_TRASH, 'label') }}" class="massAction" data-doafter="remove"><i class="fa fa-trash"></i> {{ trans('app.trash') }}</a></li>
							@else
								<li><a href="{{ route('admin.support.message.massUpdate', App\Message::LABEL_INBOX, 'label') }}" class="massAction" data-doafter="remove"><i class="fa fa-inbox"></i> {{ trans('app.move_to_inbox') }}</a></li>
							@endif

							@if($requestLabel > \App\Message::LABEL_DRAFT)
								<li><a href="{{ route('admin.support.message.massDestroy') }}" class="massAction" data-doafter="remove"><i class="glyphicon glyphicon-trash"></i> {{ trans('app.delete_permanently') }}</a></li>
							@endif

						</ul>
	                </div>

	                <button type="button" class="btn btn-default btn-sm" onClick="window.location.reload();"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="{{ trans('app.refresh') }}"></i></button>

	                <div class="pull-right">
	                  1-50/200
	                  <div class="btn-group">
	                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
	                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
	                  </div>
	                  <!-- /.btn-group -->
	                </div>
	                <!-- /.pull-right -->
              	</div>

              	<div class="table-responsive mailbox-messages" id="massSelectArea">
			    	{{-- {!! Form::open(['route' => 'admin.support.message.massUpdate', 'id' => 'massUpdateForm', 'data-toggle' => 'validator']) !!} --}}
	                <table class="table table-hover table-striped">
	                  	<tbody>
							@foreach($messages as $message)
	                  		<tr id="item_{{ $message->id }}">
			                    <td><input id="{{ $message->id }}" type="checkbox" class="massCheck"></td>
			                    <td class="mailbox-name">
			                    	<a href="{{ route('admin.support.message.show', $message) }}">
										{{ $message->customer->name }}
			                    	</a>
			                	</td>
			                    <td class="mailbox-subject">
			                    	<a href="{{ route('admin.support.message.show', $message) }}">
			                    		<b>{{ $message->subject }}</b> - {{ str_limit($message->message, 180 - strlen($message->subject)) }}
			                    	</a>
			                    </td>
			                    <td class="">
			                    	<small>
				                    	@if($message->status < $message::STATUS_READ)
				                    		{!! $message->statusName() !!}
										@endif
				                    	@if($message->about())
											{!! $message->about() !!}
										@endif
				                    	@if($message->replies_count)
					                    	<span class="label label-default" data-toggle="tooltip" data-placement="top" title="{{ trans('app.replies') }}">{{ $message->replies_count }}</span>
										@endif
									</small>
			                    </td>
			                    <td class="mailbox-attachment">
			                    	@if($message->hasAttachments())
				                    	<i class="fa fa-paperclip" data-toggle="tooltip" data-placement="top" title="{{ trans('app.attachments') }}"></i>
									@endif
			                    </td>
			                    <td class="mailbox-date">{{ $message->updated_at->diffForHumans() }}</td>
	                  		</tr>
							@endforeach
	                  	</tbody>
	                </table>
	                <!-- /.table -->
			        {{-- {!! Form::close() !!} --}}
              	</div>
              	<!-- /.mail-box-messages -->
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


{{--
<td class="row-options">
	@can('view', $message)
		<a href="{{ route('admin.support.message.show', $message->id) }}"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.detail') }}" class="fa fa-expand"></i></a>&nbsp;
	@endcan

	@can('reply', $message)
		<a href="{{ route('admin.support.message.reply', $message) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.reply') }}" class="fa fa-reply"></i></a>&nbsp;
	@endcan

	@can('update', $message)
		<a href="{{ route('admin.support.message.edit', $message->id) }}" data-target="myDynamicModal" data-toggle="modal"><i data-toggle="tooltip" data-placement="top" title="{{ trans('app.update') }}" class="fa fa-edit"></i></a>&nbsp;
	@endcan

	@can('delete', $message)
		{!! Form::open(['route' => ['admin.support.message.trash', $message->id], 'method' => 'delete', 'class' => 'data-form']) !!}
			{!! Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'confirm ajax-silent', 'title' => trans('app.trash'), 'data-toggle' => 'tooltip', 'data-placement' => 'top']) !!}
		{!! Form::close() !!}
	@endcan
</td>
--}}

@endsection
