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

        });
    });
});

Route::prefix('mc-api/p1')->group(function () {
    Route::get('articles', 'Controller@getArticles')->name('get_articles');
//    Route::post('verify/password', 'Auth\VerifierController@getPassword')->name('ver_password');
//    Route::post('signin', 'Auth\RegisterController@signin')->name('signin');
//    Route::post('exist/email', 'Auth\VerifierController@isExistEmail')->name('exist_email');
//    Route::post('verify/token', 'Auth\VerifierController@verifyToken')->name('verify_token');
//    Route::post('reference/token', 'Auth\VerifierController@verifyToken')->name('reference_token');
});

Route::any('/{any?}', function ($any = null) {
    return view('welcome');
})->where('any', '.*');




