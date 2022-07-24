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
        $new_detached_house = NewDetachedHouse::select('pref', 'price', DB::raw(" '' AS lowest_price"), DB::raw(" '' AS highest_price"), 'land_area', DB::raw(" '' AS lowest_land_area"), DB::raw(" '' AS highest_land_area"),'building_area', DB::raw(" '' AS lowest_building_area"), DB::raw(" '' AS highest_building_area"), 'number_of_rooms', DB::raw(" '' AS lowest_number_of_rooms"), DB::raw(" '' AS highest_number_of_rooms"), 'station', 'walking_distance_station', 'land_right')
                                                ->wherePref($request)
                                                ->whereLowestPrice($request)
                                                ->whereHighestPrice($request)
                                                ->whereLowestLandArea($request)
                                                ->whereHighestLandArea($request)
                                                ->whereLowestBuildingArea($request)
                                                ->whereHighestBuildingArea($request)
                                                ->wherePlan($request)
                                                ->whereStation($request)
                                                ->whereWalkingDistanceStation($request)
                                                ->whereLandRight($request);

        $new_detached_houses = NewDetachedHouseGroup::select('pref', DB::raw(" '' AS price"), 'lowest_price', 'highest_price', DB::raw(" '' AS land_area"), 'lowest_land_area', 'highest_land_area', DB::raw(" '' AS building_area"), 'lowest_building_area', 'highest_building_area', DB::raw(" '' AS number_of_rooms"), 'lowest_number_of_rooms', 'highest_number_of_rooms', 'station', 'walking_distance_station', 'land_right')
                                                    ->wherePref($request)
                                                    ->whereLowestPrice($request)
                                                    ->whereHighestPrice($request)
                                                    ->whereLowestLandArea($request)
                                                    ->whereHighestLandArea($request)
                                                    ->whereLowestBuildingArea($request)
                                                    ->whereHighestBuildingArea($request)
                                                    ->wher<MultipleePlan($request)
                                                    ->whereStation($request)
                                                    ->whereWalkingDistanceStation($request)
                                                    ->whereLandRight($request)
                                                    ->union($new_detached_house)
                                                    ->get();

        return view('user.new_detached_house.result', compact('real_estates'));
    }
    public function detail() {
        return view('user.detail');
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
        return view('admin.new_detached_house.list');
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
        return view('admin.new_detached_house_group.list');
    }
    public function groupDelete($id) {
        DB::transaction(function() use($id) {
            $target = NewDetachedHouseGroup::find($id);
            $target->delete();
        });
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
