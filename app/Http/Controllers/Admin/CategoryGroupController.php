<?php namespace App\Http\Controllers\Admin;

use App\CategoryGroup;
use Illuminate\Http\Request;
use App\Common\Authorizable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateCategoryGroupRequest;
use App\Http\Requests\Validations\UpdateCategoryGroupRequest;

class CategoryGroupController extends Controller
{
    use Authorizable;

    private $model_name;

    /**
     * construct
     */
    public function __construct()
    {
        $this->model_name = trans('app.model.category_group');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categoryGrps'] = CategoryGroup::with('subGroups')->get();

        $data['trashes'] = CategoryGroup::onlyTrashed()->with('subGroups')->get();

        return view('admin.category.categoryGroup', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category._createGrp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryGroupRequest $request)
    {
        $category = new CategoryGroup($request->all());

        $category->save();

        return back()->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CategoryGroup $categoryGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryGroup $categoryGroup)
    {
        return view('admin.category._editGrp', compact('categoryGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  CategoryGroup $categoryGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryGroupRequest $request, CategoryGroup $categoryGroup)
    {
        $categoryGroup->update($request->all());

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  CategoryGroup $categoryGroup
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request, CategoryGroup $categoryGroup)
    {
        $categoryGroup->delete();

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
        CategoryGroup::onlyTrashed()->where('id',$id)->restore();

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
        CategoryGroup::onlyTrashed()->find($id)->forceDelete();

        return back()->with('success',  trans('messages.deleted', ['model' => $this->model_name]));
    }

}
