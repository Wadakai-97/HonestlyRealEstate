<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\LandSignUpRequest;

class LandController extends Controller
{
    // For User
    public function top() {
        return view('user.land.top');
    }
    public function search(Request $request) {
        $pref = $request->pref;
        $municipalities = $request->municipalities;
        $lowest_price = $request->lowest_price;
        $highest_price = $request->highest_price;
        $lowest_land_area = $request->lowest_land_area;
        $highest_land_area = $request->highest_land_area;
        $land_right = $request->land_right;
        $construction_conditions = $request->construction_conditions;
        $station = $request->station;
        $walking_distance_station = $request->walking_distance_station;

        $lands = Land::select('id', 'name', 'pref', 'municipalities', 'block', 'price', 'land_area', 'building_coverage_ratio', 'floor_area_ratio', 'land_right', 'construction_conditions', 'station', 'walking_distance_station', 'updated_at')
                    ->wherePref($pref)
                    ->whereMunicipalities($municipalities)
                    ->whereLowestPrice($lowest_price)
                    ->whereHighestPrice($highest_price)
                    ->whereLowestLandAarea($lowest_land_area)
                    ->whereHighestLandArea($highest_land_area)
                    ->whereLandRight($land_right)
                    ->whereConstructionConditions($construction_conditions)
                    ->whereStation($station)
                    ->whereWalkingDistanceStation($walking_distance_station)
                    ->paginate(15);

        $today = Carbon::today()->year;

        return view('user.search_result', compact('lands', 'request', 'today'));
    }
    public function detail() {
        return view('user.detail');
    }


    // For Admin
    public function showForm() {
        return view('admin.land.sign_up');
    }
    public function signUp(LandSignUpRequest $request) {
        $post = new Land;
        $post->signUp($request);
        $request->session()->regenerateToken();
        return redirect()->route('admin.land.signUp')->with('message', '登録が完了しました。');
    }
    public function list() {
        return view('admin.land.list');
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
