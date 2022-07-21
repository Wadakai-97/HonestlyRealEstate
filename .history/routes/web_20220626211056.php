<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// ログイン不要組
Route::get('/', function () {
    return view('welcome');
});

// ログイン必要組
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});

// ユーザー画面（ログイン不要）
Route::prefix('hre')->group(function() {
    Route::get('/', 'InformationController@show')->name('hre');
    // 買いたい
    Route::prefix('/buy')->group(function() {
        Route::get('/', 'InformationController@buy')->name('buy');
            // 新築戸建
            Route::get('new_detached_house', 'NewDetachedHouseController@top')->name('newDetachedHouse');
            // 中古戸建
            Route::get('old_detached_house', 'OldDetachedHouseController@top')->name('oldDetachedHouse');
            // マンション
            Route::get('mansion', 'MansionController@top')->name('mansion');
            Route::post('mansion', 'MansionController@search')->name('mansion.search');
            Route::get('mansion/{id}', 'MansionController@detail')->name('mansion.detail');
            // 土地
            Route::get('land', 'LandController@top')->name('land');
    });
    // 売りたい
    Route::get('/sell', 'InformationController@sell')->name('sell');
    // 貸したい
    Route::get('/rent', 'InformationController@rent')->name('rent');
    // その他
    Route::get('/other', 'InformationController@other')->name('other');
    // 会社
    Route::get('/about', 'InformationController@about')->name('company');
    Route::get('/news', 'InformationController@news')->name('news');
    Route::get('/news/{id}', 'InformationController@detail')->name('news.detail');
    // スタッフ紹介
    Route::prefix('/staff')->group(function() {
        Route::get('/', 'StaffController@show')->name('staffs');
        Route::get('/{id}', 'StaffController@detail')->name('staff.detail');
        Route::get('/blog', 'StaffController@blogs')->name('staff.blog');
    });
    // お客様評価
    Route::get('/review', 'InformationController@customerReview')->name('review');
    // お問い合わせ
    Route::post('/confirm', 'ContactController@confirm')->name('contact.confirm');
    Route::post('/send', 'ContactController@send')->name('contact.send');
});


// 管理画面（ログイン不要）
Route::group(['prefix' => 'admin'], function() {
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});

// 管理画面（ログイン必要）
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home',      'Admin\HomeController@index')->name('admin.home');
});



// 管理画面トップページ
Route::get('admin/top', 'InformationController@showTop')->name('admin.top');

// 新築戸建
Route::prefix('new_detached_house')->group(function() {
    Route::get('sign_up', 'NewDetachedHouseController@showForm')->name('admin.newDetachedHouse.form');
    Route::post('sign_up', 'NewDetachedHouseController@signUp')->name('admin.newDetachedHouse.signUp');
    Route::get('list', 'NewDetachedHouseController@list')->name('admin.newDetachedHouse.list');
    Route::delete('delete/{id}', 'NewDetachedHouseController@delete')->name('admin.newDetachedHouse.delete');
    Route::get('detail/{id}', 'NewDetachedHouseController@showDetail')->name('admin.newDetachedHouse.detail');
    Route::get('edit/{id}', 'NewDetachedHouseController@edit')->name('admin.newDetachedHouse.edit');
    Route::patch('edit/{id}', 'NewDetachedHouseController@save')->name('admin.newDetachedHouse.save');
});

// 新築分譲住宅
Route::prefix('new_detached_house_group')->group(function() {
    Route::get('sign_up', 'NewDetachedHouseController@showForm')->name('admin.newDetachedHouse.form');
    Route::post('sign_up', 'NewDetachedHouseController@signUp')->name('admin.newDetachedHouse.signUp');
    Route::get('list', 'NewDetachedHouseController@list')->name('admin.newDetachedHouse.list');
    Route::delete('delete/{id}', 'NewDetachedHouseController@delete')->name('admin.newDetachedHouse.delete');
    Route::get('detail/{id}', 'NewDetachedHouseController@showDetail')->name('admin.newDetachedHouse.detail');
    Route::get('edit/{id}', 'NewDetachedHouseController@edit')->name('admin.newDetachedHouse.edit');
    Route::patch('edit/{id}', 'NewDetachedHouseController@save')->name('admin.newDetachedHouse.save');
});

// 中古戸建
Route::prefix('old_detached_house')->group(function() {
    Route::get('sign_up', 'OldDetachedHouseController@showForm')->name('admin.oldDetachedHouse.form');
    Route::post('sign_up', 'OldDetachedHouseController@signUp')->name('admin.oldDetachedHouse.signUp');
    Route::get('list', 'OldDetachedHouseController@list')->name('admin.oldDetachedHouse.list');
    Route::delete('delete/{id}', 'OldDetachedHouseController@delete')->name('admin.oldDetachedHouse.delete');
    Route::get('detail/{id}', 'OldDetachedHouseController@showDetail')->name('admin.oldDetachedHouse.detail');
    Route::get('edit/{id}', 'OldDetachedHouseController@edit')->name('admin.oldDetachedHouse.edit');
    Route::patch('edit/{id}', 'OldDetachedHouseController@save')->name('admin.oldDetachedHouse.save');
});

// マンション
Route::prefix('mansion')->group(function() {
    Route::get('sign_up', 'MansionController@showForm')->name('admin.mansion.form');
    Route::post('sign_up', 'MansionController@signUp')->name('admin.mansion.signUp');
    Route::get('list', 'MansionController@list')->name('admin.mansion.list');
    Route::delete('delete/{id}', 'MansionController@delete')->name('admin.mansion.delete');
    Route::get('detail/{id}', 'MansionController@showDetail')->name('admin.mansion.detail');
    Route::get('edit/{id}', 'MansionController@edit')->name('admin.mansion.edit');
    Route::patch('edit/{id}', 'MansionController@save')->name('admin.mansion.save');
});

// 土地
Route::prefix('land')->group(function() {
    Route::get('sign_up', 'LandController@showForm')->name('admin.land.form');
    Route::post('sign_up', 'LandController@signUp')->name('admin.land.signUp');
    Route::get('list', 'LandController@list')->name('admin.land.list');
    Route::delete('delete/{id}', 'LandController@delete')->name('admin.land.delete');
    Route::get('detail/{id}', 'LandController@showDetail')->name('admin.land.detail');
    Route::get('edit/{id}', 'LandController@edit')->name('admin.land.edit');
    Route::patch('edit/{id}', 'LandController@save')->name('admin.land.save');
});
// スタッフ
Route::prefix('staff')->group(function() {
    Route::get('sign_up', 'StaffController@showForm')->name('admin.staff.form');
    Route::post('sign_up', 'StaffController@signUp')->name('admin.staff.signUp');
    Route::get('list', 'StaffController@list')->name('admin.staff.list');
    Route::delete('delete/{id}', 'StaffController@delete')->name('admin.staff.delete');
    Route::get('detail/{id}', 'StaffController@showDetail')->name('admin.staff.detail');
    Route::get('edit/{id}', 'StaffController@edit')->name('admin.staff.edit');
    Route::patch('edit/{id}', 'StaffController@save')->name('admin.staff.save');
});
// ブログ
Route::prefix('blog')->group(function() {
    Route::get('sign_up', 'BlogController@showForm')->name('admin.blog.form');
    Route::post('sign_up', 'BlogController@signUp')->name('admin.blog.signUp');
    Route::get('list', 'BlogController@list')->name('admin.blog.list');
    Route::delete('delete/{id}', 'BlogController@delete')->name('admin.blog.delete');
    Route::get('detail/{id}', 'BlogController@showDetail')->name('admin.blog.detail');
    Route::get('edit/{id}', 'BlogController@edit')->name('admin.blog.edit');
    Route::patch('edit/{id}', 'BlogController@save')->name('admin.blog.save');
});
// ニュース
Route::prefix('news')->group(function() {
    Route::get('sign_up', 'InformationController@showForm')->name('admin.news.form');
    Route::post('sign_up', 'InformationController@signUp')->name('admin.news.signUp');
    Route::get('list', 'InformationController@list')->name('admin.news.list');
    Route::delete('delete/{id}', 'InformationController@delete')->name('admin.news.delete');
    Route::get('detail/{id}', 'InformationController@showDetail')->name('admin.news.detail');
    Route::get('edit/{id}', 'InformationController@edit')->name('admin.news.edit');
    Route::patch('edit/{id}', 'InformationController@save')->name('admin.news.save');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
