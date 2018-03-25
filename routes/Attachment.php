<?php
	Route::get('download/{attachment}', 'AttachmentController@download')->name('attachment.download');

	Route::post('delete/{attachment}', 'AttachmentController@delete')->name('attachment.delete');