<?php

namespace App\Http\ViewComposers\Admin;

use App\Classes\AdminComponentEnum;
use Illuminate\View\View;

class AdminRoleSettingsComposer
{
    public function compose(View $view)
    {
        $groupsComponentsBySuper = [];

        foreach ([false, true] as $super) {
            $components = $super ? AdminComponentEnum::listsSuper() : AdminComponentEnum::listsCompany();
            $componentsSuper = $super ? AdminComponentEnum::listsSuper() : [];
            $componentsCompany = $super ? [] : AdminComponentEnum::listsCompany();

            $groupsComponentsBySuper[$super] =
                [
                    'marketing' => array_intersect($components,
                        [
                            AdminComponentEnum::COMPANY_MARKETING_DISCOUNTS,
                        ]),
                    'content' => array_intersect($components,
                        [
                            AdminComponentEnum::COMPANY_CONTENT_BLOG,
                            AdminComponentEnum::COMPANY_CONTENT_FAQ,
                            AdminComponentEnum::COMPANY_CONTENT_PAGES,
                            AdminComponentEnum::COMPANY_CONTENT_BLOCKS,
                        ]),
                ];
        }

        $view->with(compact('groupsComponentsBySuper'));
    }
}
