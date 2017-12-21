<?php
	Route::get('download/{filename}', function($filename)
	{
	    // Check if file exists in app/storage/file folder
	    $file_path = attachment_real_path($filename);

	    if (file_exists($file_path)){
	        // Send Download
	        return Response::download($file_path, $filename, [
	            'Content-Length: '. filesize($file_path)
	        ]);
	    }

		return back()->with('error', trans('messages.file_not_exist'));
	})
	->where('filename', '[A-Za-z0-9\-\_\.]+')->name('attachment.download');