<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mansion;
use App\Models\MansionImage;
use App\Http\Requests\MansionSearchRequest;
use App\Http\Requests\MansionSignUpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MansionController extends Controller
{
    // For User
    public function top() {
        return view('user.mansion.top');
    }
    public function search(Request $request) {
        $pref = $request->pref;
        $lowest_price = $request->lowest_price;
        $highest_price = $request->highest_price;
        $lowest_occupation_area = $request->lowest_occupation_area;
        $highest_occupation_area = $request->highest_occupation_area;
        $plan = $request->plan;
        $old = $request->old;
        $station = $request->station;
        $walking_distance_station = $request->walking_distance_station;

        $mansions = Mansion::select('id', 'apartment_name', 'pref', 'municipalities', 'price', 'occupation_area', 'number_of_rooms', 'type_of_room', 'floor', 'story', 'year', 'station', 'walking_distance_station', 'updated_at')
                            ->wherePref($pref)
                            ->whereLowestPrice($lowest_price)
                            ->whereHighestPrice($highest_price)
                            ->whereLowestOccupationArea($lowest_occupation_area)
                            ->whereHighestOccupationArea($highest_occupation_area)
                            ->wherePlan($plan)
                            ->whereOld($old)
                            ->whereStation($station)
                            ->whereWalkingDistanceStation($walking_distance_station)
                            ->paginate(15);

        $today = Carbon::today()->year;
        return view('user.mansion.result', compact('today', 'mansions', 'request'));
    }
    public function detail($id) {
        $mansion = Mansion::find($id);
        $today = Carbon::today();
        $rollover_date = $today->addDays(14);
        return view('user.mansion.detail', compact('mansion', 'today', 'rollover_date'));
    }


    // For Admin
    // For View
    public function showForm() {
        return view('admin.mansion.sign_up');
    }
    public function list() {
        return view('admin.mansion.list');
    }
    public function edit($id) {
        $mansion = Mansion::find($id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        return view('admin.mansion.edit', compact('mansion', 'mansion_images'));
    }
    public function editImage($id) {
        $mansion = Mansion::find($id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        return view('admin.mansion.edit_image', compact('mansion', 'mansion_images'));
    }

    // For SignUp
    public function signUp(MansionSignUpRequest $request) {
        $post = new Mansion;
        $post->signUp($request);
        return redirect()->route('admin.mansion.signUp')->with('message', '登録が完了しました。');
    }

    // For Search
    public function adminSearch(Request $request) {
        $pref = $request->pref;
        $municipalities = $request->municipalities ?? '';
        $apartment_name = $request->apartment_name ?? '';
        $lowest_price = $request->lowest_price;
        $highest_price = $request->highest_price;
        $lowest_occupation_area = $request->lowest_occupation_area;
        $highest_occupation_area = $request->highest_occupation_area;
        $plan = $request->plan;
        $type_of_room = $request->type_of_room;
        $old = $request->old;
        $station = $request->station;
        $walking_distance_station = $request->walking_distance_station;

        $mansions = Mansion::select('id', 'apartment_name', 'number_of_rooms', 'type_of_room', 'occupation_area', 'price', 'pref', 'municipaliteis')
                            ->wherePref($pref)
                            ->whereMunicipalities($municipalities)
                            ->whereApartmentName($apartment_name)
                            ->whereLowestPrice($lowest_price)
                            ->whereHighestPrice($highest_price)
                            ->whereLowestOccupationArea($lowest_occupation_area)
                            ->whereHighestOccupationArea($highest_occupation_area)
                            ->wherePlan($plan)
                            ->whereTypeOfRoom($type_of_room)
                            ->whereOld($old)
                            ->whereStation($station)
                            ->whereWalkingDistanceStation($walking_distance_station)
                            ->paginate(15);

        $request->session()->regenerateToken();

        return view('admin.mansion.result', compact('mansions', 'request'));
    }

    // For Delete
    public function delete($id) {
        DB::transaction(function() use($id) {
            $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
            if(!empty($mansion_images)) {
                foreach ($mansion_images as $mansion_image) {
                    Storage::delete('mansion_images/' . $mansion_image->path);
                    $mansion_image->delete();
                }
                $mansion_images->delete();
            }
            $mansion = Mansion::find($id);
            $mansion->delete();
        });
    }
    public function deleteImage($id) {
        DB::transaction(function() use($id) {
            $mansion_image = MansionImage::where('mansion_id', '=', $mansion->id)->where('image_id', '=', $id)->get();
            if(Storage::exists('mansion_images/' . $mansion_image->path)) {
                Storage::delete('mansion_images/' . $mansion_image->path);
            }
        });
    }

    // For Detail
    public function showDetail($id) {
        $mansion = Mansion::find($id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        return view('admin.mansion.detail', compact('mansion', 'mansion_images'));
    }

    // For Update
    public function update($id, Request $request) {
        $mansion = Mansion::find($id);
        $mansion->updateMansion($id, $request);
        $request->session()->regenerateToken();
        return redirect()->route('admin.mansion.edit', ['id' => $mansion->id])->with('message', '変更内容を登録しました。');
    }
    public function updatePhoto($id, $request) {
        $mansion_image = MansionImage::where('mansion_id', '=', $request->mansion_id)->where('image_id', '=', $id)->get();
        $mansion_image->updateMansionImage($id, $request);
        $mansion = Mansion::find($request->mansion_id);
        $request->session()->regenerateToken();
        return redirect()->route('admin.mansion.edit_photo', ['id' => $mansion->id])->with('message', '変更内容を登録しました。');
    }

    // For CSV Download
    public function csvDownload() {
        $mansions = Mansion::get();
        return $mansions->exportCsv();
    }
}
