<?php

use App\Classes\PageTypesEnum;

function static_page_route($staticPageType, $parameters = [])
{
    if (!is_array($parameters)) {
        $parameters = [$parameters];
    }

    $parameters = array_merge($parameters);

    $staticPage = App\Models\Page::query()
        ->where('type', PageTypesEnum::STATIC_PAGE)
        ->where('static_page_type', $staticPageType)
        ->first();

    return $staticPage ? $staticPage->getRoute($parameters) : '/';
}
