<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Review;
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
        $recommends = Recommend::get();
        if(!empty($recommends->land_id)) {
            $land = Land::find($recommend->land_id);
        }
        if(!empty($recommends->mansion_id)) {
            $mansion = Mansion::find($recommend->mansion_id);
        }
        if(!empty($recommends->new_detached_house_id)) {
            $new_detached_house = NewDetachedHouse::find($recommend->new_detached_house_id);
        }
        if(!empty($recommends->new_detached_house_group_id)) {
            $new_detached_house_group = NewDetachedHouseGroup::find($recommend->new_detached_house_group_id);
        }
        if(!empty($recommends->old_detached_house_id)) {
            $old_detached_house = OldDetachedHouse::find($recommend->old_detached_house_id);
        }

        return view('admin.recommend.list', compact('land'));
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
        return view('admin.news.list');
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