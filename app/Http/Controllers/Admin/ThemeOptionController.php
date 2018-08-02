<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\SystemConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validations\UpdateFeaturedCategories;

class ThemeOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $storeFrontThemes = collect($this->storeFrontThemes());

        // $sellingThemes = collect($this->sellingThemes());

        // return view('admin.theme.index', compact('storeFrontThemes', 'sellingThemes'));
        return view('admin.theme.options');
    }

    /**
     * Show the form for featuredCategories.
     * @return \Illuminate\Http\Response
     */
    public function featuredCategories()
    {
        return view('admin.theme._edit_featured_categories');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateFeaturedCategories(UpdateFeaturedCategories $request)
    {
        Category::whereIn('id', $request->input('featured_categories'))->update(['featured' => true]);

        return redirect()->route('admin.appearance.theme.option', '#settings-tab')
        ->with('success', trans('messages.updated_featured_categories'));
    }

}
