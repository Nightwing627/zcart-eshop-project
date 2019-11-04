<?php

namespace App\Http\Controllers;

use App\Image;
use League\Glide\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ImageController extends Controller
{

	private $disk;

    /**
     * The constructor.
     *
     * @param Request        $request
     */
    public function __construct(Request $request)
    {
        $this->disk = Storage::disk(config('filesystems.default'));
    }

    // public function getImages()
    // {
    //     return view('images')->with('images', auth()->user()->images);
    // }

    public function show(Request $request, Server $server, $path)
	{
		$this->setConfigs($request);

        return $server->getImageResponse($path, $request->all());
	}

	/**
	 * upload Image via ajax. the associated model id and other information will be provided in the request
	 *
	 * @param  Request $request
	 *
	 * @return json
	 */
	public function upload(Request $request)
	{
	    $fileBlob = 'fileBlob';		// the parameter name that stores the file blob
	    if ($request->hasFile($fileBlob))
	    {
	        if (! $request->has('model_id') || !$request->has('model_name') )
	            return Response::json(['error' => trans('responses.model_not_defined')]);

	       	// Uploaded file info
			$rawFile = $request->file($fileBlob);
	        $file = $rawFile->getPathName();
	        $realName = $rawFile->getClientOriginalName();
	        $fileExtension = $rawFile->getClientOriginalExtension();
	        $fileSize = $request->input('fileSize') ?? $rawFile->getClientSize();

			// Chunk info
	        // $fileId = $request->input('fileId');         //  the file identifier
	        $index =  $request->input('chunkIndex');        // the current file chunk index
	        $totalChunks = $request->input('chunkCount');   // the total number of chunks for this file

	        // Prepare system info
		    $targetDir = image_storage_dir();
	        $uniqFileName = uniqid() . '.' . $fileExtension;
	        $targetFile = $targetPath = $targetDir . '/' . $uniqFileName;  			// The target file path
			$path = $this->disk->getAdapter()->getPathPrefix() . '/' . $targetDir; 	// Current storage path

	        if ($totalChunks > 1)	// create chunk files only if chunks are greater than 1
	            $targetFile = $targetDir.'/chunk_' . str_pad($index, 4, '0', STR_PAD_LEFT);

	        if( $this->disk->put($targetFile, file_get_contents($file)) )
	        {
	        	$allChunksUploaded = False;

	        	if ($totalChunks > 1)
	        	{
		            $chunks = glob("$path/chunk_*");	// get list of all chunks uploaded so far to server

		            $allChunksUploaded = count($chunks) == $totalChunks;	// all chunks were uploaded

		            if ($allChunksUploaded)
		            {
		                $outFile = $path.'/'.$uniqFileName;
		                $this->combineChunks($chunks, $outFile);	// combines all file chunks to one file
		            }
	        	}

	        	if ($totalChunks == 1 || ($totalChunks > 1 && $allChunksUploaded))
	        	{
		        	$model = get_qualified_model($request->input('model_name'));
		        	$attachable = (new $model)->find($request->input('model_id'));

					$data = [
			            'path' => $targetPath,
			            'name' => $realName,
			            'extension' => $fileExtension,
			            'size' => $fileSize,
			        ];

					if(! $attachable->images()->create($data))
			            return Response::json(['error' => trans('responses.error')]);
	        	}

	            return Response::json([
				                'chunkIndex' => $index,
				                'append' => true
				            ]);
	        } else
	        {
	            return Response::json(['error' => trans('responses.error_uploading_file') . ' ' . $realName]);
	        }
	    }

        // $request->session()->flash('global_msg', trans('messages.img_upload_failed'));

	    return Response::json(['error' => trans('responses.no_file_was_uploaded')]);
	}

	/**
	 * download Image file
	 *
	 * @param  Request    $request
	 * @param  Image $image
	 *
	 * @return file
	 */
	public function download(Request $request, Image $image)
	{
	    if (Storage::exists($image->path))
	        return Storage::download($image->path, $image->name);

		return back()->with('error', trans('messages.file_not_exist'));
	}

	/**
	 * delete Image via ajax request
	 *
	 * @param  Request    $request
	 * @param  Image $image
	 *
	 * @return json
	 */
	public function delete(Request $request, Image $image)
	{
    	$image->delete();

	    if (Storage::exists($image->path)){
	        if(Storage::delete($image->path)){
				Storage::deleteDirectory(image_cache_path($image->path));
				return Response::json(['success' => trans('response.success')]);
	        }

			return Response::json(['error' => trans('response.error')]);
	    }

		return Response::json(['error' => trans('messages.file_not_exist')]);
	}

	/**
	 * sort images order via ajax.
	 *
	 * @param  Request $request
	 *
	 * @return json
	 */
	public function sort(Request $request)
	{
        $order = $request->all();
        $images = Image::find(array_keys($order));

        foreach ($images as $image) {
        	$image->update([ 'order' => $order[$image->id] ]);
        }

		return Response::json(['success' => trans('response.success')]);
	}

	/**
	 * Set Config settings for the image manupulation
	 *
	 * @param Request $request [description]
	 */
	private function setConfigs(Request $request)
	{
		if (config('image.background_color'))
			$request->merge(['bg' => config('image.background_color')]);

		return $request;
	}

	// combine all chunks
	private function combineChunks($chunks, $targetFile)
	{
	    $handle = fopen($targetFile, 'a+');				// open target file handle

	    foreach ($chunks as $chunk){
	        fwrite($handle, file_get_contents($chunk));
	    }

	    fclose($handle);								// close the file handle

	    // after all are done delete the chunks
	    foreach ($chunks as $chunk)
	        @unlink($chunk);
	}

}
