<?php

namespace App\Http\Controllers;

use Session;
use App\Models\NewDetachedHouse;
use App\Models\NewDetachedHouseImage;
use App\Http\Requests\NewDetachedHouseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewDetachedHouseController extends Controller
{
    // ユーザー画面
    public function top() {
        return view('user.new_detached_house.top');
    }
    public function search() {
        $real_estates = NewDetachedHouse::all();
        return view('user.new_detached_house.result', compact('real_estates'));
    }
    public function detail() {
        return view('user.detail');
    }

    // 管理者画面
    // 新規登録画面表示
    public function showForm() {
        return view('admin.new_detached_house.sign_up');
    }
    // 新規登録
    public function signUp(NewDetachedHouseSignUpRequest $request) {
        DB::transaction(function() use($request) {
            $post = new NewDetachedHouse;
            $post->name = $request->name;
            $post->price = $request->price;
            $post->tax = $request->tax;
            $post->pref = $request->pref;
            $post->municipalities = $request->municipalities;
            $post->block = $request->block;
            $post->land_area = $request->land_area;
            $post->building_area = $request->building_area;
            $post->balcony_area = $request->balcony_area;
            $post->number_of_rooms = $request->number_of_rooms;
            $post->type_of_room = $request->type_of_room;
            $post->building_coverage_ratio = $request->building_coverage_ratio;
            $post->floor_area_ratio = $request->floor_area_ratio;
            $post->parking_lot = $request->parking_lot;
            $post->year = $request->year;
            $post->month = $request->month;
            $post->day = $request->day;
            $post->station = $request->station;
            $post->walking_distance_station = $request->walking_distance_station;
            $post->building_construction = $request->building_construction;
            $post->land_right = $request->land_right;
            $post->urban_planning = $request->urban_planning;
            $post->land_use_zones = $request->land_use_zones;
            $post->restrictions_by_law = $request->restrictions_by_law;
            $post->land_classification = $request->land_classification;
            $post->terrain = $request->terrain;
            $post->adjacent_road = $request->adjacent_road;
            $post->adjacent_road_width = $request->adjacent_road_width;
            $post->private_road = $request->private_road;
            $post->setback = $request->setback;
            $post->water_supply = $request->water_supply;
            $post->sewage_line = $request->sewage_line;
            $post->gas = $request->gas;
            $post->building_certification_number = $request->building_certification_number;
            $post->other_fee = $request->other_fee;
            $post->status = $request->status;
            $post->delivery_date = $request->delivery_date;
            $post->property_introduction = $request->property_introduction;
            $post->sales_comment = $request->sales_comment;
            $post->elementary_school_name = $request->elementary_school_name;
            $post->elementary_school_district = $request->elementary_school_district;
            $post->junior_high_school_name = $request->junior_high_school_name;
            $post->junior_high_school_district = $request->junior_high_school_district;
            $post->terms_and_conditions = $request->terms_and_conditions;
            $post->conditions_of_transactions = $request->conditions_of_transactions;
            $post->save();
            if(!empty($request->file('files'))) {
                foreach ($request->file('files') as $index => $e) {
                    $ext = $e['image']->guessExtension();
                    $file_name = "{$request->name}_{$index}.{$ext}";
                    $e['image']->storeAs('public/new_detached_house_images', $file_name);
                    $images = new NewDetachedHouseImage;
                    $images->path = $file_name;
                    $images->new_detached_house_id = $post->id;
                    $images->save();
                }
                $post->images = $file_name;
                $post->save();
            }
        });
        $request->session()->regenerateToken();
        Session::flash('message', '登録が完了しました。');
        return redirect('admin.new_detached_house.sign_up')->with('message', '登録が完了しました。');
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
        $mansion = Mansion::find($id);
        $request->session()->regenerateToken();
        Session::flash('message', '編集内容を登録しました。');
        return view('admin.new_detached_house.edit', compact('new_detached_house'));
    }
}
