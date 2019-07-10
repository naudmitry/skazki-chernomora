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
                    'communication' => array_intersect($components,
                        [
                            AdminComponentEnum::COMPANY_COMMUNICATION_HELPDESK,
                        ]),
                    'orders' => array_intersect($components,
                        [
                            AdminComponentEnum::COMPANY_ORDERS_LIST,
                            AdminComponentEnum::COMPANY_ORDERS_PRE_ENTRY,
                            AdminComponentEnum::COMPANY_ORDERS_APPLICATIONS,
                        ]),
                    'handbooks' => array_intersect($components,
                        [
                            AdminComponentEnum::COMPANY_HANDBOOKS_AD_SOURCES,
                            AdminComponentEnum::COMPANY_HANDBOOKS_DIAGNOSES,
                            AdminComponentEnum::COMPANY_HANDBOOKS_COMPLAINTS,
                            AdminComponentEnum::COMPANY_HANDBOOKS_SUBSCRIPTIONS,
                            AdminComponentEnum::COMPANY_HANDBOOKS_ORGANIZATIONS,
                            AdminComponentEnum::COMPANY_HANDBOOKS_SALT_CAVES,
                        ]),
                    'users' => array_intersect($components,
                        [
                            AdminComponentEnum::COMPANY_USERS_CUSTOMERS,
                            AdminComponentEnum::COMPANY_USERS_REVIEWS,

                        ]),
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
                    'settings' => array_intersect($components,
                        [
                            AdminComponentEnum::COMPANY_SETTINGS_GENERAL,
                            AdminComponentEnum::COMPANY_SETTINGS_PRICING,
                            AdminComponentEnum::COMPANY_SETTINGS_SEO_INTEGRATION,
                        ]),
                    'administrator' => array_intersect($components,
                        [
                            AdminComponentEnum::COMPANY_ADMIN_LIST,
                            AdminComponentEnum::COMPANY_ADMIN_ROLES,
                            AdminComponentEnum::COMPANY_ADMIN_GROUPS,
                            AdminComponentEnum::COMPANY_ADMIN_COMPANY,
                            AdminComponentEnum::COMPANY_ADMIN_SHOWCASES,
                        ]),
                ];
        }

        $view->with(compact('groupsComponentsBySuper'));
    }
}
