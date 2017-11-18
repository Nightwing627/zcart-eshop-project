<?php namespace App\Http\Controllers\Admin;

use App\Product;
use App\Inventory;
use App\Attribute;
use App\AttributeValue;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Common\Authorizable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\SearchRequest;
use App\Http\Requests\Validations\CreateInventoryRequest;
use App\Http\Requests\Validations\UpdateInventoryRequest;
use App\Http\Requests\Validations\CreateInventoryWithVariantRequest;


class InventoryController extends Controller
{
    use Authorizable;

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.inventory');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['inventories'] = Inventory::mine()->with('product', 'tax')->get();

        $data['trashes'] = Inventory::mine()->onlyTrashed()->get();

        return view('admin.inventory.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('admin.inventory._search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(SearchRequest $request)
    {
        $query = $request->input('search');

        $products = Product::where('gtin', $query)
                ->orWhere('model_number', 'LIKE', '%'. $query .'%')
                ->orWhere('name', 'LIKE', '%'. $query .'%')
                ->get();

        if($products->isEmpty())
        {
            return back()->with('warning', trans('messages.nofound', ['model' => trans('app.model.product')]));
        }

        return view('admin.inventory.found', compact('products', $products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setVariant(Request $request, $product_id)
    {
        return view('admin.inventory._set_variant', compact('product_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, $id)
    {
        $exist = Inventory::where('product_id', $id)->mine()->first();

        if($exist)
        {
            return redirect(route('admin.stock.inventory.edit', $exist->id))->with('warning', trans('messages.inventory_exist'));
        }

        $data['product'] = Product::findOrFail($id);

        return view('admin.inventory.create', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addWithVariant(Request $request, $id)
    {
        $variants = $this->confirmAttributes($request->except('_token'));

        $data['combinations'] = generate_combinations($variants);

        $data['attributes'] = Attribute::find(array_keys($variants))->pluck('name', 'id');

        $data['product'] = Product::findOrFail($id);

        return view('admin.inventory.createWithVariant', $data);
    }

    /**
     * Add a product to inventory.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function store(CreateInventoryRequest $request)
    {
        $inventory = new Inventory($request->all());

        $inventory->save();

        $this->setAttributes($inventory, $request->input('variants'));

        if ($request->input('carrier_list'))
        {
            $inventory->carriers()->sync($request->input('carrier_list'));
        }

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'inventories', $inventory->id);
        }

        return redirect()->route('admin.stock.inventory.index')->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

    /**
     * Add inventory with variants.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    public function storeWithVariant(CreateInventoryWithVariantRequest $request)
    {
        // Common informations
        $commonInfo['user_id'] = $request->user()->id; //Set user_id

        $commonInfo['shop_id'] = $request->user()->shop_id; //Set shop_id

        $commonInfo['product_id'] = $request->input('product_id');

        $commonInfo['warehouse_id'] = $request->input('warehouse_id');

        $commonInfo['supplier_id'] = $request->input('supplier_id');

        $commonInfo['packaging_id'] = $request->input('packaging_id');

        $commonInfo['shipping_width'] = $request->input('shipping_width');

        $commonInfo['shipping_height'] = $request->input('shipping_height');

        $commonInfo['shipping_depth'] = $request->input('shipping_depth');

        $commonInfo['shipping_weight'] = $request->input('shipping_weight');

        $commonInfo['available_from'] = $request->input('available_from');

        $commonInfo['active'] = $request->input('active');

        $commonInfo['tax_id'] = $request->input('tax_id');

        $commonInfo['min_order_quantity'] = $request->input('min_order_quantity');

        $commonInfo['alert_quantity'] = $request->input('alert_quantity');

        $commonInfo['description'] = $request->input('description');

        // Arrays
        $skus = $request->input('sku');

        $conditions = $request->input('condition');

        $stock_quantities = $request->input('stock_quantity');

        $purchase_prices = $request->input('purchase_price');

        $sale_prices = $request->input('sale_price');

        $offer_prices = $request->input('offer_price');

        $images = $request->file('image');

        // Relations
        $carrier_lists = $request->input('carrier_list');

        $variants = $request->input('variants');

        //Preparing data and insert records.
        $dynamicInfo = [];
        foreach ($skus as $key => $sku)
        {
            $dynamicInfo['sku'] = $skus[$key];

            $dynamicInfo['condition'] = $conditions[$key];

            $dynamicInfo['stock_quantity'] = $stock_quantities[$key];

            $dynamicInfo['purchase_price'] = $purchase_prices[$key];

            $dynamicInfo['sale_price'] = $sale_prices[$key];

            $dynamicInfo['offer_price'] = ($offer_prices[$key]) ? $offer_prices[$key] : NULL ;

            $dynamicInfo['offer_start'] = ($offer_prices[$key]) ? $request->input('offer_start') : NULL ;

            $dynamicInfo['offer_end'] = ($offer_prices[$key]) ? $request->input('offer_end') : NULL ;

            // Merge the common info and dynamic info to data array
            $data = array_merge($dynamicInfo, $commonInfo);

            // Insert the record
            $inventory = Inventory::create($data);

            // Sync Carriers
            if ($carrier_lists)
            {
                $inventory->carriers()->sync($carrier_lists);
            }

            // Sync Attributes
            if ($variants[$key])
            {
                $this->setAttributes($inventory, $variants[$key]);
            }

            // Save Images
            if ($images[$key])
            {
                $images[$key]->move('assets/images/inventories/', $inventory->id.'.png');

                ImageHelper::CreateThumbnails('inventories', $inventory->id);
            }

        }

        return redirect()->route('admin.stock.inventory.index')->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        return view('admin.inventory._show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        $product = Product::findOrFail($inventory->product_id);

        return view('admin.inventory.edit', compact('inventory', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryRequest $request, $id)
    {
        $inventory = Inventory::findOrFail($id);

        $inventory->update($request->all());

        $this->setAttributes($inventory, $request->input('variants'));

        if ($request->input('carrier_list'))
        {
            $inventory->carriers()->sync($request->input('carrier_list'));
        }

        if ($request->input('delete_image') == 1)
        {
            ImageHelper::RemoveImages('inventories', $id);
        }

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'inventories', $inventory->id);
        }

        return redirect()->route('admin.stock.inventory.index')->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Inventory $inventory
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request, Inventory $inventory)
    {
        $inventory->delete();

        return back()->with('success', trans('messages.trashed', ['model' => $this->model_name]));
    }

    /**
     * Restore the specified resource from soft delete.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        Inventory::onlyTrashed()->where('id', $id)->restore();

        return back()->with('success', trans('messages.restored', ['model' => $this->model_name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Inventory::onlyTrashed()->find($id)->forceDelete();

        ImageHelper::RemoveImages('inventories', $id);

        return back()->with('success',  trans('messages.deleted', ['model' => $this->model_name]));
    }

    /**
     * Set attribute pivot table for the product variants like color, size and more
     * @param obj $inventory
     * @param array $attributes
     */
    private function setAttributes($inventory, $attributes)
    {
        $attributes = array_filter($attributes);        // remove empty elements

        $temp = [];
        foreach ($attributes as $attribute_id => $attribute_value_id)
        {
            $temp[$attribute_id] = ['attribute_value_id' => $attribute_value_id];
        }

        if (!empty($temp))
        {
            $inventory->attributes()->sync($temp);
        }

        return true;
    }

    /**
     * Check the list of attribute values and add new if need
     * @param  [type] $attribute
     * @param  array  $values
     * @return array
     */
    private function confirmAttributes($attributeWithValues)
    {
        $results = array();

        foreach ($attributeWithValues as $attribute => $values)
        {
            foreach ($values as $value)
            {
                $oldValueId = AttributeValue::find($value);

                $oldValueName = AttributeValue::where('value', $value)->where('attribute_id', $attribute)->first();

                if ($oldValueId || $oldValueName)
                {
                    $results[$attribute][($oldValueId) ? $oldValueId->id : $oldValueName->id] = ($oldValueId) ? $oldValueId->value : $oldValueName->value;
                }else{
                    // if the value not numeric thats meaninig that its new value and we need to create it
                    $newID = AttributeValue::insertGetId(['attribute_id' => $attribute, 'value' => $value]);

                    $newAttrValue = AttributeValue::find($newID);

                    $results[$attribute][$newAttrValue->id] = $newAttrValue->value;
                }
            }
        }

        return $results;
    }
}
