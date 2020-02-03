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
            Route::group([], function () {
                Route::get('histories/{id}/{type}', ['uses' => 'Admin\HistoryController@index', 'as' => 'admin.histories.index']);


                Route::post('/order/{order}/history/save', ['uses' => 'Admin\OrderHistoryController@save', 'as' => 'admin.order.history.save'])
                    ->where('order', '[0-9]+');


                Route::get('/order/{order}/history/buyers', ['uses' => 'Admin\OrderHistoryController@buyers', 'as' => 'admin.order.history.buyer'])
                    ->where('order', '[0-9]+');
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_ADMIN_ROLES], function () {
                Route::get('staff/roles', ['uses' => 'Admin\RoleController@index', 'as' => 'admin.staff.roles']);
                Route::get('staff/role/edit/{role?}', ['uses' => 'Admin\RoleController@edit', 'as' => 'admin.staff.role.edit'])
                    ->where('category', '[0-9]+');
                Route::post('staff/role/save/{role?}', ['uses' => 'Admin\RoleController@save', 'as' => 'admin.staff.role.save',])
                    ->where('role', '[0-9]+');
                Route::delete('staff/role/delete/{role?}', ['uses' => 'Admin\RoleController@delete', 'as' => 'admin.staff.role.delete',])
                    ->where('role', '[0-9]+');
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_ADMIN_LIST], function () {
                Route::get('admins/{admin}/edit', ['uses' => 'Admin\AdminController@edit', 'as' => 'admin.admins.edit'])
                    ->where('admin', '[0-9]+');

                Route::get('/staff/lists', ['uses' => 'Admin\AdminController@index', 'as' => 'admin.staff.list.index',]);
                Route::post('/staff/lists/save/{admin?}', ['uses' => 'Admin\AdminController@save', 'as' => 'admin.staff.list.save'])
                    ->where('admin', '[0-9]+');
                Route::get('/staff/lists/edit/{admin?}', ['uses' => 'Admin\AdminController@openEditModal', 'as' => 'admin.staff.list.edit'])
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
                Route::group(['prefix' => 'blog'], function () {
                    Route::get('/articles', ['uses' => 'Admin\BlogController@index', 'as' => 'admin.blog.articles.index',]);
                    Route::get('/articles/create', ['uses' => 'Admin\BlogController@create', 'as' => 'admin.blog.articles.create']);
                    Route::post('/articles/{blog?}', ['uses' => 'Admin\BlogController@save', 'as' => 'admin.blog.articles.save'])->where('blog', '[0-9]+');
                    Route::post('/articles/save/content/{blog}', ['uses' => 'Admin\BlogController@saveContent', 'as' => 'admin.blog.articles.save.content',])->where('blog', '[0-9]+');
                    Route::get('/articles/{blog}/edit', ['uses' => 'Admin\BlogController@edit', 'as' => 'admin.blog.articles.edit'])->where('blog', '[0-9]+');
                    Route::delete('/articles/{blog}', ['uses' => 'Admin\BlogController@destroy', 'as' => 'admin.blog.articles.destroy'])->where('blog', '[0-9]+');
                    Route::post('/articles/enable/{blog}', ['uses' => 'Admin\BlogController@enable', 'as' => 'admin.blog.articles.enable'])->where('blog', '[0-9]+');
                    Route::post('/articles/favorite/{blog}', ['uses' => 'Admin\BlogController@favorite', 'as' => 'admin.blog.articles.favorite'])->where('blog', '[0-9]+');

                    Route::get('/categories', ['uses' => 'Admin\BlogCategoryController@index', 'as' => 'admin.blog.categories.index']);
                    Route::get('/categories/create', ['uses' => 'Admin\BlogCategoryController@create', 'as' => 'admin.blog.categories.create']);
                    Route::post('/categories/{category?}', ['uses' => 'Admin\BlogCategoryController@save', 'as' => 'admin.blog.categories.save'])->where('category', '[0-9]+');
                    Route::get('/categories/{category}/edit', ['uses' => 'Admin\BlogCategoryController@edit', 'as' => 'admin.blog.categories.edit'])->where('category', '[0-9]+');
                    Route::delete('/categories/{category}', ['uses' => 'Admin\BlogCategoryController@destroy', 'as' => 'admin.blog.categories.destroy'])->where('category', '[0-9]+');
                    Route::post('/categories/sequence', ['uses' => 'Admin\BlogCategoryController@sequence', 'as' => 'admin.blog.categories.sequence']);
                    Route::post('/categories/{category}/enable', ['uses' => 'Admin\BlogCategoryController@enable', 'as' => 'admin.blog.categories.enable'])->where('category', '[0-9]+');

                    Route::get('/main', ['uses' => 'Admin\BlogController@main', 'as' => 'admin.blog.main.index']);
                });
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_CONTENT_FAQ], function () {
                Route::group(['prefix' => 'faq'], function () {
                    Route::get('/questions', ['uses' => 'Admin\FaqController@index', 'as' => 'admin.faq.questions.index']);
                    Route::get('/questions/create', ['uses' => 'Admin\FaqController@create', 'as' => 'admin.faq.questions.create']);
                    Route::get('/questions/{faq}/edit', ['uses' => 'Admin\FaqController@edit', 'as' => 'admin.faq.questions.edit'])
                        ->where('faq', '[0-9]+');
                    Route::delete('/questions/{faq}', ['uses' => 'Admin\FaqController@destroy', 'as' => 'admin.faq.questions.destroy'])
                        ->where('faq', '[0-9]+');
                    Route::post('/questions/enable/{faq}', ['uses' => 'Admin\FaqController@enable', 'as' => 'admin.faq.questions.enable'])
                        ->where('faq', '[0-9]+');
                    Route::post('/questions/favorite/{faq}', ['uses' => 'Admin\FaqController@favorite', 'as' => 'admin.faq.question.favorite'])
                        ->where('faq', '[0-9]+');
                    Route::post('/questions/{faq?}', ['uses' => 'Admin\FaqController@save', 'as' => 'admin.faq.questions.save'])
                        ->where('faq', '[0-9]+');

                    Route::get('/categories', ['uses' => 'Admin\FaqCategoryController@index', 'as' => 'admin.faq.category.index']);
                    Route::get('/category/create', ['uses' => 'Admin\FaqCategoryController@create', 'as' => 'admin.faq.category.create']);
                    Route::post('/category/sequence', ['uses' => 'Admin\FaqCategoryController@sequence', 'as' => 'admin.faq.category.sequence']);
                    Route::post('/category/{category}/enable', ['uses' => 'Admin\FaqCategoryController@enable', 'as' => 'admin.faq.category.enable'])
                        ->where('category', '[0-9]+');
                    Route::get('/category/{category}/edit', ['uses' => 'Admin\FaqCategoryController@edit', 'as' => 'admin.faq.category.edit'])
                        ->where('category', '[0-9]+');
                    Route::delete('/category/{category}', ['uses' => 'Admin\FaqCategoryController@delete', 'as' => 'admin.faq.category.delete'])
                        ->where('category', '[0-9]+');
                    Route::post('/category/save/{category?}', ['uses' => 'Admin\FaqCategoryController@save', 'as' => 'admin.faq.category.save'])
                        ->where('category', '[0-9]+');

                    Route::get('/main', ['uses' => 'Admin\FaqController@main', 'as' => 'admin.faq.main.index']);
                });
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_CONTENT_BLOCKS], function () {
                Route::get('header', ['uses' => 'Admin\WidgetController@header', 'as' => 'admin.header']);
                Route::get('footer', ['uses' => 'Admin\WidgetController@footer', 'as' => 'admin.footer']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_CONTENT_PAGES], function () {
                Route::post('/static-page/save/{staticPage}', ['uses' => 'Admin\PageController@saveStaticPage', 'as' => 'admin.static.page.save'])
                    ->where('staticPage', '[0-9]+');
                Route::get('/page/list', ['uses' => 'Admin\PageController@index', 'as' => 'admin.page.list.index']);
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
                    ->where('tab', 'general|geo-ip|styles');
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
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_ORDERS_APPLICATIONS], function () {
                Route::get('/applications', ['uses' => 'Admin\ApplicationController@index', 'as' => 'admin.application.index']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_ORDERS_PRE_ENTRY], function () {
                Route::get('/pre-entry', ['uses' => 'Admin\PreEntryController@index', 'as' => 'admin.pre-entry.index']);
                Route::delete('/pre-entry/{preEntry}', ['uses' => 'Admin\PreEntryController@destroy', 'as' => 'admin.pre-entry.delete']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_USERS_CUSTOMERS], function () {
                Route::get('/buyers', ['uses' => 'Admin\BuyerController@index', 'as' => 'admin.buyers.index']);
                Route::get('/buyers/{buyer}/edit', ['uses' => 'Admin\BuyerController@edit', 'as' => 'admin.buyers.edit'])->where('buyer', '[0-9]+');
                Route::delete('/buyers/{buyer}', ['uses' => 'Admin\BuyerController@destroy', 'as' => 'admin.buyers.destroy'])->where('buyer', '[0-9]+');
                Route::post('/buyers/{buyer}/{tab}', ['uses' => 'Admin\BuyerController@store', 'as' => 'admin.buyers.store'])->where('buyer', '[0-9]+')->where('tab', 'general');
                Route::post('/buyers/create', ['uses' => 'Admin\BuyerController@create', 'as' => 'admin.buyers.create']);
                Route::get('/buyers/modal', ['uses' => 'Admin\BuyerController@modal', 'as' => 'admin.buyers.modal']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_HANDBOOKS_AD_SOURCES], function () {
                Route::get('/ad-sources', ['uses' => 'Admin\AdSourceController@index', 'as' => 'admin.ad-sources.index']);
                Route::get('/ad-sources/{source}/edit', ['uses' => 'Admin\AdSourceController@edit', 'as' => 'admin.ad-sources.edit'])->where('source', '[0-9]+');
                Route::delete('/ad-sources/{source}', ['uses' => 'Admin\AdSourceController@destroy', 'as' => 'admin.ad-sources.destroy'])->where('source', '[0-9]+');
                Route::post('/ad-sources/{source}/enable', ['uses' => 'Admin\AdSourceController@enable', 'as' => 'admin.ad-sources.enable'])->where('source', '[0-9]+');
                Route::post('/ad-sources', ['uses' => 'Admin\AdSourceController@store', 'as' => 'admin.ad-sources.store']);
                Route::patch('/ad-sources/{source}', ['uses' => 'Admin\AdSourceController@update', 'as' => 'admin.ad-sources.update'])->where('source', '[0-9]+');
                Route::get('/ad-sources/create', ['uses' => 'Admin\AdSourceController@create', 'as' => 'admin.ad-sources.create']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_HANDBOOKS_PRIVILEGES], function () {
                Route::get('/privileges', ['uses' => 'Admin\PrivilegeController@index', 'as' => 'admin.privileges.index']);
                Route::get('/privileges/{privilege}/edit', ['uses' => 'Admin\PrivilegeController@edit', 'as' => 'admin.privileges.edit'])->where('privilege', '[0-9]+');
                Route::delete('/privileges/{privilege}', ['uses' => 'Admin\PrivilegeController@destroy', 'as' => 'admin.privileges.destroy'])->where('privilege', '[0-9]+');
                Route::post('/privileges/{privilege}/enable', ['uses' => 'Admin\PrivilegeController@enable', 'as' => 'admin.privileges.enable'])->where('privilege', '[0-9]+');
                Route::post('/privileges', ['uses' => 'Admin\PrivilegeController@store', 'as' => 'admin.privileges.store',])->where('privilege', '[0-9]+');
                Route::patch('/privileges/{privilege}', ['uses' => 'Admin\PrivilegeController@update', 'as' => 'admin.privileges.update'])->where('privilege', '[0-9]+');
                Route::get('/privileges/create', ['uses' => 'Admin\PrivilegeController@create', 'as' => 'admin.privileges.create']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_HANDBOOKS_DIAGNOSES], function () {
                Route::get('/diagnoses', ['uses' => 'Admin\DiagnosisController@index', 'as' => 'admin.diagnoses.index']);
                Route::get('/diagnoses/{diagnosis}/edit', ['uses' => 'Admin\DiagnosisController@edit', 'as' => 'admin.diagnoses.edit'])->where('diagnosis', '[0-9]+');
                Route::delete('/diagnoses/{diagnosis}', ['uses' => 'Admin\DiagnosisController@destroy', 'as' => 'admin.diagnoses.destroy'])->where('diagnosis', '[0-9]+');
                Route::post('/diagnoses/{diagnosis}/enable', ['uses' => 'Admin\DiagnosisController@enable', 'as' => 'admin.diagnoses.enable'])->where('diagnosis', '[0-9]+');
                Route::post('/diagnoses', ['uses' => 'Admin\DiagnosisController@store', 'as' => 'admin.diagnoses.store']);
                Route::patch('/diagnoses/{diagnosis}', ['uses' => 'Admin\DiagnosisController@update', 'as' => 'admin.diagnoses.update'])->where('diagnosis', '[0-9]+');
                Route::get('/diagnoses/create', ['uses' => 'Admin\DiagnosisController@create', 'as' => 'admin.diagnoses.create']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_HANDBOOKS_COMPLAINTS], function () {
                Route::get('/complaints', ['uses' => 'Admin\ComplaintController@index', 'as' => 'admin.complaints.index']);
                Route::get('/complaints/{complaint}/edit', ['uses' => 'Admin\ComplaintController@edit', 'as' => 'admin.complaints.edit'])->where('complaint', '[0-9]+');
                Route::delete('/complaints/{complaint}', ['uses' => 'Admin\ComplaintController@destroy', 'as' => 'admin.complaints.destroy'])->where('complaint', '[0-9]+');
                Route::post('/complaints/{complaint}/enable', ['uses' => 'Admin\ComplaintController@enable', 'as' => 'admin.complaints.enable'])->where('complaint', '[0-9]+');
                Route::post('/complaints', ['uses' => 'Admin\ComplaintController@store', 'as' => 'admin.complaints.store'])->where('complaint', '[0-9]+');
                Route::patch('/complaints/{complaint}', ['uses' => 'Admin\ComplaintController@update', 'as' => 'admin.complaints.update'])->where('complaint', '[0-9]+');
                Route::get('/complaints/create', ['uses' => 'Admin\ComplaintController@create', 'as' => 'admin.complaints.create']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_HANDBOOKS_SUBSCRIPTIONS], function () {
                Route::get('/subscriptions', ['uses' => 'Admin\SubscriptionController@index', 'as' => 'admin.subscriptions.index']);
                Route::get('/subscriptions/{subscription}/edit', ['uses' => 'Admin\SubscriptionController@edit', 'as' => 'admin.subscriptions.edit'])->where('subscription', '[0-9]+');
                Route::delete('/subscriptions/{subscription}', ['uses' => 'Admin\SubscriptionController@destroy', 'as' => 'admin.subscriptions.destroy'])->where('subscription', '[0-9]+');
                Route::post('/subscriptions/{subscription}/enable', ['uses' => 'Admin\SubscriptionController@enable', 'as' => 'admin.subscriptions.enable'])->where('subscription', '[0-9]+');
                Route::post('/subscriptions', ['uses' => 'Admin\SubscriptionController@store', 'as' => 'admin.subscriptions.store']);
                Route::patch('/subscriptions/{subscription}', ['uses' => 'Admin\SubscriptionController@update', 'as' => 'admin.subscriptions.update'])->where('subscription', '[0-9]+');
                Route::get('/subscriptions/create', ['uses' => 'Admin\SubscriptionController@create', 'as' => 'admin.subscriptions.create']);
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
