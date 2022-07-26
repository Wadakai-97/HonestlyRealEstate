<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\OldDetachedHouse;
use App\Http\Requests\OldDetachedHouseSignUpRequest;

class OldDetachedHouseController extends Controller
{
    // For User
    public function top() {
        return view('user.old_detached_house.top');
    }
    public function search() {
        $pref = $request->pref;
        $municipalities = $request->municipalities ?? '';
        $lowest_price = $request->lowest_price;
        $highest_price = $request->highest_price;
        $lowest_land_area = $request->lowest_land_area;
        $highest_land_area = $request->highest_land_area;
        $land_right = $request->land_right;
        $old = $request->old;
        $construction_conditions = $request->construction_conditions;
        $station = $request->station;
        $walking_distance_station = $request->walking_distance_station;

        $old_detached_houses = OldDetachedHouse::select('id', 'name', 'price', 'pref', 'municipalities', 'land_area', 'building_area', 'number_of_rooms', 'type_of_room', 'year', 'land_right', 'station', 'walking_distance_station', 'updated_at')
                                                ->wherePref($pref)
                                                ->whereMunicipalities($municipalities)
                                                ->whereLowestPrice($lowest_price)
                                                ->whereHighestPrice($highest_price)
                                                ->whereLowestLandAarea($lowest_land_area)
                                                ->whereHighestLandArea($highest_land_area)
                                                ->whereLowestBuildingAarea($lowest_building_area)
                                                ->whereHighestBuildingArea($highest_building_area)
                                                ->wherePlan($plan)
                                                ->whereOld($old)
                                                ->whereStation($station)
                                                ->whereWalkingDistanceStation($walking_distance_station)
                                                ->whereLandRight($land_right)
                                                ->paginate(15);

        $today = Carbon::today()->year;

        return view('user.old_detached_house.result', compact('old_detached_houses', 'rewuest', 'today'));
    }
    public function detail() {
        return view('user.old_detached_house.detail');
    }


    // For Admin
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
    public function update($id, OldDetachedHouseSignUpRequest $request) {
        $old_detached_house = OldDetachedHouse::find($id);
        $old_detached_house->updateOldDetachedHouse($id, $request);
        $request->session()->regenerateToken();
        return redirect()->route('admin.old_detached_house.edit', ['id' => $old_detached_house->id])->with('message', '変更内容を登録しました。');
    }
}
