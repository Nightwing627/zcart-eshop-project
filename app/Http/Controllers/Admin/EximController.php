<?php namespace App\Http\Controllers\Admin;

use Excel;
use App\Product;
use App\Country;
use App\Category;
use App\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Requests\ExportRequest;
use App\Http\Requests\ImportRequest;
use App\Http\Controllers\Controller;

class EximController extends Controller
{

	/**
	 * [index description]
	 * @param  str $table
     * @return \Illuminate\Http\Response
	 */
	public function index($table)
	{
        return view('admin.exim', compact('table',$table));
	}

	public function export(ExportRequest $request)
	{
			echo "<pre/>"; print_r($_POST); exit();
// $users = User::select('id', 'name', 'email', 'created_at')->get();
		// $export = ucwords($export);

		$export = Product::All();
		Excel::create('export', function($excel) use($export) {
			$excel->sheet('Sheet 1', function($sheet) use($export) {
				$sheet->fromArray($export);
			});
		})->export("$formate");

		// echo "<pre/>"; print_r($export); exit();

	}

	public function import(ImportRequest $request)
	{
		echo "<pre/>"; print_r('Modify the import'); exit();
	}

}
