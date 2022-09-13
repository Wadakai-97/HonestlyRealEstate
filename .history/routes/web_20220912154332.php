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
    return view('user.top');
});
// ログイン必要組
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});

// ユーザー画面（ログイン不要）
Route::prefix('hre')->group(function() {
    Route::get('/', 'InformationController@show')->name('hre');
    Route::get('/', 'InformationController@guestFavorite')->name('favorite');
    Route::get('/', 'InformationController@FmemberFavorite')->name('favorite');
    // 買いたい
    Route::prefix('/buy')->group(function() {
        Route::get('/', 'InformationController@buy')->name('buy');
            // 新築戸建
            Route::prefix('new_detached_house')->group(function() {
                Route::get('/', 'NewDetachedHouseController@top')->name('newDetachedHouse');
                Route::prefix('result')->group(function() {
                    Route::get('/', 'NewDetachedHouseController@search');
                    Route::post('/', 'NewDetachedHouseController@search')->name('newDetachedHouse.search');
                    Route::get('sort', 'NewDetachedHouseController@sort');
                    Route::post('sort', 'NewDetachedHouseController@sort')->name('newDetachedHouse.sort');
                });
                Route::get('detail/{id}', 'NewDetachedHouseController@detail')->name('newDetachedHouse.detail');
            });
            // 中古戸建
            Route::prefix('old_detached_house')->group(function() {
                Route::get('/', 'OldDetachedHouseController@top')->name('oldDetachedHouse');
                Route::prefix('result')->group(function() {
                    Route::get('/', 'OldDetachedHouseController@search');
                    Route::post('/', 'OldDetachedHouseController@search')->name('oldDetachedHouse.search');
                    Route::get('sort', 'OldDetachedHouseController@sort');
                    Route::post('sort', 'OldDetachedHouseController@sort')->name('oldDetachedHouse.sort');
                });
                Route::get('detail/{id}', 'OldDetachedHouseController@detail')->name('oldDetachedHouse.detail');
            });
            // マンション
            Route::prefix('mansion')->group(function() {
                Route::get('/', 'MansionController@top')->name('mansion');
                Route::post('favorite/{id}', 'MansionController@favorite')->name('mansion.favorite');
                Route::post('unfavorite/{idt}', 'MansionController@unfavorite')->name('mansion.unfavorite');
                Route::prefix('tokyo')->group(function() {
                    Route::get('/', 'MansionController@tokyo')->name('mansion.tokyo');
                    Route::get('result', 'MansionController@tokyoSearch');
                    Route::post('result', 'MansionController@tokyoSearch')->name('mansion.tokyo.search');
                    Route::get('sort', 'MansionController@toktoSort');
                    Route::post('sort', 'MansionController@tokyoSort')->name('mansion.tokyo.sort');
                    Route::get('detail/{id}', 'MansionController@tokyoDetail')->name('mansion.tokyo.detail');
                });
                Route::prefix('kanagawa')->group(function() {
                    Route::get('/', 'MansionController@kanagawa')->name('mansion.kanagawa');
                    Route::get('result', 'MansionController@kanagawaSearch');
                    Route::post('result', 'MansionController@kanagawaSearch')->name('mansion.kanagawa.search');
                    Route::get('sort', 'MansionController@kanagawaSort');
                    Route::post('sort', 'MansionController@kanagawaSort')->name('mansion.kanagawa.sort');
                    Route::get('detail/{id}', 'MansionController@kanagawaDetail')->name('mansion.kanagawa.detail');
                });
            });
            // 土地
            Route::prefix('land')->group(function() {
                Route::get('/', 'LandController@top')->name('land');
                Route::prefix('result')->group(function() {
                    Route::get('/', 'LandController@search');
                    Route::post('/', 'LandController@search')->name('land.search');
                    Route::get('sort', 'LandController@sort');
                    Route::post('sort', 'LandController@sort')->name('land.sort');
                });
                Route::get('detail/{id}', 'LandController@detail')->name('land.detail');
            });
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
Route::prefix('admin')->group(function() {
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
// おすすめ物件
Route::prefix('recommend')->group(function() {
    Route::get('list', 'InformationController@recommendList')->name('admin.recommend.list');
    Route::delete('delete/{id}', 'InformationController@recommendDelete')->name('admin.recommend.delete');
});

// 新築戸建
Route::prefix('new_detached_house')->group(function() {
    Route::get('sign_up', 'NewDetachedHouseController@showForm')->name('admin.newDetachedHouse.form');
    Route::post('sign_up', 'NewDetachedHouseController@signUp')->name('admin.newDetachedHouse.signUp');
    Route::get('list', 'NewDetachedHouseController@list')->name('admin.newDetachedHouse.list');
    Route::get('search/result', 'NewDetachedHouseController@adminSearch')->name('admin.newDetachedHouse.search');
    Route::post('search/result', 'NewDetachedHouseController@adminSearch')->name('admin.newDetachedHouse.search');
    Route::delete('delete/{id}', 'NewDetachedHouseController@delete')->name('admin.newDetachedHouse.delete');
    Route::get('detail/{id}', 'NewDetachedHouseController@showDetail')->name('admin.newDetachedHouse.detail');
    Route::get('edit/{id}', 'NewDetachedHouseController@edit')->name('admin.newDetachedHouse.edit');
    Route::patch('edit/{id}', 'NewDetachedHouseController@update')->name('admin.newDetachedHouse.update');
    Route::prefix('csv')->group(function() {
        Route::get('all', 'NewDetachedHouseController@csvDownload')->name('admin.newDetachedHouse.csv');
        Route::get('filtering', 'NewDetachedHouseController@FilteringCsvDownload')->name('admin.newDetachedHouse.filteringCsv');
    });
    Route::prefix('image')->group(function() {
        Route::get('edit/{id}', 'NewDetachedHouseController@imageEdit')->name('admin.newDetachedHouseImage.edit');
        Route::post('edit/{id}', 'NewDetachedHouseController@imageUpdate')->name('admin.newDetachedHouseImage.update');
        Route::post('sign_up/{id}', 'NewDetachedHouseController@imageSignUp')->name('admin.newDetachedHouseImage.signUp');
        Route::get('delete/{id}', 'NewDetachedHouseController@imageDelete')->name('admin.newDetachedHouseImage.delete');
        Route::delete('delete/{id}', 'NewDetachedHouseController@imageDelete')->name('admin.newDetachedHouseImage.delete');
    });
    Route::prefix('recommend')->group(function() {
        Route::post('{id}', 'NewDetachedHouseController@recommendSignUp')->name('admin.newDetachedHouseRecommend.signUp');
        Route::get('{id}', 'NewDetachedHouseController@recommendSignUp')->name('admin.newDetachedHouseRecommend.signUp');
        Route::delete('delete/{id}', 'NewDetachedHouseController@recommendDelete')->name('admin.newDetachedHouseRecommend.delete');
    });
});
// 新築分譲住宅
Route::prefix('new_detached_house_group')->group(function() {
    Route::get('sign_up', 'NewDetachedHouseController@showFormGroup')->name('admin.newDetachedHouseGroup.form');
    Route::post('sign_up', 'NewDetachedHouseController@signUpGroup')->name('admin.newDetachedHouseGroup.signUp');
    Route::get('list', 'NewDetachedHouseController@groupList')->name('admin.newDetachedHouseGroup.list');
    Route::get('search/result', 'NewDetachedHouseController@adminGroupSearch')->name('admin.newDetachedHouseGroup.search');
    Route::post('search/result', 'NewDetachedHouseController@adminGroupSearch')->name('admin.newDetachedHouseGroup.search');
    Route::delete('delete/{id}', 'NewDetachedHouseController@groupDelete')->name('admin.newDetachedHouseGroup.delete');
    Route::get('detail/{id}', 'NewDetachedHouseController@showDetailGroup')->name('admin.newDetachedHouseGroup.detail');
    Route::get('edit/{id}', 'NewDetachedHouseController@groupEdit')->name('admin.newDetachedHouseGroup.edit');
    Route::patch('edit/{id}', 'NewDetachedHouseController@groupUpdate')->name('admin.newDetachedHouseGroup.update');
    Route::prefix('csv')->group(function() {
        Route::get('all', 'NewDetachedHouseController@groupCsvDownload')->name('admin.newDetachedHouseGroup.csv');
        Route::get('filtering', 'NewDetachedHouseController@groupFilteringCsvDownload')->name('admin.newDetachedHouseGroup.filteringCsv');
    });
    Route::prefix('image')->group(function() {
        Route::get('edit/{id}', 'NewDetachedHouseController@groupImageEdit')->name('admin.newDetachedHouseGroupImage.edit');
        Route::post('edit/{id}', 'NewDetachedHouseController@imageUpdate')->name('admin.newDetachedHouseGroupImage.update');
        Route::post('sign_up/{id}', 'NewDetachedHouseController@imageSignUp')->name('admin.newDetachedHouseGroupImage.signUp');
        Route::get('delete/{id}', 'NewDetachedHouseController@imageDelete')->name('admin.newDetachedHouseGroupImage.delete');
        Route::delete('delete/{id}', 'NewDetachedHouseController@imageDelete')->name('admin.newDetachedHouseGroupImage.delete');
    });
    Route::prefix('recommend')->group(function() {
        Route::post('{id}', 'NewDetachedHouseController@recommendGroupSignUp')->name('admin.newDetachedHouseGroupRecommend.signUp');
        Route::get('{id}', 'NewDetachedHouseController@recommendGroupSignUp')->name('admin.newDetachedHouseGroupRecommend.signUp');
        Route::delete('delete/{id}', 'NewDetachedHouseController@recommendGroupDelete')->name('admin.newDetachedHouseGroupRecommend.delete');
    });
});
// 中古戸建
Route::prefix('old_detached_house')->group(function() {
    Route::get('sign_up', 'OldDetachedHouseController@showForm')->name('admin.oldDetachedHouse.form');
    Route::post('sign_up', 'OldDetachedHouseController@signUp')->name('admin.oldDetachedHouse.signUp');
    Route::get('list', 'OldDetachedHouseController@list')->name('admin.oldDetachedHouse.list');
    Route::get('search/result', 'OldDetachedHouseController@adminSearch')->name('admin.oldDetachedHouse.search');
    Route::post('search/result', 'OldDetachedHouseController@adminSearch')->name('admin.oldDetachedHouse.search');
    Route::delete('delete/{id}', 'OldDetachedHouseController@delete')->name('admin.oldDetachedHouse.delete');
    Route::get('detail/{id}', 'OldDetachedHouseController@showDetail')->name('admin.oldDetachedHouse.detail');
    Route::get('edit/{id}', 'OldDetachedHouseController@edit')->name('admin.oldDetachedHouse.edit');
    Route::patch('edit/{id}', 'OldDetachedHouseController@update')->name('admin.oldDetachedHouse.update');
    Route::prefix('csv')->group(function() {
        Route::get('all', 'OldDetachedHouseController@csvDownload')->name('admin.oldDetachedHouse.csv');
        Route::get('filtering', 'OldDetachedHouseController@FilteringCsvDownload')->name('admin.oldDetachedHouse.filteringCsv');
    });
    Route::prefix('image')->group(function() {
        Route::get('edit/{id}', 'OldDetachedHouseController@imageEdit')->name('admin.oldDetachedHouseImage.edit');
        Route::post('edit/{id}', 'OldDetachedHouseController@imageUpdate')->name('admin.oldDetachedHouseImage.update');
        Route::post('sign_up/{id}', 'OldDetachedHouseController@imageSignUp')->name('admin.oldDetachedHouseImage.signUp');
        Route::get('delete/{id}', 'OldDetachedHouseController@imageDelete')->name('admin.oldDetachedHouseImage.delete');
        Route::delete('delete/{id}', 'OldDetachedHouseController@imageDelete')->name('admin.oldDetachedHouseImage.delete');
    });
    Route::prefix('recommend')->group(function() {
        Route::post('{id}', 'OldDetachedHouseController@recommendSignUp')->name('admin.oldDetachedHouseRecommend.signUp');
        Route::get('{id}', 'OldDetachedHouseController@recommendSignUp')->name('admin.oldDetachedHouseRecommend.signUp');
        Route::delete('delete/{id}', 'OldDetachedHouseController@recommendDelete')->name('admin.oldDetachedHouseRecommend.delete');
    });
});
// マンション
Route::prefix('mansion')->group(function() {
    Route::get('sign_up', 'MansionController@showForm')->name('admin.mansion.form');
    Route::post('sign_up', 'MansionController@signUp')->name('admin.mansion.signUp');
    Route::get('list', 'MansionController@list')->name('admin.mansion.list');
    Route::get('search/result', 'MansionController@adminSearch')->name('admin.mansion.search');
    Route::post('search/result', 'MansionController@adminSearch')->name('admin.mansion.search');
    Route::delete('delete/{id}', 'MansionController@delete')->name('admin.mansion.delete');
    Route::get('detail/{id}', 'MansionController@showDetail')->name('admin.mansion.detail');
    Route::get('edit/{id}', 'MansionController@edit')->name('admin.mansion.edit');
    Route::patch('edit/{id}', 'MansionController@update')->name('admin.mansion.update');
    Route::prefix('csv')->group(function() {
        Route::get('all', 'MansionController@csvDownload')->name('admin.mansion.csv');
        Route::get('filtering', 'MansionController@FilteringCsvDownload')->name('admin.mansion.filteringCsv');
    });
    Route::prefix('image')->group(function() {
        Route::get('edit/{id}', 'MansionController@imageEdit')->name('admin.mansionImage.edit');
        Route::post('edit/{id}', 'MansionController@imageUpdate')->name('admin.mansionImage.update');
        Route::post('sign_up/{id}', 'MansionController@imageSignUp')->name('admin.mansionImage.signUp');
        Route::get('delete/{id}', 'MansionController@imageDelete')->name('admin.mansionImage.delete');
        Route::delete('delete/{id}', 'MansionController@imageDelete')->name('admin.mansionImage.delete');
    });
    Route::prefix('recommend')->group(function() {
        Route::post('{id}', 'MansionController@recommendSignUp')->name('admin.mansionRecommend.signUp');
        Route::get('{id}', 'MansionController@recommendSignUp')->name('admin.mansionRecommend.signUp');
        Route::delete('delete/{id}', 'MansionController@recommendDelete')->name('admin.mansionRecommend.delete');
    });
});
// 土地
Route::prefix('land')->group(function() {
    Route::get('sign_up', 'LandController@showForm')->name('admin.land.form');
    Route::post('sign_up', 'LandController@signUp')->name('admin.land.signUp');
    Route::get('list', 'LandController@list')->name('admin.land.list');
    Route::get('search/result', 'LandController@adminSearch')->name('admin.land.search');
    Route::post('search/result', 'LandController@adminSearch')->name('admin.land.search');
    Route::delete('delete/{id}', 'LandController@delete')->name('admin.land.delete');
    Route::get('detail/{id}', 'LandController@showDetail')->name('admin.land.detail');
    Route::get('edit/{id}', 'LandController@edit')->name('admin.land.edit');
    Route::patch('edit/{id}', 'LandController@update')->name('admin.land.update');
    Route::prefix('csv')->group(function() {
        Route::get('all', 'LandController@csvDownload')->name('admin.land.csv');
        Route::get('filtering', 'LandController@FilteringCsvDownload')->name('admin.land.filteringCsv');
    });
    Route::prefix('image')->group(function() {
        Route::get('edit/{id}', 'LandController@imageEdit')->name('admin.landImage.edit');
        Route::post('edit/{id}', 'LandController@imageUpdate')->name('admin.landImage.update');
        Route::post('sign_up/{id}', 'LandController@imageSignUp')->name('admin.landImage.signUp');
        Route::get('delete/{id}', 'LandController@imageDelete')->name('admin.landImage.delete');
        Route::delete('delete/{id}', 'LandController@imageDelete')->name('admin.landImage.delete');
    });
    Route::prefix('recommend')->group(function() {
        Route::post('{id}', 'LandController@recommendSignUp')->name('admin.landRecommend.signUp');
        Route::get('{id}', 'LandController@recommendSignUp')->name('admin.landRecommend.signUp');
        Route::delete('delete/{id}', 'LandController@recommendDelete')->name('admin.landRecommend.delete');
    });
});
// スタッフ
Route::prefix('staff')->group(function() {
    Route::get('sign_up', 'StaffController@showForm')->name('admin.staff.form');
    Route::post('sign_up', 'StaffController@signUp')->name('admin.staff.signUp');
    Route::get('list', 'StaffController@list')->name('admin.staff.list');
    Route::get('search/result', 'StaffController@search')->name('admin.staff.search');
    Route::post('search/result', 'StaffController@search')->name('admin.staff.search');
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
    Route::get('search/result', 'BlogController@search')->name('admin.blog.search');
    Route::post('search/result', 'BlogController@search')->name('admin.blog.search');
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
    Route::get('search/result', 'InformationController@search')->name('admin.news.search');
    Route::post('search/result', 'InformationController@search')->name('admin.news.search');
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
    Route::get('search/result', 'ContactController@search')->name('admin.customer.search');
    Route::post('search/result', 'ContactController@search')->name('admin.customer.search');
    Route::delete('delete/{id}', 'ContactController@delete')->name('admin.customer.delete');
    Route::get('detail/{id}', 'ContactController@showDetail')->name('admin.customer.detail');
    Route::get('edit/{id}', 'ContactController@edit')->name('admin.customer.edit');
    Route::patch('edit/{id}', 'ContactController@update')->name('admin.customer.update');
});
