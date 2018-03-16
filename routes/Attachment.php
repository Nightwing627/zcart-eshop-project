<?php
	Route::get('attachment/{attachment}', 'AttachmentController@show')->name('attachment.show');

	Route::get('download/{attachment}', 'AttachmentController@download')->name('attachment.download');

	Route::post('delete/{attachment}', 'AttachmentController@delete')->name('attachment.delete');

	Route::post('upload', 'AttachmentController@upload')->name('attachment.upload');

	Route::post('attachment/sort', 'AttachmentController@sort')->name('attachment.sort');

	// Route::get('storage/{filename}', function ($filename)
	// {
	//     return Image::make(storage_path('public/' . $filename))->response();
	// });

	// Route::get('download/{filename}', function($filename)
	// {
	//     // Check if file exists in app/storage/file folder
	//     // $file_path = storage_path($filename);
	//     $file_path = storage_path($filename);
	// 	echo "<pre>"; print_r($file_path); echo "</pre>"; exit();
	//     if (file_exists($file_path)){
	//         // Send Download
	//         return Response::download($file_path, $filename, [
	//             'Content-Length: '. filesize($file_path)
	//         ]);
	//     }

	// 	return back()->with('error', trans('messages.file_not_exist'));
	// })
	// ->where('filename', '[A-Za-z0-9\-\_\.]+')->name('attachment.download');