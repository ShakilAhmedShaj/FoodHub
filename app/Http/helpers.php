<?php
use App\Settings;
use App\Widgets;
use App\Types;

 
if (! function_exists('getcong')) {

    function getcong($key)
    {
    	 
        $settings = Settings::findOrFail('1'); 

        return $settings->$key;
    }
}

if (! function_exists('getcong_widgets')) {

    function getcong_widgets($key)
    {
    	 
        $widgets = Widgets::findOrFail('1'); 

        return $widgets->$key;
    }
}


if (!function_exists('classActivePath')) {
    function classActivePath($path)
    {
        $path = explode('.', $path);
        $segment = 2;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return ' active';
    }
}

if (! function_exists('getcong_type')) {

    function getcong_type($key)
    {
         
        $rtype = Types::findOrFail($key); 

        return $rtype->type;
    }
}