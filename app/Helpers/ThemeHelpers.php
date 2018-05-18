<?php
define('THEME_PATH', 'themes');
define('SELLING_THEME_PATH', 'themes/_selling');

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

	    return public_path(THEME_PATH . DIRECTORY_SEPARATOR . strtolower($theme));
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

if ( ! function_exists('theme_asset_path') )
{
    /**
     * Return given/active theme assets path
     *
     * @param  str $asset name the theme
     * @param  str $theme name the theme
     * @return str
     */
    function theme_asset_path($asset = Null, $theme = Null)
    {
        if($theme == Null)
            $theme = config('system_settings.active_theme', Null) ?: 'default';

        $path = asset(THEME_PATH . '/' . $theme . '/assets');

        return  $asset == Null ? $path : "{$path}/{$asset}";
    }
}

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

        return public_path(SELLING_THEME_PATH . DIRECTORY_SEPARATOR . strtolower($theme));
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


if ( ! function_exists('selling_theme_asset_path') )
{
    /**
     * Return given/active selling theme assets path
     *
     * @param  str $asset name the theme
     * @param  str $theme name the theme
     * @return str
     */
    function selling_theme_asset_path($asset = Null, $theme = Null)
    {
        if($theme == Null)
            $theme = config('system_settings.selling_theme', Null) ?: 'default';

        $path = asset(SELLING_THEME_PATH . '/' . $theme . '/assets');

        return  $asset == Null ? $path : "{$path}/{$asset}";
    }
}