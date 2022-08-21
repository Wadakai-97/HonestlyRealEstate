<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mansion;
use App\Models\MansionImage;
use App\Models\MansionAccess;
use App\Models\Recommend;
use App\Http\Requests\ImageSignUpRequest;
use App\Http\Requests\MansionSearchRequest;
use App\Http\Requests\MansionSignUpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MansionController extends Controller
{
    // For User
    public function top() {
        return view('user.mansion.top');
    }
    public function search(MansionSearchRequest $request) {
        $mansions = Mansion::select('id', 'apartment_name', 'pref', 'municipalities', 'price', 'occupation_area', 'number_of_rooms', 'type_of_room', 'floor', 'story', 'year', 'station', 'walking_distance_station', 'updated_at')
                            ->wherePlan($request)
                            ->whereAddress($request)
                            ->whereLowestPrice($request)
                            ->whereHighestPrice($request)
                            ->whereLowestOccupationArea($request)
                            ->whereHighestOccupationArea($request)
                            ->whereOld($request)
                            ->whereStation($request)
                            ->whereWalkingDistanceStation($request)
                            ->paginate(15);

        $today = Carbon::today()->year;
        $request->session()->regenerateToken();
        return view('user.mansion.result', compact('today', 'mansions', 'request'));
    }
    public function sort(Request $request) {
        if($request->sort = '') {
            $column = 'price';
            $type = 'desc';
        }
        if($request->sort = 'high_price') {
            $column = 'price';
            $type = 'asc';
        }

        $mansions = Mansion::select('id', 'apartment_name', 'pref', 'municipalities', 'price', 'occupation_area', 'number_of_rooms', 'type_of_room', 'floor', 'story', 'year', 'station', 'walking_distance_station', 'updated_at')
                            ->wherePlan($request)
                            ->whereAddress($request)
                            ->whereLowestPrice($request)
                            ->whereHighestPrice($request)
                            ->whereLowestOccupationArea($request)
                            ->whereHighestOccupationArea($request)
                            ->whereOld($request)
                            ->whereStation($request)
                            ->whereWalkingDistanceStation($request)
                            ->orderby($column, $type)
                            ->paginate(15);

        $today = Carbon::today()->year;
        $request->session()->regenerateToken();
        return view('user.mansion.result', compact('today', 'mansions', 'request'));
    }
    public function detail($id) {
        $mansion = Mansion::find($id);
        $today = Carbon::today();
        $rollover_date = $today->addDays(14);

        return view('user.mansion.detail', compact('mansion', 'today', 'rollover_date'));
    }


    // For Admin
    // View
    public function showForm() {
        return view('admin.mansion.sign_up');
    }
    public function list() {
        $mansions = Mansion::select('id', 'apartment_name', 'room', 'number_of_rooms', 'type_of_room', 'occupation_area', 'price', 'pref', 'municipalities', 'station', 'walking_distance_station', 'year')
                            ->paginate(15);
        return view('admin.mansion.list', compact('mansions'));
    }
    public function edit($id) {
        $mansion = Mansion::find($id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        return view('admin.mansion.edit', compact('mansion', 'mansion_images'));
    }

    // SignUP
    public function signUp(MansionSignUpRequest $request) {
        $mansion = new Mansion;
        $mansion->mansionSignUp($request);
        $request->session()->regenerateToken();
        return redirect()->route('admin.mansion.form')->with('message', '登録が完了しました。');
    }

    public function imageSignUp($id, ImageSignUpRequest $request) {
        $mansion_image = new MansionImage;
        $mansion_image->imageSignUp($id, $request);
        $mansion = Mansion::find($id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        $image_counter = 1;
        $request->session()->regenerateToken();
        return view('admin.mansion.edit_image', compact('mansion', 'image_counter', 'mansion_images'))->with('message', '画像登録が完了しました。');
    }
    public function imageDelete($id) {
        $mansion_image = MansionImage::find($id);
        $mansion_id = $mansion_image->mansion_id;

        DB::transaction(function() use($id) {
            $mansion_image = MansionImage::find($id);
            Storage::delete('storage/property_images/mansion/' . $mansion_image->path);
            $mansion_image->delete();
        });

        $mansion = Mansion::find($mansion_id);
        $mansion_images = MansionImage::where('mansion_id', '=', $mansion_id)->get();
        $existing_images = MansionImage::where('mansion_id', '=', $mansion_id)->count();

        if(!empty($existing_images)) {
            $image_counter = $existing_images;
        } else if(empty($existing_images)) {
            $image_counter = 1;
        }

        return view('admin.mansion.edit_image', compact('mansion', 'mansion_images', 'image_counter'));
    }
    public function imageEdit($id) {
        $mansion = Mansion::find($id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        $image_counter = 1;
        return view('admin.mansion.edit_image', compact('mansion', 'mansion_images', 'image_counter'));
    }
    public function imageUpdate($id, Request $request) {
        $mansion_image = MansionImage::find($id);
        $mansion_image->imageUpdate($id, $request);
        $mansion = Mansion::find($mansion_image->mansion_id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        $image_counter = 1;
        $request->session()->regenerateToken();
        return view('admin.mansion.edit_image', compact('mansion', 'mansion_images','id', 'image_counter'));
    }

    // Search
    public function adminSearch(MansionSearchRequest $request) {
        $mansions = Mansion::select('id', 'pref', 'municipalities',  'apartment_name', 'room', 'price', 'occupation_area', 'number_of_rooms', 'type_of_room', 'year', 'station', 'walking_distance_station')
                            ->wherePlan($request)
                            ->whereAddress($request)
                            ->whereApartmentName($request)
                            ->whereLowestPrice($request)
                            ->whereHighestPrice($request)
                            ->whereLowestOccupationArea($request)
                            ->whereHighestOccupationArea($request)
                            ->whereOld($request)
                            ->whereStation($request)
                            ->whereWalkingDistanceStation($request)
                            ->paginate(15);

        $request->session()->regenerateToken();

        return view('admin.mansion.result', compact('mansions', 'request'));
    }
    // Delete
    public function delete($id) {
        DB::transaction(function() use($id) {
            $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
            if(!empty($mansion_images)) {
                foreach ($mansion_images as $mansion_image) {
                    if(!empty($mansion_image->path)) {
                        Storage::delete('storage/property_images/mansion/' . $mansion_image->path);
                        $mansion_image->delete();
                    }
                }
            }
            $mansion = Mansion::find($id);
            $mansion->delete();
        });
        return redirect()->route('admin.recommend.list')->with('message', 'お気に入り登録を削除しました。');
    }

    // Detail
    public function showDetail($id) {
        $mansion = Mansion::find($id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        return view('admin.mansion.detail', compact('mansion', 'mansion_images'));
    }
    // Update
    public function update($id, Request $request) {
        $mansion = Mansion::find($id);
        $mansion->updateMansion($id, $request);
        $request->session()->regenerateToken();
        return redirect()->route('admin.mansion.edit', ['id' => $mansion->id])->with('message', '変更内容を登録しました。');
    }
    // Recommend
    public function recommendSignUp($id) {
        $mansion = Mansion::find($id);
        $mansion->recommend($id);
        return redirect()->route('admin.mansion.list')->with('message', 'お気に入り登録が完了しました。');
    }
    public function recommendDelete($id) {
        $recommend_mansion = Recommend::where('mansion_id', $id)->get();

        if(!empty($recommend_mansion)) {
            Recommend::where('mansion_id', $id)->delete();
            $message = 'successMessage';
            $flash_message = "おすすめ登録を削除しました。";
        } else {
            $message = 'errorMessage';
            $flash_message = "削除に失敗しました。";
        }

        return redirect()->route('admin.recommend.list')->with($message, $flash_message);
    }
    // CSV Download
    public function csvDownload() {
        $mansions = Mansion::get();
        return $mansions->exportCsv();
    }
}
