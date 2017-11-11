<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Tag;
use App\Product;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateProductRequest;
use App\Http\Requests\Validations\UpdateProductRequest;

class ProductController extends Controller
{

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::with('categories')->get();

        $data['trashes'] = Product::onlyTrashed()->get();

        return view('admin.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {

        $product = new Product($request->except('image', 'category_list', 'tag_list'));

        $product->save();

        $this->syncCategories($product, $request->input('category_list'));

        if ($request->input('tag_list'))
        {
            $this->syncTags($product, $request->input('tag_list'));
        }

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'products', $product->id);
        }

        $request->session()->flash('success', trans('messages.created', ['model' => $this->model_name]));

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product._show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = Product::findOrFail($id);

        return view('admin.product._edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->except('image', 'category_list', 'tag_list', 'delete_image'));

        $this->syncCategories($product, $request->input('category_list'));

        if ($request->input('tag_list')){
            $this->syncTags($product, $request->input('tag_list'));
        }

        if ($request->hasFile('image')){
            ImageHelper::UploadImages($request, 'products', $id);
        }

        if ($request->input('delete_image') == 1){
            ImageHelper::RemoveImages('products', $product->id);
        }

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request, $id)
    {
        Product::find($id)->delete();
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
        Product::onlyTrashed()->where('id',$id)->restore();
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
        Product::onlyTrashed()->find($id)->forceDelete();

        ImageHelper::RemoveImages('products', $id);

        return back()->with('success',  trans('messages.deleted', ['model' => $this->model_name]));
    }

    /**
     * Sync up the list of categories for specified product
     * @param  product $product
     * @param  array $catIds
     * @return void
     */
    public function syncCategories(Product $product, array $catIds)
    {
        $product->categories()->sync($catIds);
    }

    /**
     * Sync up the list of tags for specified product
     * @param  product $product
     * @param  array $tagIds
     * @return void
     */
    public function syncTags(Product $product, array $tagIds)
    {
        // dd($tagIds);
        $tagArr = [];

        foreach ($tagIds as $tag)
        {
            if (is_numeric($tag))
            {
                $tagArr[] =  $tag;
            }
            else
            {
                // if the tag not numeric thats meaninig that its new tag and we should create it
                $newTag = Tag::create(['name' => $tag]);

                $tagArr[] = $newTag->id;
            }
        }

        $product->tags()->sync($tagArr);
    }

}