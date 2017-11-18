<?php namespace App\Http\Controllers\Admin;

use App\Category;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Common\Authorizable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateCategoryRequest;
use App\Http\Requests\Validations\UpdateCategoryRequest;

class CategoryController extends Controller
{
    use Authorizable;

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
        return view('admin.category._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = new Category($request->all());

        $category->save();

        $this->syncSubGrps($category, $request->input('cat_sub_grps'));

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'categories', $category->id);
            ImageHelper::ResizeImage('categories', $category->id, 800, 200);
        }

        return back()->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category._edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        $this->syncSubGrps($category, $request->input('cat_sub_grps'));

        if ($request->input('delete_image') == 1)
        {
            ImageHelper::RemoveImages('categories', $category->id);
        }

        if ($request->hasFile('image'))
        {
            ImageHelper::UploadImages($request, 'categories', $category->id);
            ImageHelper::ResizeImage('categories', $category->id, 800, 200);
        }

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request, Category $category)
    {
        $category->delete();

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
        Category::onlyTrashed()->where('id',$id)->restore();

        return back()->with('success', trans('messages.restored', ['model' => $this->model_name]));
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

        return back()->with('success',  trans('messages.deleted', ['model' => $this->model_name]));
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
