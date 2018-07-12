<?php

namespace App\Http\Controllers\Admin;

use App\SystemConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

}
