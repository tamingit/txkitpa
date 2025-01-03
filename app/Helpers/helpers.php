<?php

/*
 *  Create active class for menu items
 */

function set_active($path, $active = 'c-active active') {
    return Request::is($path) ? $active: '';
}

function set_sidebar_active($path, $active = 'c-active c-open') {
    return Request::is($path) ? $active: '';
}

/*
 *  Get the max from an array
 */
function maxValueInArray($array, $keyToSearch)
{
    $currentMax = NULL;
    foreach($array as $arr)
    {
        foreach($arr as $key => $value)
        {
            if ($key == $keyToSearch && ($value >= $currentMax))
            {
                $currentMax = $value;
            }
        }
    }

    return $currentMax;
}