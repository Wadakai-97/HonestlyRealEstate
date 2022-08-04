<?php

namespace App\Http\Controllers;

use App\Models\NewDetachedHouse;
use App\Models\NewDetachedHouseImage;
use App\Models\NewDetachedHouseGroup;
use App\Models\NewDetachedHouseGroupImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NewDetachedHouseRequest;
use App\Http\Requests\NewDetachedHouseSignUpRequest;
use App\Http\Requests\NewDetachedHouseGroupRequest;
use App\Http\Requests\NewDetachedHouseGroupSignUpRequest;

class NewDetachedHouseController extends Controller
{
    // For User
    public function top() {
        return view('user.new_detached_house.top');
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
        $plan =  $request->plan;
        $station = $request->station;
        $walking_distance_station = $request->walking_distance_station;
        $land_right = $request->land_right;

        $new_detached_house = NewDetachedHouse::select('id', 'name', 'pref', 'municipalities', 'price', DB::raw(" '' AS lowest_price"), DB::raw(" '' AS highest_price"), 'land_area', DB::raw(" '' AS lowest_land_area"), DB::raw(" '' AS highest_land_area"),'building_area', DB::raw(" '' AS lowest_building_area"), DB::raw(" '' AS highest_building_area"), 'number_of_rooms', DB::raw(" '' AS lowest_number_of_rooms"), DB::raw(" '' AS highest_number_of_rooms"), 'type_of_room', 'station', 'walking_distance_station', 'land_right', 'updated_at')
                                                ->wherePref($pref)
                                                ->whereMunicipalities($municipalities)
                                                ->whereLowestPrice($lowest_price)
                                                ->whereHighestPrice($highest_price)
                                                ->whereLowestLandArea($lowest_land_area)
                                                ->whereHighestLandArea($highest_land_area)
                                                ->whereLowestBuildingArea($lowest_building_area)
                                                ->whereHighestBuildingArea($highest_building_area)
                                                ->wherePlan($plan)
                                                ->whereStation($station)
                                                ->whereWalkingDistanceStation($walking_distance_station)
                                                ->whereLandRight($land_right);

        $new_detached_houses = NewDetachedHouseGroup::select('id', 'name', 'pref', 'municipalities', DB::raw(" '' AS price"), 'lowest_price', 'highest_price', DB::raw(" '' AS land_area"), 'lowest_land_area', 'highest_land_area', DB::raw(" '' AS building_area"), 'lowest_building_area', 'highest_building_area', DB::raw(" '' AS number_of_rooms"), 'lowest_number_of_rooms', 'highest_number_of_rooms', 'type_of_room', 'station', 'walking_distance_station', 'land_right', 'updated_at')
                                                    ->wherePref($pref)
                                                    ->whereMunicipalities($municipalities)
                                                    ->whereLowestPrice($lowest_price)
                                                    ->whereHighestPrice($highest_price)
                                                    ->whereLowestLandArea($lowest_land_area)
                                                    ->whereHighestLandArea($highest_land_area)
                                                    ->whereLowestBuildingArea($lowest_building_area)
                                                    ->whereHighestBuildingArea($highest_building_area)
                                                    ->wherePlan($plan)
                                                    ->whereStation($station)
                                                    ->whereWalkingDistanceStation($walking_distance_station)
                                                    ->whereLandRight($land_right)
                                                    ->union($new_detached_house)
                                                    ->get();

        $today = Carbon::today()->year;

        return view('user.new_detached_house.result', compact('new_detached_houses', 'request', 'today'));
    }
    public function detail() {
        return view('user.new_detached_house.detail');
    }


    // For Admin
    // NewDetachedHouse
    public function showForm() {
        return view('admin.new_detached_house.sign_up');
    }
    public function signUp(NewDetachedHouseSignUpRequest $request) {
        $post = new NewDetachedHouse;
        $post->signUp($request);
        $request->session()->regenerateToken();
        Session::flash('message', '登録が完了しました。');
        return redirect('admin.newDetachedHouse.signUp')->with('message', '登録が完了しました。');
    }
    public function list() {
        $new_detached_houses = NewDetachedHouse::select('id', 'name', 'number_of_rooms', 'type_of_room', 'price', 'land_area', 'building_area', 'pref', 'municipalities', 'block')
                            ->paginate(10);

        return view('admin.new_detached_house.list', compact('new_detached_houses'));
    }
    public function delete($id) {
        DB::transaction(function() use($id) {
            $target = NewDetachedHouse::find($id);
            $target->delete();
        });
    }
    public function showDetail($id) {
        $new_detached_house = NewDetachedHouse::find($id);
        return view('admin.new_detached_house.detail', compact('new_detached_house'));
    }
    public function edit($id) {
        $new_detached_house = NewDetachedHouse::find($id);
        return view('admin.new_detached_house.edit', compact('new_detached_house'));
    }
    public function update($id, Request $request) {
        $new_detached_house = NewDetachedHouse::find($id);
        $new_detached_house ->updateNewDetachedHouse($id, $request);
        $request->session()->regenerateToken();
        return redirect()->route('admin.newDetachedHouse.edit', ['id' => $new_detached_house->id])->with('message', '変更内容を登録しました。');
    }

    // NewDetachedHouseGroup
    public function showFormGroup() {
        return view('admin.new_detached_house_group.sign_up');
    }
    public function signUpGroup(NewDetachedHouseGroupSignUpRequest $request) {
        $post = new NewDetachedHouseGroup;
        $post->signUp($request);
        $request->session()->regenerateToken();
        Session::flash('message', '登録が完了しました。');
        return redirect('admin.newDetachedHouseGroup.signUp')->with('message', '登録が完了しました。');
    }
    public function groupList() {
        $new_detached_house_groups = NewDetachedHouseGroup::select('id', 'name', 'lowest_number_of_rooms', 'highest_number_of_rooms', 'lowest_type_of_room', 'highest_type_of_room', 'lowest_price',  'lowest_price','land_area', 'building_area', 'pref', 'municipalities', 'block')
                                            ->paginate(10);

        return view('admin.new_detached_house_group.list', compact('new_detached_house_groups'));
    }
    public function groupDelete($id) {
        DB::transaction(function() use($id) {
            $target = NewDetachedHouseGroup::find($id);
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
        $station = $request->station;
        $walking_distance_station = $request->walking_distance_station;
        $land_right = $request->land_right;

        $new_detached_house = NewDetachedHouse::select('id', 'name', 'pref', 'municipalities', 'price', 'land_area', 'building_area', 'number_of_rooms', 'type_of_room', 'station', 'walking_distance_station', 'land_right')
                                                ->wherePref($pref)
                                                ->whereMunicipalities($municipalities)
                                                ->whereLowestPrice($lowest_price)
                                                ->whereHighestPrice($highest_price)
                                                ->whereLowestLandArea($lowest_land_area)
                                                ->whereHighestLandArea($highest_land_area)
                                                ->whereLowestBuildingArea($lowest_building_area)
                                                ->whereHighestBuildingArea($highest_building_area)
                                                ->wherePlan($plan)
                                                ->whereStation($station)
                                                ->whereWalkingDistanceStation($walking_distance_station)
                                                ->whereLandRight($land_right)
                                                ->paginate(15);

        $request->session()->regenerateToken();

        return view('admin.new_detached_house.result', compact('new_detached_houses', 'request'));
    }
    public function showDetailGroup($id) {
        $new_detached_house_group = NewDetachedHouseGroup::find($id);
        return view('admin.new_detached_house_group.detail', compact('new_detached_house_group'));
    }
    public function groupEdit($id) {
        $new_detached_house_group = NewDetachedHouseGroup::find($id);
        return view('admin.new_detached_house_group.edit', compact('new_detached_house_group'));
    }
    public function groupUpdate($id, NewDetachedHouseGroupSignUpRequest $request) {
        $new_detached_house_group = NewDetachedHouseGroup::find($id);
        $new_detached_house_group->updateNewDetachedHouseGroup($id, $request);
        $request->session()->regenerateToken();
        return redirect()->route('admin.new_detached_house_group.edit', ['id' => $new_detached_house_group->id])->with('message', '変更内容を登録しました。');
    }
}
