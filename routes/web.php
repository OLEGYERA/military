<?php


Route::prefix('adm')->group(function () {
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
//    Route::get('/', function(){return redirect()->route('global_dashboard');});
    Route::match(['get', 'post'], '/login', 'Auth\LoginController@login')->name('login');
    Route::middleware(['auth', 'rules'])->group(function () {
        Route::prefix('global')->group(function () {
//            Route::get('/', function(){return redirect()->route('global_dashboard');});
            Route::get('dashboard', 'Admin\Globals\DashboardController@start')->name('global_dashboard');
            Route::get('article/all', 'Admin\Globals\ArticleController@showArticles')->name('global_articles');
            Route::match(['get', 'post'], 'article/create', 'Admin\Globals\ArticleController@createArticle')->name('create_article');
            Route::post('article/create/file', 'Admin\Globals\ArticleController@uploadFile')->name('uploads');
            Route::match(['get', 'post'], 'article/edit/{alias}', 'Admin\Globals\ArticleController@editArticle')->name('edit_article');
            Route::get('article/delete/{alias}', 'Admin\Globals\ArticleController@deleteArticle')->name('delete_article');
            Route::prefix('pages')->group(function () {
                Route::get('main', 'Admin\Globals\StaticPageController@showMain')->name('global_show_main');
                Route::post('main/edit/catgory', 'Admin\Globals\StaticPageController@editCatsImage')->name('global_main_edit_category');
                Route::post('main/add/slider', 'Admin\Globals\StaticPageController@addSliderImage')->name('global_main_add_slider');
                Route::get('main/delete/slider/{id}', 'Admin\Globals\StaticPageController@deleteSliderImage')->name('global_main_delete_slider');

                Route::get('all/show', 'Admin\Globals\StaticPageController@showAll')->name('global_all_show');
                Route::match(['get', 'post'], 'create', 'Admin\Globals\StaticPageController@createPage')->name('global_create_page');
                Route::match(['get', 'post'], '/edit/{alias}', 'Admin\Globals\StaticPageController@editPage')->name('global_edit_page');
                Route::post('edit/create/file', 'Admin\Globals\StaticPageController@uploadFile')->name('uploads_page');
//                Route::get('reverse', 'Admin\Globals\StaticPageController@showMain')->name('global_show_reverse');
//                Route::get('frame', 'Admin\Globals\StaticPageController@showMain')->name('global_show_frame');
//                Route::get('department', 'Admin\Globals\StaticPageController@showMain')->name('global_show_department');
//                Route::get('science', 'Admin\Globals\StaticPageController@showMain')->name('global_show_science');

            });

            Route::get('menu/show', 'Admin\Globals\MenuController@manageMenu')->name('global_manage_menu');
            Route::post('menu/add', 'Admin\Globals\MenuController@addMenu')->name('global_add_menu');
            Route::match(['get', 'post'], 'menu/edit/{id}', 'Admin\Globals\MenuController@editMenu')->name('global_edit_menu');
            Route::get('menu/delete/{id}', 'Admin\Globals\MenuController@deleteMenu')->name('global_delete_menu');

        });
    });
});

Route::prefix('mc-api/p1')->group(function () {
    Route::get('articles', 'Controller@getArticles')->name('get_articles');
    Route::get('menu', 'Controller@getMenu')->name('get_menu');
    Route::get('page/{alias}', 'Controller@getPage')->name('get_page');
    Route::get('last-pages', 'Controller@getLastPages')->name('get_last_pages');
    Route::get('reserve-news', 'Controller@getReserveNews')->name('get_reserve_news');
    Route::get('inventory-news', 'Controller@getInventoryNews')->name('get_reserve_news');
    Route::get('inventory-new/{alias}', 'Controller@getInventoryNew')->name('get_reserve_new');
    Route::get('reserve-new/{alias}', 'Controller@getReserveNew')->name('get_reserve_new');



//    Route::post('verify/password', 'Auth\VerifierController@getPassword')->name('ver_password');
//    Route::post('signin', 'Auth\RegisterController@signin')->name('signin');
//    Route::post('exist/email', 'Auth\VerifierController@isExistEmail')->name('exist_email');
//    Route::post('verify/token', 'Auth\VerifierController@verifyToken')->name('verify_token');
//    Route::post('reference/token', 'Auth\VerifierController@verifyToken')->name('reference_token');
});

Route::any('/{any?}', function ($any = null) {
    return view('welcome');
})->where('any', '.*');




