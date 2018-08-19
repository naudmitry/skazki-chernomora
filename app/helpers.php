<?php

function static_page_route($staticPageType, $parameters = [])
{
    if (!is_array($parameters)) {
        $parameters = [$parameters];
    }

    $parameters = array_merge($parameters, \Route::current()->parameters());

    $staticPage = App\Models\Page::query()
        ->where('static_page_type', $staticPageType)
        ->first();

    return $staticPage ? $staticPage->getRoute($parameters) : null;
}
