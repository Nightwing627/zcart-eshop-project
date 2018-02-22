<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    /**
     * [ajaxGetFromPHPHelper description]
     *
     * @param  str $funcName name of the PHP helper fucntion
     * @param  mix $args     arguments will need to pass to the helper function
     *
     * @return mix         results from PHP Helper fucntion
     */
    public function ajaxGetFromPHPHelper(Request $request)
    {
        if ($request->ajax()) {
            $funcName = $request->input('funcName');
            $args = $request->input('args');

            if(is_array($args))
                return call_user_func_array($funcName, $args);

            return call_user_func($funcName, $args);
        }

        return false;
    }

    /**
     * Return Shipping Options
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function filterShippingOptions(Request $request)
    {
        if ($request->ajax()){
            return filterShippingOptions($request->input('zone'), $request->input('price'), $request->input('weight'));
        }

        return false;
    }
}
