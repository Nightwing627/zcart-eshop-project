<?php
namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\MessageBag;
use App\Http\Requests\Validations\InventoryUploadRequest;
use App\Http\Requests\Validations\InventoryImportRequest;
use App\Jobs\ProcessInventoryCsvBulkUpload as ProcessUpload;

class InventoryUploadController extends Controller
{
	/**
	 * Show upload form
	 *
     * @return \Illuminate\Http\Response
	 */
	public function showForm()
	{
        return view('admin.inventory._upload_form');
	}

	/**
	 * Upload the csv file and generate the review table
	 *
	 * @param  InventoryUploadRequest $request
     * @return \Illuminate\Http\Response
	 */
	public function upload(InventoryUploadRequest $request)
	{
		$path = $request->file('inventories')->getRealPath();

		$data = array_map('str_getcsv', file($path));
		$data[0] = array_map('strtolower', $data[0]);

	    array_walk($data, function(&$a) use ($data) {
	      $a = array_combine($data[0], $a);
	    });
	    array_shift($data); # remove header column

	    // Validations check for csv_import_limit
	    if(count($rows) > get_csv_import_limit()){
	    	$message_bag = (new MessageBag)->add('error', trans('validation.upload_rows', ['rows' => get_csv_import_limit()]));
	    	return back()->withErrors($message_bag);
	    }

	    $rows = [];
	    foreach ($data as $values)
	    	$rows[] = clear_encoding_str($values);

        return view('admin.inventory.upload_review', compact('rows'));
	}

	/**
	 * Perform import action
	 *
	 * @param  InventoryImportRequest $request
     * @return \Illuminate\Http\Response
	 */
	public function import(InventoryImportRequest $request)
	{
        if( config('app.demo') == true )
            return redirect()->route('admin.stock.inventory.index')->with('warning', trans('messages.demo_restriction'));

        ProcessUpload::dispatch(Auth::user(), $request->input('data'));

        return redirect()->route('admin.stock.inventory.index')->with('global_notice', trans('messages.csv_import_process_started'));
	}

	/**
	 * downloadTemplate
	 *
	 * @return response response
	 */
	public function downloadTemplate()
	{
		$pathToFile = public_path("csv_templates/inventories.csv");

		return response()->download($pathToFile);
	}

	/**
	 * [downloadFailedRows]
	 *
	 * @param  Excel  $excel
	 */
	public function downloadFailedRows(Request $request)
	{
		foreach ($request->input('data') as $row){
			$data[] = unserialize($row);
		}

		return (new FastExcel(collect($data)))->download('failed_rows.xlsx');
	}

}
