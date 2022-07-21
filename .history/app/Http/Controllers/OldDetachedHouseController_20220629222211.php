<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\OldDetachedHouse;
use App\Http\Requests\OldDetachedHouseSignUpRequest;

class OldDetachedHouseController extends Controller
{
    // ユーザー画面
    public function top() {
        return view('user.old_detached_house.top');
    }

    public function search() {
        $real_estates = OldDetachedHouse::all();
        return view('user.search_result', compact('real_estates'));
    }

    public function detail() {
        return view('user.detail');
    }


    // 管理者画面
    public function showForm() {
        return view('admin.old_detached_house.sign_up');
    }

    public function signUp(OldDetachedHouseSignUpRequest $request) {
        $post = new OldDetachedHouse;
        $post->signUp($request);
        $request->session()->regenerateToken();
        return redirect('admin.old_detached_house.sign_up')->with('message', '登録が完了しました。');
    }

    public function list() {
        return view('admin.old_detached_house.list');
    }

    public function delete($id) {
        DB::transaction(function() use($id) {
            $target = OldDetachedHouse::find($id);
            $target->delete();
        });
    }

    public function showDetail($id) {
        $old_detached_house = OldDetachedHouse::find($id);
        return view('admin.old_detached_house.detail', compact('old_detached_house'));
    }

    public function edit($id) {
        $old_detached_house = OldDetachedHouse::find($id);
        return view('admin.old_detached_house.edit', compact('old_detached_house'));
    }

    public function save($id, OldDetachedHouseSignUpRequest $request) {
        $old_detached_house = OldDetachedHouse::find($id);
        $old_detached_house->update($id, $request);
        $request->session()->regenerateToken();
        Session::flash('message', '編集内容を登録しました。');
        return view('admin.old_detached_house.edit', compact('old_detached_house'));
    }
}
