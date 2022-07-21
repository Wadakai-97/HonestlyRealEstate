<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Staff;
use App\Models\Review;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StaffRequest;

class StaffController extends Controller
{
    // ユーザー画面
    // 一覧表示
    public function show() {
        $staffs = Staff::all();
        return view('user.staff.all', compact('staffs'));
    }

    // 詳細表示
    public function detail($id) {
        $staff = Staff::find($id);
        $articles = Information::where('staff_id', $id)->get();
        $reviews = Review::where('staff_id', $id)->get();
        return view('user.staff.individual', compact('staff', 'articles', 'reviews'));
    }


    // 管理者画面
    public function showForm() {
        return view('admin.staff.sign_up');
    }

    public function signUp(StaffRequest $request) {
        $post = new Staff;
        $post->signUpStaff($request);
        $request->session()->regenerateToken();
        return redirect()->route('admin.staff.signUp')->with('message', '登録が完了しました。');
    }

    public function list() {
        return view('admin.staff.list');
    }

    public function delete($id) {
        DB::transaction(function() use($id) {
            $target = Staff::find($id);
            $target->delete();
        });
    }

    public function showDetail($id) {
        $staff = Staff::find($id);
        return view('admin.staff.detail', compact('staff'));
    }

    public function edit($id) {
        $staff = Staff::find($id);
        return view('admin.staff.edit', compact('staff'));
    }

    public function save($id, StaffRequest $request) {
        $ex_post = Staff::find($id);
        $ex_post->updateStaff($id, $request);
        Session::flash('message', '編集内容を登録しました。');
        $staff = Staff::find($id);
        return view('admin.staff.edit', compact('staff'));
    }
}
