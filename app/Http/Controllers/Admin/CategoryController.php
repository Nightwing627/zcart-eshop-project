<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Category;
use App\Helpers\ListHelper;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.category');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::with('subGroups')->withCount('products')->get();

        $data['trashes'] = Category::onlyTrashed()->get();

        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['catList'] = ListHelper::catGrpSubGrpListArray();

        return view('admin.category._create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
           'cat_sub_grps' => 'required',
           'name' => 'required|unique:categories',
           'slug' => 'required|unique:categories',
           'image' => 'mimes:jpg,jpeg,png',
           'active' => 'required'
        ];
        $this->validate($request, $rules);

        $category = new Category($request->all());

        $category->save();

        $this->syncSubGrps($category, $request->input('cat_sub_grps'));

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'categories', $category->id);
            ImageHelper::ResizeImage('categories', $category->id, 800, 200);
        }

        $request->session()->flash('success', trans('messages.created', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User::findOrFail($id);
        // return view('admin.user._show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['catList'] = ListHelper::catGrpSubGrpListArray();

        $data['category'] = Category::findOrFail($id);

        return view('admin.category._edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = [
           'cat_sub_grps' => 'required',
           'name' => 'required',
           'slug' => 'required',
           'image' => 'mimes:jpg,jpeg,png',
           'active' => 'required'
        ];
        $this->validate($request, $rules);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        $this->syncSubGrps($category, $request->input('cat_sub_grps'));

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'categories', $category->id);
            ImageHelper::ResizeImage('categories', $category->id, 800, 200);
        }

        if ($request->input('delete_image') == 1)
        {
            ImageHelper::RemoveImages('categories', $category->id);
        }

        $request->session()->flash('success', trans('messages.updated', ['model' => $this->model_name]));
        return back();
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
        Category::find($id)->delete();

        $request->session()->flash('success', trans('messages.trashed', ['model' => $this->model_name]));

        return back();
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
        Category::onlyTrashed()->where('id',$id)->restore();

        $request->session()->flash('success', trans('messages.restored', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Category::onlyTrashed()->find($id)->forceDelete();

        ImageHelper::RemoveImages('categories', $id);

        $request->session()->flash('success',  trans('messages.deleted', ['model' => $this->model_name]));

        return back();
    }

    /**
     * Sync up the list of roles for specified user
     * @param  User $user
     * @param  array $roleIds
     * @return void
     */
    public function syncSubGrps(Category $category, array $subGrpIds)
    {
        $category->subGroups()->sync($subGrpIds);
    }

}
