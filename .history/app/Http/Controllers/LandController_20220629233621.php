<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LandSignUpRequest;

class LandController extends Controller
{
    // ユーザー画面
    public function top() {
        return view('user.land.top');
    }

    public function search(Request $request) {
        return view('user.search_result', compact('real_estates'));
    }

    public function detail() {
        return view('user.detail');
    }


    // 管理者画面
    public function showForm() {
        return view('admin.land.sign_up');
    }

    public function signUp(LandSignUpRequest $request) {
        $post = new Land;
        $post->
        $request->session()->regenerateToken();
        return redirect()->route('admin.land.signUp')->with('message', '登録が完了しました。');
    }

    public function list() {
        return view('admin.land.list');
    }

    public function delete($id) {
        DB::transaction(function() use($id) {
            $target = Land::find($id);
            $target->delete();
        });
    }

    public function showDetail($id) {
        $land = Land::find($id);
        return view('admin.land.detail', compact('land'));
    }

    public function edit($id) {
        $land = Land::find($id);
        return view('admin.land.edit', compact('land'));
    }

    public function update($id, LandSignUpRequest $request) {
        $land = Land::find($id);
        $land->update($id, $request);
        Session::flash('message', '編集内容を登録しました。');
        return view('admin.land.edit', compact('land'));
    }
}
