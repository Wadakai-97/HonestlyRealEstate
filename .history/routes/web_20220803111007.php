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
            Route::prefix('mansion')->group(function() {
                Route::get('/', 'MansionController@top')->name('mansion');
                Route::get('result', 'MansionController@search');
                Route::post('result', 'MansionController@search')->name('mansion.search');
                Route::get('detail/{id}', 'MansionController@detail')->name('mansion.detail');
            });
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
        Route::get('/', 'StaffController@show')->name('staff');
        Route::get('/{id}', 'StaffController@detail')->name('staff.detail');
        Route::get('/blog', 'StaffController@blogs')->name('staff.blog');
    });
    // お客様評価
    Route::get('/review', 'InformationController@customerReview')->name('review');
    // お問い合わせ
    Route::prefix('contact')->group(function() {
        Route::post('', 'ContactController@contact')->name('contact.confirm');
        Route::post('send', 'ContactController@send')->name('contact.send');
    });
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
Route::prefix('recommend')->group(function() {
    Route::get('list', 'InformationController@recommendList')->name('admin.recommend.list');
});
// おすすめ物件
Route::delete('recommed/delete')
// 新築戸建
Route::prefix('new_detached_house')->group(function() {
    Route::get('sign_up', 'NewDetachedHouseController@showForm')->name('admin.newDetachedHouse.form');
    Route::post('sign_up', 'NewDetachedHouseController@signUp')->name('admin.newDetachedHouse.signUp');
    Route::get('list', 'NewDetachedHouseController@list')->name('admin.newDetachedHouse.list');
    Route::delete('delete/{id}', 'NewDetachedHouseController@delete')->name('admin.newDetachedHouse.delete');
    Route::get('detail/{id}', 'NewDetachedHouseController@showDetail')->name('admin.newDetachedHouse.detail');
    Route::get('edit/{id}', 'NewDetachedHouseController@edit')->name('admin.newDetachedHouse.edit');
    Route::patch('edit/{id}', 'NewDetachedHouseController@update')->name('admin.newDetachedHouse.update');
});
// 新築分譲住宅
Route::prefix('new_detached_house_group')->group(function() {
    Route::get('sign_up', 'NewDetachedHouseController@showFormGroup')->name('admin.newDetachedHouseGroup.form');
    Route::post('sign_up', 'NewDetachedHouseController@signUpGroup')->name('admin.newDetachedHouseGroup.signUp');
    Route::get('list', 'NewDetachedHouseController@groupList')->name('admin.newDetachedHouseGroup.list');
    Route::delete('delete/{id}', 'NewDetachedHouseController@groupDelete')->name('admin.newDetachedHouseGroup.delete');
    Route::get('detail/{id}', 'NewDetachedHouseController@showDetailGroup')->name('admin.newDetachedHouseGroup.detail');
    Route::get('edit/{id}', 'NewDetachedHouseController@groupEdit')->name('admin.newDetachedHouseGroup.edit');
    Route::patch('edit/{id}', 'NewDetachedHouseController@groupupdate')->name('admin.newDetachedHouseGroup.update');
});
// 中古戸建
Route::prefix('old_detached_house')->group(function() {
    Route::get('sign_up', 'OldDetachedHouseController@showForm')->name('admin.oldDetachedHouse.form');
    Route::post('sign_up', 'OldDetachedHouseController@signUp')->name('admin.oldDetachedHouse.signUp');
    Route::get('list', 'OldDetachedHouseController@list')->name('admin.oldDetachedHouse.list');
    Route::delete('delete/{id}', 'OldDetachedHouseController@delete')->name('admin.oldDetachedHouse.delete');
    Route::get('detail/{id}', 'OldDetachedHouseController@showDetail')->name('admin.oldDetachedHouse.detail');
    Route::get('edit/{id}', 'OldDetachedHouseController@edit')->name('admin.oldDetachedHouse.edit');
    Route::patch('edit/{id}', 'OldDetachedHouseController@update')->name('admin.oldDetachedHouse.update');
});
// マンション
Route::prefix('mansion')->group(function() {
    Route::get('sign_up', 'MansionController@showForm')->name('admin.mansion.form');
    Route::post('sign_up', 'MansionController@signUp')->name('admin.mansion.signUp');
    Route::get('list', 'MansionController@list')->name('admin.mansion.list');
    Route::get('narrow/down', 'MansionController@adminSearch')->name('admin.mansion.search');
    Route::post('narrow/down', 'MansionController@adminSearch')->name('admin.mansion.search');
    Route::delete('delete/{id}', 'MansionController@delete')->name('admin.mansion.delete');
    Route::get('detail/{id}', 'MansionController@showDetail')->name('admin.mansion.detail');
    Route::get('edit/{id}', 'MansionController@edit')->name('admin.mansion.edit');
    Route::get('edit/image/{id}', 'MansionController@imageEdit')->name('admin.mansionImage.edit');
    Route::post('edit/image/{id}', 'MansionController@imageUpdate')->name('admin.mansionImage.update');
    Route::post('edit/image/update/{id}', 'MansionController@imageSignUp')->name('admin.mansionImage.signUp');
    Route::delete('delete/image/{id}', 'MansionController@imageDelete')->name('admin.mansionImage.delete');
    Route::patch('edit/{id}', 'MansionController@update')->name('admin.mansion.update');
    Route::post('recommend/{id}', 'MansionController@recommend')->name('admin.mansion.recommend');
    Route::get('csv', 'MansionController@csvDownload')->name('admin.mansion.csv');
});
// 土地
Route::prefix('land')->group(function() {
    Route::get('sign_up', 'LandController@showForm')->name('admin.land.form');
    Route::post('sign_up', 'LandController@signUp')->name('admin.land.signUp');
    Route::get('list', 'LandController@list')->name('admin.land.list');
    Route::delete('delete/{id}', 'LandController@delete')->name('admin.land.delete');
    Route::get('detail/{id}', 'LandController@showDetail')->name('admin.land.detail');
    Route::get('edit/{id}', 'LandController@edit')->name('admin.land.edit');
    Route::patch('edit/{id}', 'LandController@update')->name('admin.land.update');
});
// スタッフ
Route::prefix('staff')->group(function() {
    Route::get('sign_up', 'StaffController@showForm')->name('admin.staff.form');
    Route::post('sign_up', 'StaffController@signUp')->name('admin.staff.signUp');
    Route::get('list', 'StaffController@list')->name('admin.staff.list');
    Route::delete('delete/{id}', 'StaffController@delete')->name('admin.staff.delete');
    Route::get('detail/{id}', 'StaffController@showDetail')->name('admin.staff.detail');
    Route::delete('image_delete/{id}', 'StaffController@imageDelete')->name('admin.staff.imageDelete');
    Route::get('edit/{id}', 'StaffController@edit')->name('admin.staff.edit');
    Route::patch('edit/{id}', 'StaffController@update')->name('admin.staff.update');
});
// ブログ
Route::prefix('blog')->group(function() {
    Route::get('sign_up', 'BlogController@showForm')->name('admin.blog.form');
    Route::post('sign_up', 'BlogController@signUp')->name('admin.blog.signUp');
    Route::get('list', 'BlogController@list')->name('admin.blog.list');
    Route::delete('delete/{id}', 'BlogController@delete')->name('admin.blog.delete');
    Route::get('detail/{id}', 'BlogController@showDetail')->name('admin.blog.detail');
    Route::delete('image_delete/{id}', 'BlogController@imageDelete')->name('admin.blog.imageDelete');
    Route::get('edit/{id}', 'BlogController@edit')->name('admin.blog.edit');
    Route::patch('edit/{id}', 'BlogController@update')->name('admin.blog.update');
});
// ニュース
Route::prefix('news')->group(function() {
    Route::get('sign_up', 'InformationController@showForm')->name('admin.news.form');
    Route::post('sign_up', 'InformationController@signUp')->name('admin.news.signUp');
    Route::get('list', 'InformationController@list')->name('admin.news.list');
    Route::delete('delete/{id}', 'InformationController@delete')->name('admin.news.delete');
    Route::get('detail/{id}', 'InformationController@showDetail')->name('admin.news.detail');
    Route::delete('image_delete/{id}', 'InformationController@imageDelete')->name('admin.information.imageDelete');
    Route::get('edit/{id}', 'InformationController@edit')->name('admin.news.edit');
    Route::patch('edit/{id}', 'InformationController@update')->name('admin.news.update');
});
// お客様
Route::prefix('customer')->group(function() {
    Route::get('sign_up', 'ContactController@showForm')->name('admin.customer.form');
    Route::post('sign_up', 'ContactController@signUp')->name('admin.customer.signUp');
    Route::get('list', 'ContactController@list')->name('admin.customer.list');
    Route::delete('delete/{id}', 'ContactController@delete')->name('admin.customer.delete');
    Route::get('detail/{id}', 'ContactController@showDetail')->name('admin.customer.detail');
    Route::get('edit/{id}', 'ContactController@edit')->name('admin.customer.edit');
    Route::patch('edit/{id}', 'ContactController@update')->name('admin.customer.update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
