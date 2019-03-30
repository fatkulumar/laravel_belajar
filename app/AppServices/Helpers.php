<?php

/**
 * @param $uri
 * @return string
 */
function checkActiveMenu($uri)
{
    $class = '';
    if (request()->is($uri)) {
        $class = 'active';
    }
    return $class;
}

