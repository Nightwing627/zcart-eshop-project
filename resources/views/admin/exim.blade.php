<div class="modal-dialog modal-md">
    <div class="modal-content">
    	<?php //echo "<pre/>"; print_r($nice_name); ?>
    	{!! Form::open(['route' => 'admin.export', 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']) !!}
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        	{{ trans('app.form.exim') }}
        </div>
        <div class="modal-body">
        <?php
			echo 'EXIM: '.$table;
		?>
        </div>
        <div class="modal-footer">
            {!! Form::submit(trans('app.form.save'), ['class' => 'btn btn-flat btn-new']) !!}
        </div>
        {!! Form::close() !!}
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog -->
