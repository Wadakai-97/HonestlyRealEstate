<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Blog;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    // ユーザー画面
    public function show() {
        return view('user.blog.top');
    }

    public function detail() {
        return view('user.blog.article');
    }


    // 管理者画面
    public function showForm() {
        $staffs = Staff::all();
        return view('admin.blog.sign_up', compact('staffs'));
    }

    public function signUp(Request $request) {
        DB::transaction(function() use($request) {
            $requests = $request->only(['title', 'images', 'content', 'staff_id']);
            Blog::create($requests);
        });
        $request->session()->regenerateToken();
        return redirect()->route('admin.blog.signUp')->with('message', '登録が完了しました。');
    }

    public function list() {
        $blogs = Blog::all();
        return view('admin.blog.list', compact('blogs'));
    }

    public function delete($id) {
        DB::transaction(function() use($id) {
            $target = Blog::find($id);
            $target->delete();
        });
    }

    public function showDetail($id) {
        $blog = Blog::find($id);
        return view('admin.blog.admin_detail', compact('blog'));
    }

    public function edit($id) {
        $blog = Blog::find($id);
        $staffs = Staff::all();
        return view('admin.blog.edit', compact('blog', 'staffs'));
    }

    public function save($id, Request $request) {
        DB::transaction(function() use($id, $request) {
            $ex_blog = Blog::find($id);
            $ex_blog->title = $request->title;
            $ex_blog->images = $request->images;
            $ex_blog->content = $request->content;
            $ex_blog->staff_id = $request->staff_id;
            $ex_blog->update();
        });
        $blog = Blog::find($id);
        $staffs = Staff::all();
        Session::flash('message', '編集内容を登録しました。');
        return view('admin.blog.edit', compact('blog', 'staffs'));
    }
}
