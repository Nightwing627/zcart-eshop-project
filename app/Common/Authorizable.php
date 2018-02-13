<?php

namespace App\Common;

use Auth;
use App\Helpers\Authorize;

/**
 * Attach this Trait to a User (or other model) for easier read/writes on Addresses
 *
 * @author Munna Khan
 */
trait Authorizable
{
    private $abilities = [
        'index'             => 'view',
        'show'              => 'view',
        'view'              => 'view',
        'staffs'            => 'view',
        'entities'          => 'view',
        'labelOf'           => 'view',
        'statusOf'          => 'view',
        'general'           => 'view',
        'create'            => 'add',
        'add'               => 'add',
        'store'             => 'add',
        'draftSend'         => 'add',
        'find'              => 'add',
        'addWithVariant'    => 'add',
        'storeWithVariant'  => 'add',
        'showSearchForm'    => 'add',
        'search'            => 'add',
        'restore'           => 'add',
        'initiate'          => 'initiate',
        'form'              => 'initiate',
        'approve'           => 'approve',
        'decline'           => 'approve',
        'storeReply'        => 'reply',
        'storeResponse'     => 'response',
        'edit'              => 'edit',
        'update'            => 'edit',
        'massUpdate'        => 'edit',
        'removeCountry'     => 'edit',
        'editStates'        => 'edit',
        'updateStates'      => 'edit',
        'delete'            => 'delete',
        'trash'             => 'delete',
        'archive'           => 'archive',
        'destroy'           => 'delete',
        'massDestroy'       => 'delete',
        'secretLogin'       => 'login'
    ];

    /**
     * List of modules thar grouped into a common module named vendor modules
     * This will help to set the role permissions
     *
     * @var arr
     */
    private $vendor_modules = [
        'shop',
        'merchant',
    ];

    /**
     * List of modules thar grouped into a common module named utility modules
     * This will help to set the role permissions
     *
     * @var arr
     */
    private $utility_modules = [
        'orderStatus',
        'paymentStatus',
    ];

	/**
     * Override of callAction to perform the authorization before
     *
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function callAction($method, $parameters)
    {
        if (! $this->checkPermission() )
            return view('errors.forbidden');

        return parent::callAction($method, $parameters);
    }

    /**
     * checkPermission for this action with the given slug.
     * If the logged in user is the Super Admin OR
     * the given slug is 'dashboard' then no need to check the permission
     *
     * @param  str $slug
     *
     * @return bool false if the permission not granted
     */
    private function checkPermission($slug = '')
    {
        if (\Request::ajax())
            return TRUE;

        $slug = (bool) $slug ? $slug : $this->getSlug();

        return (new Authorize(Auth::user(), $slug))->check();
    }

    /**
     * Get the slug to check the action permission
     *
     * @return str $slug
     */
    private function getSlug()
    {
        $temp1 = explode('.', \Request::route()->getName());
        $module = array_slice($temp1, -2, 1)[0];
        $action = array_slice($temp1, -1, 1)[0];

        if($this->isVendor($module))
            return $this->abilities[$action] . '_vendor';

        if($this->isUtility($module))
            return $this->abilities[$action] . '_utility';

        return array_key_exists($action, $this->abilities) ? $this->abilities[$action] . '_' . snake_case($module) : $action;
    }

    /**
     * Check if module is an Vendor module.
     *
     * @param  str  $module
     *
     * @return boolean
     */
    private function isVendor($module)
    {
        return in_array($module, $this->vendor_modules);
    }

    /**
     * Check if module is an utility module.
     *
     * @param  str  $module
     *
     * @return boolean
     */
    private function isUtility($module)
    {
        return in_array($module, $this->utility_modules);
    }
}