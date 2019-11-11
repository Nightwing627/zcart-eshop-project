<?php
namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use App\Product;
use App\Inventory;
use App\Category;
use App\Packaging;
use App\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Repositories\Inventory\InventoryRepository;
use App\Http\Requests\Validations\ExportCategoryRequest;
use App\Http\Requests\Validations\InventoryUploadRequest;
use App\Http\Requests\Validations\InventoryImportRequest;

class InventoryUploadController extends Controller
{

	private $failed_list = [];

	private $products = [];

    private $inventory;

    /**
     * construct
     */
    public function __construct(InventoryRepository $inventory)
    {
        parent::__construct();

        $this->inventory = $inventory;
    }

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

		// Reset the Failed list
		$this->failed_list = [];

		foreach ($request->input('data') as $row)
		{
			$data = unserialize($row);

			if(! is_array($data)) // Invalid data
				continue;

			// Ignore if required info is not given
			if( ! verifyRequiredDataForBulkUpload($data, 'inventory') )
			{
				$this->pushIntoFailed($data, trans('help.missing_required_data'));
				continue;
			}

			// If the slug is not given the make it
			if( ! $data['slug'] )
    			$data['slug'] = convertToSlugString($data['title'], $data['sku']);

			// Ignore if the slug is exist in the database
			$item = Inventory::select('slug')->mine()->where('slug', $data['slug'])->first();
			if( $item ){
				$this->pushIntoFailed($data, trans('help.slug_already_exist'));
				continue;
			}

			// Find product in the catalo. Ignore the row if product not found
			// First search in the $products to reduce db queries. Usefull when the csv have variants
			$temp = collect($this->products)->first(function ($value, $key) use ($data) {
			    return $value['gtin'] == $data['gtin'] && $value['gtin_type'] == $data['gtin_type'];
			});

			if (! $temp) {
				$product = Product::where('gtin', $data['gtin'])->where('gtin_type', $data['gtin_type'])->first();

				// Push the product to array so next time can get from there
				array_push($this->products, $product);
			}
			else{
				$product = $temp;
			}

			if( ! $product ){
				$this->pushIntoFailed($data, trans('help.invalid_catalog_data'));
				continue;
			}

			// Create the inventory and get it, If failed then insert into the ignored list
			if( ! $this->createInventory($data, $product) ){
				$this->pushIntoFailed($data, trans('help.input_error'));
				continue;
			}

	        $request->session()->flash('success', trans('messages.imported', ['model' => trans('app.inventories')]));
		}

        $failed_rows = $this->getFailedList();

		if(!empty($failed_rows))
	        return view('admin.inventory.import_failed', compact('failed_rows'));

        return redirect()->route('admin.stock.inventory.index');
	}

	/**
	 * Create Product
	 *
	 * @param  array $product
	 * @return App\Product
	 */
	private function createInventory($data, $product)
	{
		$key_features = array_filter($data, function($key) {
		    return strpos($key, 'key_feature_') === 0;
		}, ARRAY_FILTER_USE_KEY);

		if ($data['linked_items']) {
			$temp_arr = explode(',', $data['linked_items']);
			$linked_items = Inventory::select('id')->mine()->whereIn('sku', $temp_arr)->pluck('id')->toArray();
		}

		$inventory = Inventory::create([
						'shop_id' => Auth::user()->merchantId(),
						'title' => $data['title'],
						'slug' => $data['slug'],
						'sku' => $data['sku'],
						'condition' => $data['condition'],
						'condition_note' => $data['condition_note'],
						'description' => $data['description'],
						'product_id' => $product->id,
						'stock_quantity' => $data['stock_quantity'],
						'min_order_quantity' => $data['min_order_quantity'],
						'key_features' => $key_features,
						'brand' => $data['brand'],
						'user_id' => Auth::user()->id,
						'sale_price' => $data['price'],
						'offer_price' => $data['offer_price'] ?: Null,
						'offer_start' => $data['offer_starts'] ? date('Y-m-d h:i a', strtotime($data['offer_starts'])) : Null,
						'offer_end' => $data['offer_ends'] ? date('Y-m-d h:i a', strtotime($data['offer_ends'])) : Null,
						'purchase_price' => $data['purchase_price'],
						'linked_items' => isset($linked_items) ? $linked_items : Null,
						'meta_title' => $data['meta_title'],
						'meta_description' => $data['meta_description'],
						'free_shipping' => strtoupper($data['free_shipping']) == 'TRUE' ? 1 : 0,
						'shipping_weight' => $data['shipping_weight'],
						'available_from' => date('Y-m-d h:i a', strtotime($data['available_from'])),
						'warehouse_id' => $data['warehouse_id'],
						'supplier_id' => $data['supplier_id'],
						'active' => strtoupper($data['active']) == 'TRUE' ? 1 : 0,
					]);

		// Upload images
		// $image_links = array_filter($data, function($key) {
		//     return strpos($key, 'image_link_') === 0;
		// }, ARRAY_FILTER_USE_KEY);

		// if ($image_link)
		// 	$inventory->saveImageFromUrl($image_link);

		if($data['image_links']){
			$image_links = explode(',', $data['image_links']);

			foreach ($image_links as $image_link) {
				if (filter_var($image_link, FILTER_VALIDATE_URL))
	            	$inventory->saveImageFromUrl($image_link);
			}
		}

		// Sync packaging
		if($data['packaging_ids']){
			$temp_arr = explode(',', $data['packaging_ids']);
			$packaging_ids = Packaging::select('id')->mine()->whereIn('id', $temp_arr)->pluck('id')->toArray();

            $inventory->packaging()->sync($packaging_ids);
		}

		// Sync tags
		if($data['tags'])
            $inventory->syncTags($inventory, explode(',', $data['tags']));

		return $inventory;
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
		foreach ($request->input('data') as $row)
			$data[] = unserialize($row);

		return (new FastExcel(collect($data)))->download('failed_rows.xlsx');
	}

	/**
	 * Push New value Into Failed List
	 *
	 * @param  array  $data
	 * @param  str $reason
	 * @return void
	 */
	private function pushIntoFailed(array $data, $reason = Null)
	{
		$row = [
			'data' => $data,
			'reason' => $reason,
		];

		array_push($this->failed_list, $row);
	}

	/**
	 * Return the failed list
	 *
	 * @return array
	 */
	private function getFailedList()
	{
		return $this->failed_list;
	}
}
