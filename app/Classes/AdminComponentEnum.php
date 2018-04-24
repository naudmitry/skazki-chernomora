<?php

namespace App\Classes;

class AdminComponentEnum extends Enum
{
    const COMPANY_COMMUNICATION_HELPDESK = 'communication.helpdesk';

    const COMPANY_ORDERS_LIST = 'orders.list';
    const COMPANY_ORDERS_PRE_ENTRY = 'orders.pre-entry';
    const COMPANY_ORDERS_APPLICATIONS = 'orders.applications';

    const COMPANY_HANDBOOKS_AD_SOURCES = 'handbooks.ad-sources';
    const COMPANY_HANDBOOKS_PRIVILEGES = 'handbooks.privileges';
    const COMPANY_HANDBOOKS_DIAGNOSES = 'handbooks.diagnoses';
    const COMPANY_HANDBOOKS_COMPLAINTS = 'handbooks.complaints';
    const COMPANY_HANDBOOKS_SUBSCRIPTIONS = 'handbooks.subscriptions';
    const COMPANY_HANDBOOKS_ORGANIZATIONS = 'handbooks.organizations';
    const COMPANY_HANDBOOKS_SALT_CAVES = 'handbooks.salt-caves';

    const COMPANY_USERS_CUSTOMERS = 'users.customers';
    const COMPANY_USERS_REVIEWS = 'users.reviews';

    const COMPANY_MARKETING_DISCOUNTS = 'marketing.discounts';

    const COMPANY_CONTENT_BLOG = 'content.blog';
    const COMPANY_CONTENT_FAQ = 'content.faq';
    const COMPANY_CONTENT_PAGES = 'content.pages';
    const COMPANY_CONTENT_BLOCKS = 'content.blocks';

    const COMPANY_SETTINGS_GENERAL = 'settings.general';
    const COMPANY_SETTINGS_PRICING = 'settings.pricing';
    const COMPANY_SETTINGS_SEO_INTEGRATION = 'settings.seo-integration';

    const COMPANY_ADMIN_COMPANY = 'admin.company';
    const COMPANY_ADMIN_SHOWCASES = 'admin.showcases';
    const COMPANY_ADMIN_GROUPS = 'admin.groups';
    const COMPANY_ADMIN_LIST = 'admin.list';
    const COMPANY_ADMIN_ROLES = 'admin.roles';

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
                    self::COMPANY_COMMUNICATION_HELPDESK,
                    self::COMPANY_ORDERS_LIST,
                    self::COMPANY_ORDERS_PRE_ENTRY,
                    self::COMPANY_ORDERS_APPLICATIONS,
                    self::COMPANY_HANDBOOKS_AD_SOURCES,
                    self::COMPANY_HANDBOOKS_PRIVILEGES,
                    self::COMPANY_HANDBOOKS_COMPLAINTS,
                    self::COMPANY_HANDBOOKS_DIAGNOSES,
                    self::COMPANY_HANDBOOKS_SUBSCRIPTIONS,
                    self::COMPANY_HANDBOOKS_ORGANIZATIONS,
                    self::COMPANY_USERS_CUSTOMERS,
                    self::COMPANY_USERS_REVIEWS,
                    self::COMPANY_SETTINGS_GENERAL,
                    self::COMPANY_SETTINGS_SEO_INTEGRATION,
                    self::COMPANY_ADMIN_COMPANY,
                    self::COMPANY_ADMIN_SHOWCASES,
                    self::COMPANY_ADMIN_GROUPS,
                    self::COMPANY_ADMIN_LIST,
                    self::COMPANY_ADMIN_ROLES,
                    self::COMPANY_HANDBOOKS_SALT_CAVES,
                    self::COMPANY_SETTINGS_PRICING
                ]
            );
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
                    self::COMPANY_COMMUNICATION_HELPDESK,
                    self::COMPANY_ORDERS_LIST,
                    self::COMPANY_ORDERS_PRE_ENTRY,
                    self::COMPANY_ORDERS_APPLICATIONS,
                    self::COMPANY_HANDBOOKS_AD_SOURCES,
                    self::COMPANY_HANDBOOKS_PRIVILEGES,
                    self::COMPANY_HANDBOOKS_COMPLAINTS,
                    self::COMPANY_HANDBOOKS_DIAGNOSES,
                    self::COMPANY_HANDBOOKS_SUBSCRIPTIONS,
                    self::COMPANY_HANDBOOKS_ORGANIZATIONS,
                    self::COMPANY_USERS_CUSTOMERS,
                    self::COMPANY_USERS_REVIEWS,
                    self::COMPANY_SETTINGS_GENERAL,
                    self::COMPANY_SETTINGS_SEO_INTEGRATION,
                    self::COMPANY_ADMIN_COMPANY,
                    self::COMPANY_ADMIN_SHOWCASES,
                    self::COMPANY_ADMIN_GROUPS,
                    self::COMPANY_ADMIN_LIST,
                    self::COMPANY_ADMIN_ROLES,
                    self::COMPANY_HANDBOOKS_SALT_CAVES,
                    self::COMPANY_SETTINGS_PRICING
                ]
            );
        });
    }
}
