<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Staff;
use App\Models\Review;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    // ユーザー画面
    public function show() {
        return view('user.top');
    }
    public function about() {
        return view('company.info');
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
    // ニュース一覧
    public function news() {
        $articles = Information::orderBy('updated_at', 'desc')->paginate(10);;
        return view('user.company.news', compact('articles'));
    }
    // ニュース詳細
    public function detail($id) {
        $article = Information::find($id);
        return view('user.company.detail', compact('article'));
    }
    // お客様評価
    public function customerReview() {
        $reviews = Review::orderBy('updated_at', 'desc')->paginate(10);;
        return view('user.company.customer_reviews', compact('reviews'));
    }

    // 管理者画面

    public function showTop() {

    }

    public function showForm() {
        $staffs = Staff::all();
        return view('admin.news.sign_up', compact('staffs'));
    }

    public function signUp(Request $request) {
        DB::transaction(function() use($request) {
            $requests = $request->only(['title', 'body', 'images']);
            Information::create($requests);
        });
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

    public function showDetail($id) {
        $news = Information::find($id);
        return view('admin.news.detail', compact('news'));
    }

    public function edit($id) {
        $news = Information::find($id);
        return view('admin.news.edit', compact('news'));
    }

    public function save($id, Request $request) {
        DB::transaction(function() use($id, $request) {
            $ex_news = Information::find($id);
            $ex_news->title = $request->title;
            $ex_news->body = $request->body;
            $ex_request->images = $request->images;
            $ex_news->update();
        });
        $news = Information::find($id);
        Session::flash('message', '編集内容を登録しました。');
        return view('admin.news.edit', compact('news'));
    }
}
