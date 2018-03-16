<?php

namespace App\Http\Controllers;

use App\Product;
use App\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class AttachmentController extends Controller
{

	public function show(Attachment $attachment)
	{
	}

	/**
	 * upload attachment via ajax. the associated model id and other information will be provided in the request
	 *
	 * @param  Request $request
	 *
	 * @return json
	 */
	public function upload(Request $request)
	{
        // \Log::info('outer:');
        // \Log::info($request->all());
        if ($request->hasFile('attachments')){
			$dir = ends_with($request->input('path'), '/') ?
					rtrim($request->input('path'), '/') :
					$request->input('path');

			$attachments = [];
			$files = $request->file('attachments');

        	foreach ($files as $order => $file) {
		        $path = Storage::put($dir, $file);

				$attachments[] = [
						            'path' => $path,
						            'name' => str_slug($file->getClientOriginalName(), '-'),
						            'extension' => $file->getClientOriginalExtension(),
						            'size' => $file->getClientSize(),
						            'order' => $order
						        ];
			}

        	$product = Product::find($request->input('model_id'));

			if($product->attachments()->createMany($attachments)){
				return Response::json(['success' => trans('response.success')]);
			}
			else{
	            $request->session()->flash('global_msg', trans('messages.img_upload_failed'));
			}

			return Response::json(['error' => trans('responses.error')]);
        }

        return Response::json([]);
	}

	/**
	 * download attachment file
	 *
	 * @param  Request    $request
	 * @param  Attachment $attachment
	 *
	 * @return file
	 */
	public function download(Request $request, Attachment $attachment)
	{
	    if (Storage::exists($attachment->path))
	        return Storage::download($attachment->path, $attachment->name);

		return back()->with('error', trans('messages.file_not_exist'));
	}

	/**
	 * delete attachment via ajax request
	 *
	 * @param  Request    $request
	 * @param  Attachment $attachment
	 *
	 * @return json
	 */
	public function delete(Request $request, Attachment $attachment)
	{
	    if (Storage::exists($attachment->path)){
	        if(Storage::delete($attachment->path)){
	        	$attachment->delete();
				return Response::json(['success' => trans('response.success')]);
	        }

			return Response::json(['error' => trans('response.error')]);
	    }

		return Response::json(['error' => trans('messages.file_not_exist')]);
	}


	/**
	 * sort attachments order via ajax.
	 *
	 * @param  Request $request
	 *
	 * @return json
	 */
	public function sort(Request $request)
	{
        $order = $request->all();
        $attachments = Attachment::find(array_keys($order));

        foreach ($attachments as $attachment) {
        	$attachment->update([ 'order' => $order[$attachment->id] ]);
        }

		return Response::json(['success' => trans('response.success')]);
	}
}
