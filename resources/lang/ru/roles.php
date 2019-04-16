<?php

use App\Classes\AdminComponentEnum;

return [
    'groups' => [
        'orders' => 'Заказы',
        'handbooks' => 'Справочники',
        'users' => 'Пользователи',
        'marketing' => 'Маркетинг',
        'content' => 'Контент',
        'settings' => 'Настройки',
        'administrator' => 'Администратор'
    ],

    AdminComponentEnum::COMPANY_USERS_REVIEWS => 'Отзывы',

    AdminComponentEnum::COMPANY_HANDBOOKS_AD_SOURCES => 'Источники рекламы',
    AdminComponentEnum::COMPANY_HANDBOOKS_DIAGNOSES => 'Диагнозы',
    AdminComponentEnum::COMPANY_HANDBOOKS_COMPLAINTS => 'Жалобы',
    AdminComponentEnum::COMPANY_HANDBOOKS_SUBSCRIPTIONS => 'Абонементы',

    AdminComponentEnum::COMPANY_ORDERS_LIST => 'Список заказов',
    AdminComponentEnum::COMPANY_USERS_CUSTOMERS => 'Клиенты',

    AdminComponentEnum::COMPANY_MARKETING_DISCOUNTS => 'Скидки',

    AdminComponentEnum::COMPANY_CONTENT_PAGES => 'Страницы',
    AdminComponentEnum::COMPANY_CONTENT_BLOG => 'Новости',
    AdminComponentEnum::COMPANY_CONTENT_FAQ => 'FAQ',
    AdminComponentEnum::COMPANY_CONTENT_BLOCKS => 'Блоки',

    AdminComponentEnum::COMPANY_SETTINGS_GENERAL => 'Общие',
    AdminComponentEnum::COMPANY_SETTINGS_PRICING => 'Оплата',

    AdminComponentEnum::COMPANY_ADMIN_COMPANY => 'Компания',
    AdminComponentEnum::COMPANY_ADMIN_SHOWCASES => 'Сайты',
    AdminComponentEnum::COMPANY_ADMIN_GROUPS => 'Группы',
    AdminComponentEnum::COMPANY_ADMIN_LIST => 'Список',
    AdminComponentEnum::COMPANY_ADMIN_ROLES => 'Роли',
    AdminComponentEnum::COMPANY_ADMIN_SALT_CAVES => 'Соляные пещеры'
];
