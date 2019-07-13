<?php

use App\Classes\AdminComponentEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

Route::group(['domain' => env('DOMAIN_ADMIN')], function () {
    Route::get('/', function (Request $request) {
        return redirect()->route('admin.index');
    });

    Route::group(['prefix' => 'company-{administeredCompany}'], function () {
        Route::get('/', ['uses' => 'Admin\IndexController@index', 'as' => 'admin.index',]);

        Route::get('/companies', ['uses' => 'Admin\CompanyController@index', 'as' => 'admin.companies.lists.index']);
        Route::post('/companies/enable/{company}', ['uses' => 'Admin\CompanyController@enable', 'as' => 'admin.company.enable']);
        Route::get('/companies/lists/open-modal', ['uses' => 'Admin\CompanyController@openModal', 'as' => 'admin.company.list.open-modal']);
        Route::post('/companies', ['uses' => 'Admin\CompanyController@create', 'as' => 'admin.company.create']);

        Route::get('companies/enter-as-admin/{company}', ['uses' => 'Admin\CompanyController@enterAsAdmin', 'as' => 'admin.companies.enter-as-admin']);
        Route::get('companies/leave-from-admin', ['uses' => 'Admin\CompanyController@leaveFromAdmin', 'as' => 'admin.companies.leave-from-admin']);

        Route::group(['components' => AdminComponentEnum::COMPANY_ADMIN_SHOWCASES], function () {
            Route::get('/showcases', ['uses' => 'Admin\ShowcaseController@index', 'as' => 'admin.showcases.index']);
            Route::post('/showcases/enable/{showcase}', ['uses' => 'Admin\ShowcaseController@enable', 'as' => 'admin.showcase.enable']);
            Route::get('/showcases/open-modal', ['uses' => 'Admin\ShowcaseController@openModal', 'as' => 'admin.showcase.open-modal']);
            Route::post('/showcases', ['uses' => 'Admin\ShowcaseController@create', 'as' => 'admin.showcase.create']);
        });

        Route::group([
            'prefix' => 'showcase-{administeredShowcase}',
        ], function () {

            Route::group(['components' => AdminComponentEnum::COMPANY_ADMIN_ROLES], function () {
                Route::get('roles', ['uses' => 'Admin\RoleController@index', 'as' => 'admin.roles']);
                Route::get('/role/edit/{role?}', ['uses' => 'Admin\RoleController@edit', 'as' => 'admin.role.edit'])
                    ->where('category', '[0-9]+');
                Route::post('role/save/{role?}', ['uses' => 'Admin\RoleController@save', 'as' => 'admin.role.save',])
                    ->where('role', '[0-9]+');
                Route::delete('role/delete/{role?}', ['uses' => 'Admin\RoleController@delete', 'as' => 'admin.role.delete',])
                    ->where('role', '[0-9]+');
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_ADMIN_LIST], function () {
                Route::get('/staff/lists', ['uses' => 'Admin\AdminController@index', 'as' => 'admin.staff.list.index',]);
                Route::post('/staff/lists/save/{admin?}', ['uses' => 'Admin\AdminController@save', 'as' => 'admin.staff.list.save'])
                    ->where('admin', '[0-9]+');
                Route::get('/staff/lists/edit/{admin?}', ['uses' => 'Admin\AdminController@edit', 'as' => 'admin.staff.list.edit'])
                    ->where('admin', '[0-9]+');
                Route::post('/staff/lists/create', ['uses' => 'Admin\AdminController@create', 'as' => 'admin.staff.list.create']);
                Route::delete('/staff/lists/delete/{admin?}', ['uses' => 'Admin\AdminController@delete', 'as' => 'admin.staff.list.delete'])
                    ->where('admin', '[0-9]+');

                Route::get('/staff/change-password-modal/{admin?}', ['uses' => 'Admin\AdminController@openChangePasswordModal', 'as' => 'admin.staff.open-change-password-modal'])
                    ->where('admin', '[0-9]+');
                Route::post('/staff/change-password/{admin}', ['uses' => 'Admin\AdminController@changePassword', 'as' => 'admin.staff.change-password'])
                    ->where('admin', '[0-9]+');
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_ADMIN_GROUPS], function () {
                Route::get('/staff/groups', ['uses' => 'Admin\GroupController@index', 'as' => 'admin.staff.group.index',]);
                Route::get('/staff/group/edit/{group?}', ['uses' => 'Admin\GroupController@edit', 'as' => 'admin.staff.group.edit'])
                    ->where('group', '[0-9]+');
                Route::delete('/staff/group/{group}', ['uses' => 'Admin\GroupController@delete', 'as' => 'admin.staff.group.delete'])
                    ->where('group', '[0-9]+');
                Route::get('/staff/group/create', ['uses' => 'Admin\GroupController@create', 'as' => 'admin.staff.group.create']);
                Route::post('/staff/group/save/{group?}', ['uses' => 'Admin\GroupController@save', 'as' => 'admin.staff.group.save'])
                    ->where('group', '[0-9]+');
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_CONTENT_BLOG], function () {
                Route::get('/blog/articles', ['uses' => 'Admin\BlogController@index', 'as' => 'admin.blog.article.index',]);
                Route::get('/blog/article/create', ['uses' => 'Admin\BlogController@create', 'as' => 'admin.blog.article.create']);
                Route::post('/blog/article/save/{blog?}', ['uses' => 'Admin\BlogController@save', 'as' => 'admin.blog.article.save'])
                    ->where('blog', '[0-9]+');
                Route::post('/blog/article/save/content/{blog}', ['uses' => 'Admin\BlogController@saveContent', 'as' => 'admin.blog.article.save.content',])
                    ->where('blog', '[0-9]+');
                Route::get('/blog/article/edit/{blog}', ['uses' => 'Admin\BlogController@edit', 'as' => 'admin.blog.article.edit'])
                    ->where('blog', '[0-9]+');
                Route::delete('/blog/article/{blog}', ['uses' => 'Admin\BlogController@delete', 'as' => 'admin.blog.article.delete'])
                    ->where('blog', '[0-9]+');
                Route::post('/blog/article/enable/{blog}', ['uses' => 'Admin\BlogController@enable', 'as' => 'admin.blog.article.enable'])
                    ->where('blog', '[0-9]+');
                Route::post('/blog/article/favorite/{blog}', ['uses' => 'Admin\BlogController@favorite', 'as' => 'admin.blog.article.favorite'])
                    ->where('blog', '[0-9]+');

                Route::get('/blog/categories', ['uses' => 'Admin\BlogCategoryController@index', 'as' => 'admin.blog.category.index']);
                Route::get('/blog/category/create', ['uses' => 'Admin\BlogCategoryController@create', 'as' => 'admin.blog.category.create']);
                Route::post('/blog/category/save/{category?}', ['uses' => 'Admin\BlogCategoryController@save', 'as' => 'admin.blog.category.save'])
                    ->where('category', '[0-9]+');
                Route::get('/blog/category/{category}/edit', ['uses' => 'Admin\BlogCategoryController@edit', 'as' => 'admin.blog.category.edit'])
                    ->where('category', '[0-9]+');
                Route::delete('/blog/category/{category}', ['uses' => 'Admin\BlogCategoryController@delete', 'as' => 'admin.blog.category.delete'])
                    ->where('category', '[0-9]+');
                Route::post('/blog/category/sequence', ['uses' => 'Admin\BlogCategoryController@sequence', 'as' => 'admin.blog.category.sequence']);
                Route::post('/blog/category/{category}/enable', ['uses' => 'Admin\BlogCategoryController@enable', 'as' => 'admin.blog.category.enable'])
                    ->where('category', '[0-9]+');

                Route::get('/blog/main', ['uses' => 'Admin\BlogController@main', 'as' => 'admin.blog.main.index']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_CONTENT_FAQ], function () {
                Route::get('/faq/categories', ['uses' => 'Admin\FaqCategoryController@index', 'as' => 'admin.faq.category.index']);
                Route::get('/faq/category/create', ['uses' => 'Admin\FaqCategoryController@create', 'as' => 'admin.faq.category.create']);
                Route::post('/faq/category/sequence', ['uses' => 'Admin\FaqCategoryController@sequence', 'as' => 'admin.faq.category.sequence']);
                Route::post('/faq/category/{category}/enable', ['uses' => 'Admin\FaqCategoryController@enable', 'as' => 'admin.faq.category.enable'])
                    ->where('category', '[0-9]+');
                Route::get('/faq/category/{category}/edit', ['uses' => 'Admin\FaqCategoryController@edit', 'as' => 'admin.faq.category.edit'])
                    ->where('category', '[0-9]+');
                Route::delete('/faq/category/{category}', ['uses' => 'Admin\FaqCategoryController@delete', 'as' => 'admin.faq.category.delete'])
                    ->where('category', '[0-9]+');
                Route::post('/faq/category/save/{category?}', ['uses' => 'Admin\FaqCategoryController@save', 'as' => 'admin.faq.category.save'])
                    ->where('category', '[0-9]+');

                Route::get('/faq/questions', ['uses' => 'Admin\FaqController@index', 'as' => 'admin.faq.question.index']);
                Route::get('/faq/question/create', ['uses' => 'Admin\FaqController@create', 'as' => 'admin.faq.question.create']);
                Route::get('/faq/question/edit/{faq}', ['uses' => 'Admin\FaqController@edit', 'as' => 'admin.faq.question.edit'])
                    ->where('faq', '[0-9]+');
                Route::delete('/faq/question/{faq}', ['uses' => 'Admin\FaqController@delete', 'as' => 'admin.faq.question.delete'])
                    ->where('faq', '[0-9]+');
                Route::post('/faq/question/enable/{faq}', ['uses' => 'Admin\FaqController@enable', 'as' => 'admin.faq.question.enable'])
                    ->where('faq', '[0-9]+');
                Route::post('/faq/question/favorite/{faq}', ['uses' => 'Admin\FaqController@favorite', 'as' => 'admin.faq.question.favorite'])
                    ->where('faq', '[0-9]+');
                Route::post('/faq/question/save/{faq?}', ['uses' => 'Admin\FaqController@save', 'as' => 'admin.faq.question.save'])
                    ->where('faq', '[0-9]+');

                Route::get('/faq/main', ['uses' => 'Admin\FaqController@main', 'as' => 'admin.faq.main.index']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_CONTENT_BLOCKS], function () {
                Route::get('header', ['uses' => 'Admin\WidgetController@header', 'as' => 'admin.header']);
                Route::get('footer', ['uses' => 'Admin\WidgetController@footer', 'as' => 'admin.footer']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_CONTENT_PAGES], function () {
                Route::post('/static-page/save/{staticPage}', ['uses' => 'Admin\PageController@saveStaticPage', 'as' => 'admin.static.page.save'])
                    ->where('staticPage', '[0-9]+');
                Route::get('/pages', ['uses' => 'Admin\PageController@index', 'as' => 'admin.page.list.index']);
                Route::get('/page/create', ['uses' => 'Admin\PageController@create', 'as' => 'admin.page.list.create']);
                Route::get('/page/edit/{page}', ['uses' => 'Admin\PageController@edit', 'as' => 'admin.page.list.edit'])
                    ->where('page', '[0-9]+');
                Route::delete('/page/{page}', ['uses' => 'Admin\PageController@delete', 'as' => 'admin.page.list.delete'])
                    ->where('page', '[0-9]+');
                Route::post('/page/enable/{page}', ['uses' => 'Admin\PageController@enable', 'as' => 'admin.page.list.enable'])
                    ->where('page', '[0-9]+');
                Route::post('/page/save/{page?}', ['uses' => 'Admin\PageController@save', 'as' => 'admin.page.list.save'])
                    ->where('page', '[0-9]+');
                Route::post('/page/content/save/{page}', ['uses' => 'Admin\PageController@saveContent', 'as' => 'admin.page.content.save',])
                    ->where('page', '[0-9]+');

                Route::get('/page/categories', ['uses' => 'Admin\PageCategoryController@index', 'as' => 'admin.page.category.index']);
                Route::get('/page/category/create', ['uses' => 'Admin\PageCategoryController@create', 'as' => 'admin.page.category.create']);
                Route::post('/page/category/sequence', ['uses' => 'Admin\PageCategoryController@sequence', 'as' => 'admin.page.category.sequence']);
                Route::post('/page/category/{category}/enable', ['uses' => 'Admin\PageCategoryController@enable', 'as' => 'admin.page.category.enable'])
                    ->where('category', '[0-9]+');
                Route::get('/page/category/{category}/edit', ['uses' => 'Admin\PageCategoryController@edit', 'as' => 'admin.page.category.edit'])
                    ->where('category', '[0-9]+');
                Route::delete('/page/category/{category}', ['uses' => 'Admin\PageCategoryController@delete', 'as' => 'admin.page.category.delete'])
                    ->where('category', '[0-9]+');
                Route::post('/page/category/save/{category?}', ['uses' => 'Admin\PageCategoryController@save', 'as' => 'admin.page.category.save'])
                    ->where('category', '[0-9]+');

                Route::get('/main', ['uses' => 'Admin\WidgetController@main', 'as' => 'admin.main.index']);
                Route::get('/contacts', ['uses' => 'Admin\WidgetController@contacts', 'as' => 'admin.contacts.index']);
            });

            Route::group(['components' => [AdminComponentEnum::COMPANY_CONTENT_PAGES, AdminComponentEnum::COMPANY_CONTENT_BLOCKS,]], function () {
                Route::get('widget/settings/{widget}', ['uses' => 'Admin\WidgetController@settings', 'as' => 'widget.settings']);
                Route::post('widget/create', ['uses' => 'Admin\WidgetController@create', 'as' => 'widget.create']);
                Route::put('widget/save/{widget}', ['uses' => 'Admin\WidgetController@save', 'as' => 'widget.save']);
                Route::post('widget/sequence', ['uses' => 'Admin\WidgetController@sequence', 'as' => 'widget.sequence']);
                Route::delete('widget/{showcaseWidget}', ['uses' => 'Admin\WidgetController@destroy', 'as' => 'widget.destroy']);
                Route::post('widget/enable/{showcaseWidget}', ['uses' => 'Admin\WidgetController@enable', 'as' => 'widget.enable']);
                Route::post('widget/add-block/{widget}', ['uses' => 'Admin\WidgetController@addBlock', 'as' => 'widget.addBlock']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_SETTINGS_GENERAL], function () {
                Route::get('/settings/{tab?}', ['uses' => 'Admin\SettingController@index', 'as' => 'admin.settings.index'])
                    ->where('tab', 'general|geo-ip');
                Route::post('settings/{tab}', ['uses' => 'Admin\SettingController@update', 'as' => 'admin.settings.update'])
                    ->where('tab', 'general|geo-ip|');
                Route::get('settings/create/geo-ip-rule', ['uses' => 'Admin\SettingController@createGeoIpRule', 'as' => 'admin.settings.createGeoIpRule']);
                Route::get('settings/regions/{country?}', ['uses' => 'Admin\SettingController@regionsByCountry', 'as' => 'admin.settings.regions']);
                Route::get('settings/cities/{region?}', ['uses' => 'Admin\SettingController@citiesByRegion', 'as' => 'admin.settings.cities']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_ORDERS_LIST], function () {
                Route::get('/orders', ['uses' => 'Admin\OrderController@index', 'as' => 'admin.order.list.index']);
                Route::get('/order/edit/{order}', ['uses' => 'Admin\OrderController@edit', 'as' => 'admin.order.edit'])
                    ->where('order', '[0-9]+');
                Route::get('/order/create', ['uses' => 'Admin\OrderController@create', 'as' => 'admin.order.create']);
                Route::post('/order/save/{order?}', ['uses' => 'Admin\OrderController@save', 'as' => 'admin.order.save'])
                    ->where('order', '[0-9]+');
                Route::delete('/order/lists/{order}', ['uses' => 'Admin\OrderController@delete', 'as' => 'admin.order.list.delete'])
                    ->where('order', '[0-9]+');
                Route::get('/order/{order}/open-modal/{modal}', ['uses' => 'Admin\OrderController@openModal', 'as' => 'admin.order.open-modal']);
                Route::get('/order/{order}/families', ['uses' => 'Admin\OrderFamilyController@index', 'as' => 'admin.order.family.index'])
                    ->where('order', '[0-9]+');
                Route::post('/order/{order}/family/save', ['uses' => 'Admin\OrderFamilyController@save', 'as' => 'admin.order.family.save'])
                    ->where('order', '[0-9]+');
                Route::delete('/order/{order}/family/delete/{buyer}', ['uses' => 'Admin\OrderFamilyController@delete', 'as' => 'admin.order.family.delete'])
                    ->where('order', '[0-9]+')
                    ->where('buyer', '[0-9]+');
                Route::get('/order/{order}/family/buyers', ['uses' => 'Admin\OrderFamilyController@buyers', 'as' => 'admin.order.family.buyer'])
                    ->where('order', '[0-9]+');
                Route::get('/order/{order}/histories', ['uses' => 'Admin\OrderHistoryController@index', 'as' => 'admin.order.history.index'])
                    ->where('order', '[0-9]+');
                Route::post('/order/{order}/history/save', ['uses' => 'Admin\OrderHistoryController@save', 'as' => 'admin.order.history.save'])
                    ->where('order', '[0-9]+');
                Route::get('/order/{order}/history/buyers', ['uses' => 'Admin\OrderHistoryController@buyers', 'as' => 'admin.order.history.buyer'])
                    ->where('order', '[0-9]+');
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_ORDERS_APPLICATIONS], function () {
                Route::get('/applications', ['uses' => 'Admin\ApplicationController@index', 'as' => 'admin.application.index']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_ORDERS_PRE_ENTRY], function () {
                Route::get('/pre-entry', ['uses' => 'Admin\PreEntryController@index', 'as' => 'admin.pre-entry.index']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_USERS_CUSTOMERS], function () {
                Route::get('/buyers', ['uses' => 'Admin\BuyerController@index', 'as' => 'admin.buyer.list.index']);
                Route::get('/buyer/edit/{buyer}', ['uses' => 'Admin\BuyerController@edit', 'as' => 'admin.buyer.list.edit'])
                    ->where('buyer', '[0-9]+');
                Route::delete('/buyer/{buyer}', ['uses' => 'Admin\BuyerController@delete', 'as' => 'admin.buyer.list.delete'])
                    ->where('buyer', '[0-9]+');
                Route::post('/buyer/save/{buyer}/{tab}', ['uses' => 'Admin\BuyerController@save', 'as' => 'admin.buyer.list.save',])
                    ->where('buyer', '[0-9]+')
                    ->where('tab', 'general');
                Route::post('/buyer/create', ['uses' => 'Admin\BuyerController@create', 'as' => 'admin.buyer.list.create']);
                Route::get('/buyer/modal', ['uses' => 'Admin\BuyerController@modal', 'as' => 'admin.buyer.list.modal']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_HANDBOOKS_AD_SOURCES], function () {
                Route::get('/ad-sources', ['uses' => 'Admin\AdSourceController@index', 'as' => 'admin.ad-source.list.index']);
                Route::delete('/ad-source/{source}', ['uses' => 'Admin\AdSourceController@delete', 'as' => 'admin.ad-source.list.delete'])
                    ->where('source', '[0-9]+');
                Route::post('/ad-source/save/{source?}', ['uses' => 'Admin\AdSourceController@save', 'as' => 'admin.ad-source.list.save',])
                    ->where('source', '[0-9]+');
                Route::get('/ad-source/edit/{source?}', ['uses' => 'Admin\AdSourceController@edit', 'as' => 'admin.ad-source.list.edit'])
                    ->where('source', '[0-9]+');
                Route::post('/ad-source/enable/{source}', ['uses' => 'Admin\AdSourceController@enable', 'as' => 'admin.ad-source.list.enable'])
                    ->where('source', '[0-9]+');
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_HANDBOOKS_DIAGNOSES], function () {
                Route::get('/diagnoses', ['uses' => 'Admin\DiagnosisController@index', 'as' => 'admin.diagnosis.list.index']);
                Route::delete('/diagnosis/{diagnosis}', ['uses' => 'Admin\DiagnosisController@delete', 'as' => 'admin.diagnosis.list.delete'])
                    ->where('diagnosis', '[0-9]+');
                Route::post('/diagnosis/save/{diagnosis?}', ['uses' => 'Admin\DiagnosisController@save', 'as' => 'admin.diagnosis.list.save',])
                    ->where('diagnosis', '[0-9]+');
                Route::get('/diagnosis/edit/{diagnosis?}', ['uses' => 'Admin\DiagnosisController@edit', 'as' => 'admin.diagnosis.list.edit'])
                    ->where('diagnosis', '[0-9]+');
                Route::post('/diagnosis/enable/{diagnosis}', ['uses' => 'Admin\DiagnosisController@enable', 'as' => 'admin.diagnosis.list.enable'])
                    ->where('diagnosis', '[0-9]+');
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_HANDBOOKS_COMPLAINTS], function () {
                Route::get('/complaints', ['uses' => 'Admin\ComplaintController@index', 'as' => 'admin.complaint.list.index']);
                Route::delete('/complaint/{complaint}', ['uses' => 'Admin\ComplaintController@delete', 'as' => 'admin.complaint.list.delete'])
                    ->where('complaint', '[0-9]+');
                Route::post('/complaint/save/{complaint?}', ['uses' => 'Admin\ComplaintController@save', 'as' => 'admin.complaint.list.save',])
                    ->where('complaint', '[0-9]+');
                Route::get('/complaint/edit/{complaint?}', ['uses' => 'Admin\ComplaintController@edit', 'as' => 'admin.complaint.list.edit'])
                    ->where('complaint', '[0-9]+');
                Route::post('/complaint/enable/{complaint}', ['uses' => 'Admin\ComplaintController@enable', 'as' => 'admin.complaint.list.enable'])
                    ->where('complaint', '[0-9]+');
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_USERS_REVIEWS], function () {
                Route::get('/reviews', ['uses' => 'Admin\ReviewController@index', 'as' => 'admin.reviews.index']);
                Route::delete('/review/{review}', ['uses' => 'Admin\ReviewController@delete', 'as' => 'admin.review.delete'])
                    ->where('review', '[0-9]+');
                Route::post('/review/save/{review?}', ['uses' => 'Admin\ReviewController@save', 'as' => 'admin.review.save'])
                    ->where('review', '[0-9]+');
                Route::post('/review/widgeted/{review}', ['uses' => 'Admin\ReviewController@widgeted', 'as' => 'admin.review.widgeted'])
                    ->where('review', '[0-9]+');
                Route::get('/review/modal/{review?}', ['uses' => 'Admin\ReviewController@modal', 'as' => 'admin.review.modal'])
                    ->where('review', '[0-9]+');
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_HANDBOOKS_SALT_CAVES], function () {
                Route::get('/salt-caves', ['uses' => 'Admin\SaltCaveController@index', 'as' => 'admin.salt-caves.index']);
                Route::get('/salt-cave/modal/{saltCave?}', ['uses' => 'Admin\SaltCaveController@modal', 'as' => 'admin.salt-cave.modal'])
                    ->where('saltCave', '[0-9]+');
                Route::post('/salt-cave/save/{saltCave?}', ['uses' => 'Admin\SaltCaveController@save', 'as' => 'admin.salt-cave.save'])
                    ->where('saltCave', '[0-9]+');
                Route::delete('/salt-cave/{saltCave}', ['uses' => 'Admin\SaltCaveController@delete', 'as' => 'admin.salt-cave.delete'])
                    ->where('saltCave', '[0-9]+');
                Route::post('/salt-cave/enabled/{saltCave}', ['uses' => 'Admin\SaltCaveController@enabled', 'as' => 'admin.salt-cave.enabled'])
                    ->where('category', '[0-9]+');
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_HANDBOOKS_SUBSCRIPTIONS], function () {
                Route::get('/subscriptions', ['uses' => 'Admin\SubscriptionController@index', 'as' => 'admin.subscription.index']);
                Route::delete('/subscription/{subscription}', ['uses' => 'Admin\SubscriptionController@delete', 'as' => 'admin.subscription.delete'])
                    ->where('subscription', '[0-9]+');
                Route::post('/subscription/save/{subscription?}', ['uses' => 'Admin\SubscriptionController@save', 'as' => 'admin.subscription.save',])
                    ->where('subscription', '[0-9]+');
                Route::get('/subscription/edit/{subscription?}', ['uses' => 'Admin\SubscriptionController@edit', 'as' => 'admin.subscription.edit'])
                    ->where('subscription', '[0-9]+');
                Route::post('/subscription/enable/{subscription}', ['uses' => 'Admin\SubscriptionController@enable', 'as' => 'admin.subscription.enable'])
                    ->where('subscription', '[0-9]+');
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_COMMUNICATION_HELPDESK], function () {
                Route::get('/help-desks', ['uses' => 'Admin\HelpDeskController@index', 'as' => 'admin.help-desks.index']);
                Route::delete('/help-desks/{helpDesk}', ['uses' => 'Admin\HelpDeskController@destroy', 'as' => 'admin.help-desks.destroy']);
                Route::patch('/help-desks/{helpDesk}', ['uses' => 'Admin\HelpDeskController@update', 'as' => 'admin.help-desks.update']);
                Route::get('/help-desks/open-modal/{helpDesk}', ['uses' => 'Admin\HelpDeskController@openModal', 'as' => 'admin.help-desks.open-modal']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_HANDBOOKS_ORGANIZATIONS], function () {
                Route::get('/organizations', ['uses' => 'Admin\OrganizationController@index', 'as' => 'admin.organization.index']);
                Route::delete('/organization/{organization}', ['uses' => 'Admin\OrganizationController@delete', 'as' => 'admin.organization.delete'])
                    ->where('organization', '[0-9]+');
                Route::post('/organization/save/{organization?}', ['uses' => 'Admin\OrganizationController@save', 'as' => 'admin.organization.save',])
                    ->where('organization', '[0-9]+');
                Route::get('/organization/edit/{organization?}', ['uses' => 'Admin\OrganizationController@edit', 'as' => 'admin.organization.edit'])
                    ->where('organization', '[0-9]+');
                Route::post('/organization/enable/{organization}', ['uses' => 'Admin\OrganizationController@enable', 'as' => 'admin.organization.enable'])
                    ->where('organization', '[0-9]+');
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_SETTINGS_SEO_INTEGRATION], function () {
                Route::get('settings/seo-integrations/{tab?}', ['uses' => 'Admin\SettingsSeoIntegrationsController@index', 'as' => 'admin.seo-integrations.index'])
                    ->where('tab', 'site-map|robots|integrations|cookies|external-usage');
                Route::post('settings/seo-integrations', ['uses' => 'Admin\SettingsSeoIntegrationsController@save', 'as' => 'admin.seo-integrations.save']);
            });
        });

        Route::get('/{any?}',
            function (Request $request) {
                abort(Response::HTTP_NOT_FOUND);
            })
            ->where('any', '(.*)');
    });
});
