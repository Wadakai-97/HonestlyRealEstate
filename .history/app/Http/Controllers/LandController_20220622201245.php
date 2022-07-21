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

    public function save($id) {
        DB::transaction(function() use($id, $request) {
            $ex_mansion = Mansion::find($id);
            $ex_mansion->apartment_name = $request->apartment_name;
            $ex_mansion->room = $request->room;
            $ex_mansion->price = $request->price;
            $ex_mansion->tax = $request->tax;
            $ex_mansion->pref = $request->pref;
            $ex_mansion->municipalities = $request->municipalities;
            $ex_mansion->block = $request->block;
            $ex_mansion->land_area = $request->land_area;
            $ex_mansion->building_area = $request->building_area;
            $ex_mansion->number_of_rooms = $request->number_of_rooms;
            $ex_mansion->type_of_room = $request->type_of_room;
            $ex_mansion->measuring_method = $request->measuring_method;
            $ex_mansion->occupation_area = $request->occupation_area;
            $ex_mansion->balcony_area = $request->balcony_area;
            $ex_mansion->parking_lot = $request->parking_lot;
            $ex_mansion->floor = $request->floor;
            $ex_mansion->story = $request->story;
            $ex_mansion->year = $request->year;
            $ex_mansion->month = $request->month;
            $ex_mansion->day = $request->day;
            $ex_mansion->direction = $request->direction;
            $ex_mansion->station = $request->station;
            $ex_mansion->walking_distance_station = $request->walking_distance_station;
            $ex_mansion->building_construction = $request->building_construction;
            $ex_mansion->total_number_of_households = $request->total_number_of_households;
            $ex_mansion->land_right = $request->land_right;
            $ex_mansion->land_use_zones = $request->land_use_zones;
            $ex_mansion->management_company = $request->management_company;
            $ex_mansion->management_system = $request->management_system;
            $ex_mansion->maintenance_fee = $request->maintenance_fee;
            $ex_mansion->reserve_fund_for_repair = $request->reserve_fund_for_repair;
            $ex_mansion->other_fee = $request->other_fee;
            $ex_mansion->status = $request->status;
            $ex_mansion->delivery_date = $request->delivery_date;
            $ex_mansion->property_introduction = $request->property_introduction;
            $ex_mansion->sales_comment = $request->sales_comment;
            $ex_mansion->elementary_school_name = $request->elementary_school_name;
            $ex_mansion->elementary_school_district = $request->elementary_school_district;
            $ex_mansion->junior_high_school_name = $request->junior_high_school_name;
            $ex_mansion->junior_high_school_district = $request->junior_high_school_district;
            $ex_mansion->terms_and_conditions = $request->terms_and_conditions;
            $ex_mansion->conditions_of_transactions = $request->conditions_of_transactions;
            $ex_mansion->save();
            if(!empty($request->file('files'))) {
                foreach ($request->file('files') as $index => $e) {
                    $ext = $e['image']->guessExtension();
                    $file_name = "{$request->apartment_name}_{$index}.{$ext}";
                    $e['image']->storeAs('public/mansion_images', $file_name);
                    $images = MansionImage::find($id);
                    $images->path = $file_name;
                    $images->mansion_id = $mansion->id;
                    $images->save();
                }
                $ex_mansion->images = $file_name;
                $ex_mansion->save();
            }
        });
        Session::flash('message', '編集内容を登録しました。');
        return view('admin.land.edit', compact('land'));
    }
}
