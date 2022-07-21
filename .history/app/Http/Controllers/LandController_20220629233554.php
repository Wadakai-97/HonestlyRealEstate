<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LandSignUpRequest;

class LandController extends Controller
{
    // ユーザー画面
    public function top() {
        return view('user.land.top');
    }

    public function search(Request $request) {
        return view('user.search_result', compact('real_estates'));
    }

    public function detail() {
        return view('user.detail');
    }


    // 管理者画面
    public function showForm() {
        return view('admin.land.sign_up');
    }

    public function signUp(LandSignUpRequest $request) {
        DB::transaction(function() use($request) {
            $requests = $request->only(['name', 'price', 'tax', 'pref', 'municipalities', 'block', 'construction_conditions', 'land_area', 'floor_area_ratio', 'building_coverage_ratio', 'urban_planning', 'land_use_zones', 'land_classification', 'land_right', 'status', 'other_fee', 'restrictions_by_law', 'delivery_date', 'terrain', 'adjacent_road', 'adjacent_road_width', 'private_road', 'setback', 'water_supply', 'sewage_line', 'gas', 'building_certification_number', 'construction_conditions', 'station', 'walking_distance_station', 'conditions_of_transactions', 'elementary_school_name', 'elementary_school_district', 'junior_high_school_name', 'junior_high_school_district', 'national_land_utilization_law', 'sales_comment', 'property_introduction', 'terms_and_conditions']);
            Land::create($requests);
        });
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
        $land->update($id, $request)
        Session::flash('message', '編集内容を登録しました。');
        return view('admin.land.edit', compact('land'));
    }
}
