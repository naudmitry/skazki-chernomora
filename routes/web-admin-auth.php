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
                Route::get('/roles/edit/{role?}', ['uses' => 'Admin\RoleController@edit', 'as' => 'admin.role.edit'])
                    ->where('category', '[0-9]+');
                Route::post('roles/save/{role?}', ['uses' => 'Admin\RoleController@save', 'as' => 'admin.role.save',])
                    ->where('role', '[0-9]+');
                Route::delete('roles/delete/{role?}', ['uses' => 'Admin\RoleController@delete', 'as' => 'admin.role.delete',])
                    ->where('role', '[0-9]+');
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_ADMIN_LIST], function () {
                Route::get('/staff/lists', ['uses' => 'Admin\AdminController@index', 'as' => 'admin.staff.list.index',]);
                Route::post('/staff/lists/save/{admin?}', ['uses' => 'Admin\AdminController@save', 'as' => 'admin.staff.list.save'])
                    ->where('admin', '[0-9]+');
                Route::get('/staff/lists/edit/{admin?}', ['uses' => 'Admin\AdminController@edit', 'as' => 'admin.staff.list.edit'])
                    ->where('admin', '[0-9]+');
                Route::post('/staff/lists/create', ['uses' => 'Admin\AdminController@create', 'as' => 'admin.staff.list.create']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_ADMIN_GROUPS], function () {
                Route::get('/staff/groups', ['uses' => 'Admin\GroupController@index', 'as' => 'admin.staff.group.index',]);
                Route::get('/staff/groups/edit/{group?}', ['uses' => 'Admin\GroupController@edit', 'as' => 'admin.staff.group.edit'])
                    ->where('group', '[0-9]+');
                Route::delete('/staff/groups/{group}', ['uses' => 'Admin\GroupController@delete', 'as' => 'admin.staff.group.delete'])
                    ->where('group', '[0-9]+');
                Route::get('/staff/groups/create', ['uses' => 'Admin\GroupController@create', 'as' => 'admin.staff.group.create']);
                Route::post('/staff/groups/save/{group?}', ['uses' => 'Admin\GroupController@save', 'as' => 'admin.staff.group.save'])
                    ->where('group', '[0-9]+');
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_CONTENT_BLOG], function () {
                Route::get('/blog/articles', ['uses' => 'Admin\BlogController@index', 'as' => 'admin.blog.article.index',]);
                Route::get('/blog/articles/create', ['uses' => 'Admin\BlogController@create', 'as' => 'admin.blog.article.create']);
                Route::post('/blog/articles/save/{blog?}', ['uses' => 'Admin\BlogController@save', 'as' => 'admin.blog.article.save'])
                    ->where('blog', '[0-9]+');
                Route::post('/blog/articles/save/content/{blog}', ['uses' => 'Admin\BlogController@saveContent', 'as' => 'admin.blog.article.save.content',])
                    ->where('blog', '[0-9]+');
                Route::get('/blog/articles/edit/{blog}', ['uses' => 'Admin\BlogController@edit', 'as' => 'admin.blog.article.edit'])
                    ->where('blog', '[0-9]+');
                Route::delete('/blog/articles/{blog}', ['uses' => 'Admin\BlogController@delete', 'as' => 'admin.blog.article.delete'])
                    ->where('blog', '[0-9]+');
                Route::post('/blog/articles/enable/{blog}', ['uses' => 'Admin\BlogController@enable', 'as' => 'admin.blog.article.enable'])
                    ->where('blog', '[0-9]+');
                Route::post('/blog/articles/favorite/{blog}', ['uses' => 'Admin\BlogController@favorite', 'as' => 'admin.blog.article.favorite'])
                    ->where('blog', '[0-9]+');

                Route::get('/blog/categories', ['uses' => 'Admin\BlogCategoryController@index', 'as' => 'admin.blog.category.index']);
                Route::get('/blog/categories/create', ['uses' => 'Admin\BlogCategoryController@create', 'as' => 'admin.blog.category.create']);
                Route::post('/blog/categories/save/{category?}', ['uses' => 'Admin\BlogCategoryController@save', 'as' => 'admin.blog.category.save'])
                    ->where('category', '[0-9]+');
                Route::get('/blog/categories/{category}/edit', ['uses' => 'Admin\BlogCategoryController@edit', 'as' => 'admin.blog.category.edit'])
                    ->where('category', '[0-9]+');
                Route::delete('/blog/categories/{category}', ['uses' => 'Admin\BlogCategoryController@delete', 'as' => 'admin.blog.category.delete'])
                    ->where('category', '[0-9]+');
                Route::post('/blog/categories/sequence', ['uses' => 'Admin\BlogCategoryController@sequence', 'as' => 'admin.blog.category.sequence']);
                Route::post('/blog/categories/{category}/enable', ['uses' => 'Admin\BlogCategoryController@enable', 'as' => 'admin.blog.category.enable'])
                    ->where('category', '[0-9]+');

                Route::get('/blog/main', ['uses' => 'Admin\BlogController@main', 'as' => 'admin.blog.main.index']);
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_CONTENT_FAQ], function () {
                Route::get('/faq/categories', ['uses' => 'Admin\FaqCategoryController@index', 'as' => 'admin.faq.category.index']);
                Route::get('/faq/categories/create', ['uses' => 'Admin\FaqCategoryController@create', 'as' => 'admin.faq.category.create']);
                Route::post('/faq/categories/sequence', ['uses' => 'Admin\FaqCategoryController@sequence', 'as' => 'admin.faq.category.sequence']);
                Route::post('/faq/categories/{category}/enable', ['uses' => 'Admin\FaqCategoryController@enable', 'as' => 'admin.faq.category.enable'])
                    ->where('category', '[0-9]+');
                Route::get('/faq/categories/{category}/edit', ['uses' => 'Admin\FaqCategoryController@edit', 'as' => 'admin.faq.category.edit'])
                    ->where('category', '[0-9]+');
                Route::delete('/faq/categories/{category}', ['uses' => 'Admin\FaqCategoryController@delete', 'as' => 'admin.faq.category.delete'])
                    ->where('category', '[0-9]+');
                Route::post('/faq/categories/save/{category?}', ['uses' => 'Admin\FaqCategoryController@save', 'as' => 'admin.faq.category.save'])
                    ->where('category', '[0-9]+');

                Route::get('/faq/questions', ['uses' => 'Admin\FaqController@index', 'as' => 'admin.faq.question.index']);
                Route::get('/faq/questions/create', ['uses' => 'Admin\FaqController@create', 'as' => 'admin.faq.question.create']);
                Route::get('/faq/questions/edit/{faq}', ['uses' => 'Admin\FaqController@edit', 'as' => 'admin.faq.question.edit'])
                    ->where('faq', '[0-9]+');
                Route::delete('/faq/questions/{faq}', ['uses' => 'Admin\FaqController@delete', 'as' => 'admin.faq.question.delete'])
                    ->where('faq', '[0-9]+');
                Route::post('/faq/questions/enable/{faq}', ['uses' => 'Admin\FaqController@enable', 'as' => 'admin.faq.question.enable'])
                    ->where('faq', '[0-9]+');
                Route::post('/faq/questions/favorite/{faq}', ['uses' => 'Admin\FaqController@favorite', 'as' => 'admin.faq.question.favorite'])
                    ->where('faq', '[0-9]+');
                Route::post('/faq/questions/save/{faq?}', ['uses' => 'Admin\FaqController@save', 'as' => 'admin.faq.question.save'])
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
                Route::get('/page/lists', ['uses' => 'Admin\PageController@index', 'as' => 'admin.page.list.index']);
                Route::get('/page/lists/create', ['uses' => 'Admin\PageController@create', 'as' => 'admin.page.list.create']);
                Route::get('/page/lists/edit/{page}', ['uses' => 'Admin\PageController@edit', 'as' => 'admin.page.list.edit'])
                    ->where('page', '[0-9]+');
                Route::delete('/page/lists/{page}', ['uses' => 'Admin\PageController@delete', 'as' => 'admin.page.list.delete'])
                    ->where('page', '[0-9]+');
                Route::post('/page/lists/enable/{page}', ['uses' => 'Admin\PageController@enable', 'as' => 'admin.page.list.enable'])
                    ->where('page', '[0-9]+');
                Route::post('/page/lists/save/{page?}', ['uses' => 'Admin\PageController@save', 'as' => 'admin.page.list.save'])
                    ->where('page', '[0-9]+');
                Route::post('/page/content/save/{page}', ['uses' => 'Admin\PageController@saveContent', 'as' => 'admin.page.content.save',])
                    ->where('page', '[0-9]+');

                Route::get('/page/categories', ['uses' => 'Admin\PageCategoryController@index', 'as' => 'admin.page.category.index']);
                Route::get('/page/categories/create', ['uses' => 'Admin\PageCategoryController@create', 'as' => 'admin.page.category.create']);
                Route::post('/page/categories/sequence', ['uses' => 'Admin\PageCategoryController@sequence', 'as' => 'admin.page.category.sequence']);
                Route::post('/page/categories/{category}/enable', ['uses' => 'Admin\PageCategoryController@enable', 'as' => 'admin.page.category.enable'])
                    ->where('category', '[0-9]+');
                Route::get('/page/categories/{category}/edit', ['uses' => 'Admin\PageCategoryController@edit', 'as' => 'admin.page.category.edit'])
                    ->where('category', '[0-9]+');
                Route::delete('/page/categories/{category}', ['uses' => 'Admin\PageCategoryController@delete', 'as' => 'admin.page.category.delete'])
                    ->where('category', '[0-9]+');
                Route::post('/page/categories/save/{category?}', ['uses' => 'Admin\PageCategoryController@save', 'as' => 'admin.page.category.save'])
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
                Route::get('/order/lists', ['uses' => 'Admin\OrderController@index', 'as' => 'admin.order.list.index']);
                Route::delete('/order/lists/{order}', ['uses' => 'Admin\OrderController@delete', 'as' => 'admin.order.list.delete'])
                    ->where('order', '[0-9]+');
            });

            Route::group(['components' => AdminComponentEnum::COMPANY_USERS_CUSTOMERS], function () {
                Route::get('/buyer/lists', ['uses' => 'Admin\BuyerController@index', 'as' => 'admin.buyer.list.index']);
                Route::get('/buyer/lists/edit/{buyer}', ['uses' => 'Admin\BuyerController@edit', 'as' => 'admin.buyer.list.edit'])
                    ->where('buyer', '[0-9]+');
                Route::delete('/buyer/lists/{buyer}', ['uses' => 'Admin\BuyerController@delete', 'as' => 'admin.buyer.list.delete'])
                    ->where('buyer', '[0-9]+');
                Route::post('/buyer/lists/save/{buyer}/{tab}', ['uses' => 'Admin\BuyerController@save', 'as' => 'admin.buyer.list.save',])
                    ->where('buyer', '[0-9]+')
                    ->where('tab', 'general');
            });


            Route::get('/ad-sources/lists', ['uses' => 'Admin\AdSourceController@index', 'as' => 'admin.ad-source.list.index']);
            Route::delete('/ad-sources/lists/{source}', ['uses' => 'Admin\AdSourceController@delete', 'as' => 'admin.ad-source.list.delete'])
                ->where('source', '[0-9]+');
            Route::post('/ad-sources/lists/save/{source?}', ['uses' => 'Admin\AdSourceController@save', 'as' => 'admin.ad-source.list.save',])
                ->where('source', '[0-9]+');
            Route::get('/ad-sources/lists/edit/{source?}', ['uses' => 'Admin\AdSourceController@edit', 'as' => 'admin.ad-source.list.edit'])
                ->where('source', '[0-9]+');
        });

        Route::get('/{any?}',
            function (Request $request) {
                abort(Response::HTTP_NOT_FOUND);
            })
            ->where('any', '(.*)');
    });
});
