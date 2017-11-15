<?php namespace App\Http\Controllers\Admin;

use App\CategorySubGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\CreateCategorySubGroupRequest;
use App\Http\Requests\Validations\UpdateCategorySubGroupRequest;

class CategorySubGroupController extends Controller
{

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
        $data['categorySubGrps'] = CategorySubGroup::with('group')->get();

        $data['trashes'] = CategorySubGroup::onlyTrashed()->get();

        return view('admin.category.categorySubGroup', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category._createSubGrp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategorySubGroupRequest $request)
    {
        $category = new CategorySubGroup($request->all());

        $category->save();

        return back()->with('success', trans('messages.created', ['model' => $this->model_name]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CategorySubGroup  $categorySubGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(CategorySubGroup $categorySubGroup)
    {
        return view('admin.category._editSubGrp', compact('categorySubGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  CategorySubGroup $categorySubGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategorySubGroupRequest $request, CategorySubGroup $categorySubGroup)
    {
        $categorySubGroup->update($request->all());

        return back()->with('success', trans('messages.updated', ['model' => $this->model_name]));
    }

    /**
     * Trash the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  CategorySubGroup $categorySubGroup
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request, CategorySubGroup $categorySubGroup)
    {
        $categorySubGroup->delete();

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
        CategorySubGroup::onlyTrashed()->where('id',$id)->restore();

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
        CategorySubGroup::onlyTrashed()->find($id)->forceDelete();

        return back()->with('success',  trans('messages.deleted', ['model' => $this->model_name]));
    }

}
