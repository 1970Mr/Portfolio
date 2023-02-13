<?php

function active_route($route_name)
{
    if(is_string($route_name)){
        return route($route_name) == url()->current() ? 'active' : '';
    }

    foreach ($route_name as $item) {
        if(route($item) == url()->current()) return 'active';
    }

    return '';
}
