<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Review;
use App\Models\Land;
use App\Models\Mansion;
use App\Models\NewDetachedHouse;
use App\Models\NewDetachedHouseGroup;
use App\Models\OldDetachedHouse;
use App\Models\Recommend;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\InformationRequest;

class InformationController extends Controller
{
    // For User
    // TOP
    public function show() {
        return view('user.top');
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
    public function signUp(InformationRequest $request) {
        $post = new Information;
        $post->signUp($request);
        $request->session()->regenerateToken();
        return redirect()->route('admin.news.signUp')->with('message', '登録が完了しました。');
    }
    public function list() {
        $news = Information::select('id', 'title', 'body', 'created_at', 'price', 'land_area', 'building_area', 'pref', 'municipalities', 'block')
                                                ->paginate(10);
        return view('admin.news.list', compact('news'));
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
        return view('admin.news.edit', compact('news'));
    }
    public function update($id, InformationRequest $request) {
        $news = Information::find($id);
        $news->updateNews($id, $request);
        return redirect()->route('admin.news.edit', ['id' => $news->id])->with('message', '変更内容を登録しました。');
    }
}
