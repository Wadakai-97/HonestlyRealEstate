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
        $ip = $request->ip();
        $data_check = Favorite::where('ip', '=', $ip);

        if(!empty($data_check)) {
            $lands = Favorite::where('ip', '=', $ip)->whereNotNull('land_id')->get();
            $mansions = Favorite::where('ip', '=', $ip)->whereNotNull('mansion_id')->get();
            $new_detached_houses = Favorite::where('ip', '=', $ip)->whereNotNull('new_detached_house_id')->get();
            $new_detached_house_groups = Favorite::where('ip', '=', $ip)->whereNotNull('new_detached_house_group_id')->get();
            $old_detached_houses = Favorite::where('ip', '=', $ip)->whereNotNull('old_detached_house_id')->get();
            return view('user.favorite', compact('lands', 'mansions', 'new_detached_houses', 'new_detached_house_groups', 'old_detached_houses'));
        }

        return view('user.favorite');
    }
    // 登録処理
    public function favoriteSignUp($id, Request $request){
        $favorite = New Favorite();
        $favorite->favoriteSignUp($request, $id);
        $request->session()->regenerateToken();

        return back();
    }

    public function favoriteSignOff($id, Request $request){
        DB::transaction(function() use($id, $request) {
            $type = $request->type;

            if($type = "mansion") {
                $target = Favorite::where('mansinon_id', '=', $id)->get();
            } else if($type = "land") {
                $target = Favorite::where('land_id', '=', $id)->get();
            } else if($type = "new_detached_house") {
                $target  = Favorite::where('new_detached_house_id', '=', $id)->get();
            } else if($type = "new_detached_house_group") {
                $targetouse_group_id  = Favorite::where('new_detached_house_group_id', '=', $id)->get();
            } else if($type = "old_detached_house") {
                $targetouse_id  = Favorite::where('old_detached_house_id', '=', $id)->get();
            }
            $mansion->delete();
        });

        if(!empty($recommend_mansion)) {
            Recommend::where('mansion_id', $id)->delete();
            $message = 'successMessage';
            $flash_message = "おすすめ登録を削除しました。";
        } else {
            $message = 'errorMessage';
            $flash_message = "削除に失敗しました。";
        }

        return back();
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
