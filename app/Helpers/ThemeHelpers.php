<?php

if ( ! function_exists('theme_path') )
{
    /**
     * Return given/active theme path
     *
     * @param  str $theme name the theme
     * @return str
     */
    function theme_path($theme = Null)
    {
    	if($theme == Null)
	        $theme = config('system_settings.active_theme', Null) ?: 'default';

	    return public_path("themes/" . strtolower($theme));
    }
}

if ( ! function_exists('theme_views_path') )
{
    /**
     * Return given/active theme views path
     *
     * @param  str $theme name the theme
     * @return str
     */
    function theme_views_path($theme = Null)
    {
	    return theme_path($theme) . '/views';
    }
}

// if ( ! function_exists('theme_asset_path') )
// {
    /**
     * Return given/active theme assets path
     *
     * @param  str $theme name the theme
     * @return str
     */
    // function theme_asset_path($theme = Null)
    // {
	   //  return theme_path($theme) . '/assets';
    // }
// }

if ( ! function_exists('selling_theme_path') )
{
    /**
     * Return given/active selling theme views path
     *
     * @param  str $theme name the theme
     * @return str
     */
    function selling_theme_path($theme = Null)
    {
    	if($theme == Null)
	        $theme = config('system_settings.selling_theme', Null) ?: 'default';

	    return theme_path("_selling/{$theme}");
    }
}

if ( ! function_exists('selling_theme_views_path') )
{
    /**
     * Return given/active selling theme views path
     *
     * @param  str $theme name the theme
     * @return str
     */
    function selling_theme_views_path($theme = Null)
    {
	    return selling_theme_path($theme) . '/views';
    }
}