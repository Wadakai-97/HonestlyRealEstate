<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Review;
use App\Models\Information;
use App\Http\Requests\StaffRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $staffs = NewDetachedHouse::select('id', 'staff_name', 'position', 'price', 'land_area', 'building_area', 'pref', 'municipalities', 'block')
                                ->paginate(10);

        return view('admin.staff.list', compact('staffs'));
    }
    public function delete($id) {
        DB::transaction(function() use($id) {
            $target = Staff::find($id);
            $target->delete();
        });
    }
    public function imageDelete($id) {
        DB::transaction(function() use($id) {
            $staff = Staff::find($id);
            $delete_image = $staff->head_shot;
            Storage::disk('public')->delete('/head_shots/' . $delete_image);
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
        return redirect()->route('admin.staff.edit', ['id' => $staff->id])->with('message', '変更内容を登録しました。');
    }
}
