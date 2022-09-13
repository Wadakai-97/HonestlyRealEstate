<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Review;
use App\Models\Land;
use App\Models\Mansion;
use App\Models\Favorite;
use App\Models\NewDetachedHouse;
use App\Models\NewDetachedHouseGroup;
use App\Models\OldDetachedHouse;
use App\Models\Recommend;
use App\Models\Information;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\InformationSignUpRequest;

class InformationController extends Controller
{
    // For User
    // TOP
    public function show() {
        return view('user.top');
    }
    // お気に入り物件
    // 一覧表示
    public function guestFavoriteList(Request $request) {
        if(Auth::check()) {
            $favorite = Favorite::whereUser()->get();
            $lands = $favorite->whereNotNull('land_id');
            $mansions = $favorite->whereNotNull('mansion_id');
            $new_detached_houses = $favorite->whereNotNull('new_detached_house_id');
            $new_detached_house_groups = $favorite->whereNotNull('new_detached_house_group_id');
            $old_detached_houses = $favorite->whereNotNull('old_detached_house_id');
        } else {
            $favorite = Favorite::whereGuest($request)->get();
            $lands = $favorite->whereNotNull('land_id');
            $mansions = $favorite->whereNotNull('mansion_id');
            $new_detached_houses = $favorite->whereNotNull('new_detached_house_id');
            $new_detached_house_groups = $favorite->whereNotNull('new_detached_house_group_id');
            $old_detached_houses = $favorite->whereNotNull('old_detached_house_id');
        }
        return view('user.favorite', compact('lands', 'mansions', 'new_detached_houses', 'new_detached_house_groups', 'old_detached_houses'));
    }
    // 新規登録
    public function favoriteSignUp($id, Request $request){
        $favorite = New Favorite();
        $favorite->favoriteSignUp($request, $id);
        $request->session()->regenerateToken();

        return redirect()->route('mansion.result')->with('message', 'お気に入り登録に成功しました。');
    }
    // 登録削除
    public function favoriteSignOff($id, Request $request){
        DB::transaction(function() use($id, $request) {
            $type = $request->type;
            if(Auth::check()) {
                if($type = "mansion") {
                    $target = Favorite::whereUser()->whereMansion($id)->delete();
                } else if($type = "land") {
                    $target = Favorite::whereUser()->whereLand($id)->delete();
                } else if($type = "new_detached_house") {
                    $target  = Favorite::whereUser()->whereNewDetachedHouse($id)->delete();
                } else if($type = "new_detached_house_group") {
                    $target  = Favorite::whereUser()->whereNewDetachedHouseGroup($id)->delete();
                } else if($type = "old_detached_house") {
                    $target  = Favorite::whereUser()->whereOldDetachedHouse($id)->delete();
                }
            } else {
                if($type = "mansion") {
                    $target = Favorite::whereGuest($request)->whereMansion($id)->delete();
                } else if($type = "land") {
                    $target = Favorite::whereGuest($request)->whereLand($id)->delete();
                } else if($type = "new_detached_house") {
                    $target  = Favorite::whereGuest($request)->whereNewDetachedHouse($id)->delete();
                } else if($type = "new_detached_house_group") {
                    $target  = Favorite::whereGuest($request)->whereNewDetachedHouseGroup($id)->delete();
                } else if($type = "old_detached_house") {
                    $target  = Favorite::whereGuest($request)->whereOldDetachedHouse($id)->delete();
                }
            }
            return redirect()->route('favorite')
        });
    }
    public function about() {
        return view('user.company.info');
    }
    public function buy() {
        return view('user.buy');
    }
    public function sell() {
        return view('user.sell');
    }
    public function rent() {
        return view('user.rent');
    }
    public function other() {
        return view('user.other');
    }

    // News
    public function news() {
        $articles = Information::orderBy('updated_at', 'desc')->paginate(10);;
        return view('user.company.news', compact('articles'));
    }
    public function detail($id) {
        $article = Information::find($id);
        return view('user.company.detail', compact('article'));
    }
    // Customer Review
    public function customerReview() {
        $reviews = Review::orderBy('updated_at', 'desc')->paginate(10);;
        return view('user.company.customer_reviews', compact('reviews'));
    }

    // Reccomend
    public function recommendList() {
        $lands = Recommend::whereNotNull('land_id')->get();
        $mansions = Recommend::whereNotNull('mansion_id')->get();
        $new_detached_houses = Recommend::whereNotNull('new_detached_house_id')->get();
        $new_detached_house_groups = Recommend::whereNotNull('new_detached_house_group_id')->get();
        $old_detached_houses = Recommend::whereNotNull('old_detached_house_id')->get();
        return view('admin.recommend.list', compact('lands', 'mansions', 'new_detached_houses', 'new_detached_house_groups', 'old_detached_houses'));
    }

    // For Admin
    public function showTop() {
        return view('admin.top');
    }
    public function showForm() {
        $staffs = Staff::all();
        return view('admin.news.sign_up', compact('staffs'));
    }
    public function signUp(InformationSignUpRequest $request) {
        $news = new Information;
        $news->signUp($request);
        $request->session()->regenerateToken();
        return redirect()->route('admin.news.signUp')->with('message', '登録が完了しました。');
    }

    public function list() {
        $newses = Information::select('id', 'title', 'content', 'staff_id', 'created_at')
                            ->paginate(15);

        $staffs = Staff::get();

        return view('admin.news.list', compact('newses', 'staffs'));
    }
    public function search(Request $request) {
        $newses = Information::select('id', 'title', 'content', 'staff_id', 'created_at')
                            ->whereTitle($request)
                            ->whereContent($request)
                            ->whereStaffId($request)
                            ->whereCreated($request)
                            ->paginate(15);

        $staffs = Staff::select('id', 'staff_name')->get();

        return view('admin.news.result', compact('newses', 'staffs', 'request'));
    }


    public function delete($id) {
        DB::transaction(function() use($id) {
            $target = Information::find($id);
            $target->delete();
        });
    }
    public function imageDelete($id) {
        DB::transaction(function() use($id) {
            $news = Information::find($id);
            $delete_image = $news->images;
            Storage::disk('public')->delete('/news_images/' . $delete_image);
        });
    }
    public function showDetail($id) {
        $news = Information::find($id);
        return view('admin.news.detail', compact('news'));
    }
    public function edit($id) {
        $news = Information::find($id);
        $staffs = Staff::all();
        return view('admin.news.edit', compact('news', 'staffs'));
    }
    public function update($id, InformationSignUpRequest $request) {
        $news = Information::find($id);
        $news->updateNews($id, $request);
        $request->session()->regenerateToken();

        return redirect()->route('admin.news.edit', ['id' => $news->id])->with('message', '変更内容を登録しました。');
    }
}
