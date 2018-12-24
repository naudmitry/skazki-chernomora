<?php

namespace App\Classes;

class AdminComponentEnum extends Enum
{
    const COMPANY_CONTENT_BLOG = 'content.blog';
    const COMPANY_CONTENT_FAQ = 'content.faq';
    const COMPANY_CONTENT_PAGES = 'content.pages';
    const COMPANY_CONTENT_BLOCKS = 'content.blocks';

    const COMPANY_MARKETING_DISCOUNTS = 'marketing.discounts';

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
                ]);
        });
    }
}