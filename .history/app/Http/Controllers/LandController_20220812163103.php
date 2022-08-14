<?php

namespace App\Http\Controllers;

use App\Models\Land;
use App\Models\LandImage;
use App\Models\Recommend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ImageSignUpRequest;
use App\Http\Requests\LandSignUpRequest;

class LandController extends Controller
{
    // For User
    public function top() {
        return view('user.land.top');
    }
    public function search(Request $request) {
        $lands = Land::select('id', 'name', 'pref', 'municipalities', 'block', 'price', 'land_area', 'building_coverage_ratio', 'floor_area_ratio', 'land_right', 'construction_conditions', 'station', 'walking_distance_station', 'updated_at')
                    ->wherePref($request)
                    ->whereAddress($request)
                    ->whereLowestPrice($request)
                    ->whereHighestPrice($request)
                    ->whereLowestLandArea($request)
                    ->whereHighestLandArea($request)
                    ->whereConstructionConditions($request)
                    ->whereStation($request)
                    ->whereWalkingDistanceStation($request)
                    ->whereLandRight($request)
                    ->paginate(15);

        $today = Carbon::today()->year;

        return view('user.land.result', compact('lands', 'request', 'today'));
    }
    public function detail() {
        return view('user.land.detail');
    }


    // For Admin
    // SignUp
    public function showForm() {
        return view('admin.land.sign_up');
    }
    public function signUp(LandSignUpRequest $request) {
        $post = new Land;
        $post->signUp($request);
        $request->session()->regenerateToken();
        return redirect()->route('admin.land.signUp')->with('message', '登録が完了しました。');
    }

    // Image
    public function imageSignUp($id, ImageSignUpRequest $request) {
        $land_image = new LandImage;
        $land_image->imageSignUp($id, $request);
        $land = Land::find($id);
        $land_images = LandImage::where('land_id', '=', $id)->get();
        $image_counter = 1;
        $request->session()->regenerateToken();
        return view('admin.land.edit_image', compact('land', 'image_counter', 'land_images'))->with('message', '画像登録が完了しました。');
    }
    public function imageDelete($id) {
        $land_image = LandImage::find($id);
        $land_id = $land_image->land_id;

        DB::transaction(function() use($id) {
            $land_image = LandImage::find($id);
            Storage::delete('storage/property_images/land/' . $land_image->path);
            $land_image->delete();
        });

        $land = Land::find($land_id);
        $land_images = LandImage::where('land_id', '=', $land_id)->get();
        $existing_images = LandImage::where('land_id', '=', $land_id)->count();

        if(!empty($existing_images)) {
            $image_counter = $existing_images;
        } else if(empty($existing_images)) {
            $image_counter = 1;
        }

        return view('admin.land.edit_image', compact('land', 'land_images', 'image_counter'));
    }
    public function imageUpdate($id, ImageSignUpRequest $request) {
        $land_image = LandImage::find($id);
        $land_image->imageUpdate($id, $request);
        $land = Land::find($land_image->land_id);
        $land_images = LandImage::where('land_id', '=', $id)->get();
        $image_counter = 1;
        $request->session()->regenerateToken();
        return view('admin.land.edit_image', compact('land', 'land_images','id', 'image_counter'));
    }

    // List
    public function list() {
        $lands = Land::select('id', 'land_area', 'land_right', 'price', 'pref', 'municipalities', 'block', 'station', 'walking_distance_station')
                    ->paginate(10);

        return view('admin.land.list', compact('lands'));
    }
    public function adminSearch(Request $request) {
        $lands = Land::select('id', 'pref', 'municipaliteis', 'price', 'name', 'land_area', 'construction_conditions', 'station', 'walking_distance', )
                    ->wherePref($request)
                    ->whereAddress($request)
                    ->whereLowestPrice($request)
                    ->whereHighestPrice($request)
                    ->whereLowestLandArea($request)
                    ->whereHighestLandArea($request)
                    ->whereConstructionConditions($request)
                    ->whereStation($request)
                    ->whereWalkingDistanceStation($request)
                    ->whereLandRight($request)
                    ->paginate(15);

        $request->session()->regenerateToken();

        return view('admin.land.result', compact('lands', 'request'));
    }

    // Recommend
    public function recommendSignUp($id) {
        $land = Land::find($id);
        $land->recommend($id);
        return redirect()->route('admin.land.list')->with('message', 'お気に入り登録が完了しました。');
    }
    public function recommendDelete($id) {
        $recommend_land = Recommend::where('land_id', $id)->get();

        if(!empty($recommend_land)) {
            Recommend::where('land_id', $id)->delete();
            $message = 'successMessage';
            $flash_message = "おすすめ登録を削除しました。";
        } else {
            $message = 'errorMessage';
            $flash_message = "削除に失敗しました。";
        }

        return redirect()->route('admin.recommend.list')->with($message, $flash_message);
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
        $land->updateLand($id, $request);
        Session::flash('message', '編集内容を登録しました。');
        return view('admin.land.edit', compact('land'));
    }
}
