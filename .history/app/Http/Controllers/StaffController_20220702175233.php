<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Staff;
use App\Models\Review;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StaffRequest;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    // For User
    public function show() {
        $staffs = Staff::all();
        return view('user.staff.all', compact('staffs'));
    }
    public function detail($id) {
        $staff = Staff::find($id);
        $articles = Information::where('staff_id', $id)->get();
        $reviews = Review::where('staff_id', $id)->get();
        return view('user.staff.individual', compact('staff', 'articles', 'reviews'));
    }


    // For Admin
    public function showForm() {
        return view('admin.staff.sign_up');
    }
    public function signUp(StaffRequest $request) {
        $post = new Staff;
        $post->signUp($request);
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
    public function imageDelete($src) {
        DB::transaction(function() use($src) {
            // $staff = Staff::find($id);
            // $delete_image = $Staff->head_shot;
            
            Storage::delete('storage/head_shots/' . $delete_image);
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
    public function update($id, StaffRequest $request) {
        $staff = Staff::find($id);
        $staff->updateStaff($id, $request);
        Session::flash('message', '編集内容を登録しました。');
        return view('admin.staff.edit', compact('staff'));
    }
}
