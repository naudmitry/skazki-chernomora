<?php

namespace App\Classes;

class AdminComponentEnum extends Enum
{
    const COMPANY_ORDERS_LIST = 'orders.list';

    const COMPANY_HANDBOOKS_AD_SOURCES = 'handbooks.ad-sources';
    const COMPANY_HANDBOOKS_DIAGNOSES = 'handbooks.diagnoses';
    const COMPANY_HANDBOOKS_COMPLAINTS = 'handbooks.complaints';
    const COMPANY_HANDBOOKS_SUBSCRIPTIONS = 'handbooks.subscriptions';

    const COMPANY_USERS_CUSTOMERS = 'users.customers';
    const COMPANY_USERS_REVIEWS = 'users.reviews';

    const COMPANY_MARKETING_DISCOUNTS = 'marketing.discounts';

    const COMPANY_CONTENT_BLOG = 'content.blog';
    const COMPANY_CONTENT_FAQ = 'content.faq';
    const COMPANY_CONTENT_PAGES = 'content.pages';
    const COMPANY_CONTENT_BLOCKS = 'content.blocks';

    const COMPANY_SETTINGS_GENERAL = 'settings.general';
    const COMPANY_SETTINGS_PRICING = 'settings.pricing';

    const COMPANY_ADMIN_COMPANY = 'admin.company';
    const COMPANY_ADMIN_SHOWCASES = 'admin.showcases';
    const COMPANY_ADMIN_GROUPS = 'admin.groups';
    const COMPANY_ADMIN_LIST = 'admin.list';
    const COMPANY_ADMIN_ROLES = 'admin.roles';
    const COMPANY_ADMIN_SALT_CAVES = 'admin.salt-caves';

    public static function listsCompany()
    {
        return array_filter(self::lists(), function ($component) {
            return in_array(
                $component,
                [
                    self::COMPANY_CONTENT_PAGES,
                    self::COMPANY_CONTENT_BLOG,
                    self::COMPANY_CONTENT_FAQ,
                    self::COMPANY_CONTENT_BLOCKS,
                    self::COMPANY_MARKETING_DISCOUNTS,
                    self::COMPANY_ORDERS_LIST,
                    self::COMPANY_HANDBOOKS_AD_SOURCES,
                    self::COMPANY_HANDBOOKS_COMPLAINTS,
                    self::COMPANY_HANDBOOKS_DIAGNOSES,
                    self::COMPANY_HANDBOOKS_SUBSCRIPTIONS,
                    self::COMPANY_USERS_CUSTOMERS,
                    self::COMPANY_USERS_REVIEWS,
                    self::COMPANY_SETTINGS_GENERAL,
                    self::COMPANY_ADMIN_COMPANY,
                    self::COMPANY_ADMIN_SHOWCASES,
                    self::COMPANY_ADMIN_GROUPS,
                    self::COMPANY_ADMIN_LIST,
                    self::COMPANY_ADMIN_ROLES,
                    self::COMPANY_ADMIN_SALT_CAVES,
                    self::COMPANY_SETTINGS_PRICING
                ]);
        });
    }

    public static function listsSuper()
    {
        return array_filter(self::lists(), function ($component) {
            return in_array(
                $component,
                [
                    self::COMPANY_CONTENT_PAGES,
                    self::COMPANY_CONTENT_BLOG,
                    self::COMPANY_CONTENT_FAQ,
                    self::COMPANY_CONTENT_BLOCKS,
                    self::COMPANY_MARKETING_DISCOUNTS,
                    self::COMPANY_ORDERS_LIST,
                    self::COMPANY_HANDBOOKS_AD_SOURCES,
                    self::COMPANY_HANDBOOKS_COMPLAINTS,
                    self::COMPANY_HANDBOOKS_DIAGNOSES,
                    self::COMPANY_HANDBOOKS_SUBSCRIPTIONS,
                    self::COMPANY_USERS_CUSTOMERS,
                    self::COMPANY_USERS_REVIEWS,
                    self::COMPANY_SETTINGS_GENERAL,
                    self::COMPANY_ADMIN_COMPANY,
                    self::COMPANY_ADMIN_SHOWCASES,
                    self::COMPANY_ADMIN_GROUPS,
                    self::COMPANY_ADMIN_LIST,
                    self::COMPANY_ADMIN_ROLES,
                    self::COMPANY_ADMIN_SALT_CAVES,
                    self::COMPANY_SETTINGS_PRICING
                ]);
        });
    }
}