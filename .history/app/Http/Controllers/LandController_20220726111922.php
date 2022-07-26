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

        return view('user.search_result', compact('lands', 'request'));
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
