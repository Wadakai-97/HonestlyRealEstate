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
    public function favoriteList(Request $request) {
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

        return back()->with('message', 'お気に入り登録に成功しました。');
    }
    // 登録削除
    public function favoriteSignOff($id, Request $request){
        DB::transaction(function() use($id, $request) {
            $favorite = new Favorite;
            $favorite->favoriteSignOff($request, $id);
            $request->session()->regenerateToken();
        });

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

    // キーワード検索
    public function keywordSearch(Request $request) {
        $mansions = Mansion::select('id', 'apartment_name', 'pref', 'municipalities', 'price', 'occupation_area', 'number_of_rooms', 'type_of_room', 'floor', 'story', 'year', 'station', 'access_method', 'distance_station')
                            ->whereKeyword($request)
                            ->paginate(15);
        $lands = Land::select('id', 'apartment_name', 'pref', 'municipalities', 'price', 'occupation_area', 'number_of_rooms', 'type_of_room', 'floor', 'story', 'year', 'station', 'access_method', 'distance_station')
                            ->whereKeyword($request)
                            ->paginate(15);
        $new_detached_houses = NewDetachedHouse::select('id', 'name', 'pref', 'municipalities', 'price', 'land_area','building_area', 'number_of_rooms', 'type_of_room', 'station', 'access_method', 'distance_station',  'land_right')
                            ->whereKeyword($request)
                            ->paginate(15);
        $new_detached_house_groups = NewDetachedHouseGroup::select('id', 'name', 'pref', 'municipalities', 'lowest_price', 'highest_price', 'lowest_land_area', 'highest_land_area', 'lowest_building_area', 'highest_building_area', 'lowest_number_of_rooms', 'highest_number_of_rooms', 'lowest_type_of_room', 'highest_type_of_room', 'station', 'access_method', 'distance_station',  'land_right', 'updated_at')
                            ->whereKeyword($request)
                            ->paginate(15);
        $old_detached_houses = OldDetachedHouse::select('id', 'name', 'price', 'pref', 'municipalities', 'land_area', 'building_area', 'number_of_rooms', 'type_of_room', 'year', 'land_right', 'station', 'access_method', 'distance_station', 'updated_at')
                            ->whereKeyword($request)
                            ->paginate(15);

        return view('user.mansion.result', compact('mansions', 'lands', 'new_detached_houses', 'new_detached_house_groups', 'old_detached_houses'));
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
