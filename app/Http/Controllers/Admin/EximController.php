<?php namespace App\Http\Controllers\Admin;

use App\Product;
use App\Customer;
use Maatwebsite\Excel\Excel;
// use League\Csv\Reader;
// use League\Csv\Writer;
use Illuminate\Http\Request;
use App\Http\Requests\ExportRequest;
use App\Http\Requests\ImportRequest;
use App\Http\Controllers\Controller;

class EximController extends Controller
{
	public $excel;

	// public function __construct(Excel $excel)
	// {
	//     $this->excel = $excel;
	// }

	/**
	 * [index description]
	 * @param  str $table
     * @return \Illuminate\Http\Response
	 */
	public function index($table)
	{
        return view('admin.exim', compact('table', $table));
	}


	public function import(ImportRequest $request)
	{
		if($request->file('csv_file')){
			$path = $request->file('csv_file')->getRealPath();

			$csv = array_map('str_getcsv', file($path));
		    // array_walk($csv, function(&$a) use ($csv) {
		    //   $a = array_combine($csv[0], $a);
		    // });
		    // array_shift($csv); # remove column header

		    // $data = array_map('str_getcsv', file($path));

			echo "<pre/>"; print_r($csv); exit();

			// $csv = Reader::createFromPath($path, 'r');

			// echo "<pre/>"; print_r($csv); exit();

			$header = $csv->getHeader(); //returns the CSV header record
			$records = $csv->getRecords(); //returns all the CSV records as an Iterator object

			echo "<pre/>"; print_r($records); exit();
		}

		echo "<pre>"; print_r('this'); echo "</pre>"; exit();


		// echo "<pre/>"; print_r('Modify the import'); exit();
	}

	public function export(ExportRequest $request)
	{
        $customer = Customer::all();
		$csv = Writer::createFromFileObject(new \SplTempFileObject());
		$csv->insertOne(\Schema::getColumnListing('customer'));

		foreach ($customer as $person) {
		    $csv->insertOne($person->toArray());
		}

		$csv->output('customer.csv');

		echo "<pre>"; print_r('this'); echo "</pre>"; exit();


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

}
