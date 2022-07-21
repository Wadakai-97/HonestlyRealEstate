<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LandRequest;

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

    public function signUp(LandRequest $request) {
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

    public function save($id, LandRequest $request) {
        DB::transaction(function() use($id, $request) {
            $ex_land = land::find($id);
            $ex_land->name = $request->name;
            $ex_land->price = $request->price;
            $ex_land->tax = $request->tax;
            $ex_land->pref = $request->pref;
            $ex_land->municipalities = $request->municipalities;
            $ex_land->block = $request->block;
            $ex_land->land_area = $request->land_area;
            $ex_land->station = $request->station;
            $ex_land->walking_distance_station = $request->walking_distance_station;
            $ex_land->land_right = $request->land_right;
            $ex_land->land_use_zones = $request->land_use_zones;
            $ex_land->other_fee = $request->other_fee;
            $ex_land->status = $request->status;
            $ex_land->delivery_date = $request->delivery_date;
            $ex_land->property_introduction = $request->property_introduction;
            $ex_land->sales_comment = $request->sales_comment;
            $ex_land->elementary_school_name = $request->elementary_school_name;
            $ex_land->elementary_school_district = $request->elementary_school_district;
            $ex_land->junior_high_school_name = $request->junior_high_school_name;
            $ex_land->junior_high_school_district = $request->junior_high_school_district;
            $ex_land->terms_and_conditions = $request->terms_and_conditions;
            $ex_land->conditions_of_transactions = $request->conditions_of_transactions;
            $ex_land->save();
            if(!empty($request->file('files'))) {
                foreach ($request->file('files') as $index => $e) {
                    $ext = $e['image']->guessExtension();
                    $file_name = "{$request->name}_{$index}.{$ext}";
                    $e['image']->storeAs('public/land_images', $file_name);
                    $images = LandImage::find($id);
                    $images->path = $file_name;
                    $images->land_id = $land->id;
                    $images->save();
                }
                $ex_land->images = $file_name;
                $ex_land->save();
            }
        });
        Session::flash('message', '編集内容を登録しました。');
        return view('admin.land.edit', compact('land'));
    }
}
