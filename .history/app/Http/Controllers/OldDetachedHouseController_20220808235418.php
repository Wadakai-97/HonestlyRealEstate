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
    public function search(Request $request) {
        $pref = $request->pref;
        $municipalities = $request->municipalities ?? '';
        $lowest_price = $request->lowest_price;
        $highest_price = $request->highest_price;
        $lowest_land_area = $request->lowest_land_area;
        $highest_land_area = $request->highest_land_area;
        $lowest_building_area = $request->lowest_building_area;
        $highest_building_area = $request->highest_building_area;
        $land_right = $request->land_right;
        $plan =  $request->plan;
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
        return redirect('admin.oldDetachedHouse.sign_up')->with('message', '登録が完了しました。');
    }
    public function list() {
        $old_detached_houses = OldDetachedHouse::select('id', 'name', 'number_of_rooms', 'type_of_room', 'price', 'land_area', 'building_area', 'pref', 'municipalities', 'block')
                                            ->paginate(10);

        return view('admin.old_detached_house.list', compact('old_detached_houses'));
    }

    Recommend
    public function recommendSignUp($id) {
        $old_detached_house = OldDetachedHouse::find($id);
        $old_detached_house->recommend($id);
        return redirect()->route('admin.oldDetachedHouse.list')->with('message', 'お気に入り登録が完了しました。');
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


    public function delete($id) {
        DB::transaction(function() use($id) {
            $target = OldDetachedHouse::find($id);
            $target->delete();
        });
    }
    public function adminSearch(Request $request) {
        $pref = $request->pref;
        $municipalities = $request->municipalities ?? '';
        $lowest_price = $request->lowest_price;
        $highest_price = $request->highest_price;
        $lowest_land_area = $request->lowest_land_area;
        $highest_land_area = $request->highest_land_area;
        $lowest_building_area = $request->lowest_building_area;
        $highest_building_area = $request->highest_building_area;
        $plan =  $request->plan;
        $old = $request->old;
        $station = $request->station;
        $walking_distance_station = $request->walking_distance_station;
        $land_right = $request->land_right;

        $old_detached_house = OldDetachedHouse::select('id', 'name', 'pref', 'price', 'land_area', 'building_area', 'number_of_rooms', 'type_of_room', 'station', 'walking_distance_station', 'land_right', 'updated_at')
                                                ->wherePref($pref)
                                                ->whereMunicipalities($municipalities)
                                                ->whereLowestPrice($lowest_price)
                                                ->whereHighestPrice($highest_price)
                                                ->whereLowestLandArea($lowest_land_area)
                                                ->whereHighestLandArea($highest_land_area)
                                                ->whereLowestBuildingArea($lowest_building_area)
                                                ->whereHighestBuildingArea($highest_building_area)
                                                ->wherePlan($plan)
                                                ->whereOld($old)
                                                ->whereStation($station)
                                                ->whereWalkingDistanceStation($walking_distance_station)
                                                ->whereLandRight($land_right)
                                                ->paginate(15);
        $request->session()->regenerateToken();

        return view('admin.old_detached_house.result', compact('old_detached_houses', 'request'));
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
        return redirect()->route('admin.oldDetachedHouse.edit', ['id' => $old_detached_house->id])->with('message', '変更内容を登録しました。');
    }
}
