<?php

use App\Classes\PageTypesEnum;

function static_page_route($staticPageType, $parameters = [], $showcaseId = null)
{
    if (!is_array($parameters)) {
        $parameters = [$parameters];
    }

    $parameters = array_merge($parameters);

    $staticPage = App\Models\Page::query()
        ->where('type', PageTypesEnum::STATIC_PAGE)
        ->where('static_page_type', $staticPageType);

    if (isset($showcaseId)) {
        $staticPage = $staticPage->where('showcase_id', $showcaseId);
    }

    $staticPage = $staticPage->first();

    return $staticPage ? $staticPage->getRoute($parameters) : '/';
}
