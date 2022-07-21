<?php

namespace App\Http\Controllers;

use Session;
use App\Models\NewDetachedHouse;
use App\Models\NewDetachedHouseImage;
use App\Models\NewDetachedHouseGroup;
use App\Models\NewDetachedHouseGroupImage;
use App\Http\Requests\NewDetachedHouseRequest;
use App\Http\Requests\NewDetachedHouseSignUpRequest;
use App\Http\Requests\NewDetachedHouseGroupRequest;
use App\Http\Requests\NewDetachedHouseGroupSignUpRequest;
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
    // 新築戸建
    public function showForm() {
        return view('admin.new_detached_house.sign_up');
    }
    public function signUp(NewDetachedHouseSignUpRequest $request) {
        $post = new NewDetachedHouse;
        $post->signUp($request);
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
    public function save($id, Request $request) {
        $new_detached_house = NewDetachedHouse::find($id);
        $new_detached_house ->update($id, $request);
        $request->session()->regenerateToken();
        Session::flash('message', '編集内容を登録しました。');
        return view('admin.new_detached_house.edit', compact('new_detached_house'));
    }

    // 新築分譲住宅
    public function showFormGroup() {
        return view('admin.new_detached_house_group.sign_up');
    }
    public function signUpGroup(NewDetachedHouseGroupSignUpRequest $request) {
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
    public function groupUpdate($id, Request $request) {
        DB::transaction(function() use($id, $request) {
            $ex_new_detached_house_group = NewDetachedHouseGroup::find($id);
            $ex_new_detached_house_group->name = $request->name;
            $ex_new_detached_house_group->lowest_price = $request->lowest_price;
            $ex_new_detached_house_group->highest_price = $request->highest_price;
            $ex_new_detached_house_group->tax = $request->tax;
            $ex_new_detached_house_group->pref = $request->pref;
            $ex_new_detached_house_group->municipalities = $request->municipalities;
            $ex_new_detached_house_group->block = $request->block;
            $ex_new_detached_house_group->lowest_land_area = $request->lowest_land_area;
            $ex_new_detached_house_group->highest_land_area = $request->highest_land_area;
            $ex_new_detached_house_group->lowest_building_area = $request->lowest_building_area;
            $ex_new_detached_house_group->highest_building_area = $request->highest_building_area;
            $ex_new_detached_house_group->lowest_balcony_area = $request->lowest_balcony_area;
            $ex_new_detached_house_group->highest_balcony_area = $request->highest_balcony_area;
            $ex_new_detached_house_group->lowest_number_of_rooms = $request->lowest_number_of_rooms;
            $ex_new_detached_house_group->highest_number_of_rooms = $request->highest_number_of_rooms;
            $ex_new_detached_house_group->lowest_type_of_room = $request->lowest_type_of_room;
            $ex_new_detached_house_group->highest_type_of_room = $request->highest_type_of_room;
            $ex_new_detached_house_group->lowest_building_coverage_ratio = $request->lowest_building_coverage_ratio;
            $ex_new_detached_house_group->highest_building_coverage_ratio = $request->highest_building_coverage_ratio;
            $ex_new_detached_house_group->lowest_floor_area_ratio = $request->lowest_floor_area_ratio;
            $ex_new_detached_house_group->highest_floor_area_ratio = $request->highest_floor_area_ratio;
            $ex_new_detached_house_group->lowest_parking_lot = $request->lowest_parking_lot;
            $ex_new_detached_house_group->highest_parking_lot = $request->highest_parking_lot;
            $ex_new_detached_house_group->year = $request->year;
            $ex_new_detached_house_group->month = $request->month;
            $ex_new_detached_house_group->day = $request->day;
            $ex_new_detached_house_group->station = $request->station;
            $ex_new_detached_house_group->walking_distance_station = $request->walking_distance_station;
            $ex_new_detached_house_group->building_construction = $request->building_construction;
            $ex_new_detached_house_group->land_right = $request->land_right;
            $ex_new_detached_house_group->urban_planning = $request->urban_planning;
            $ex_new_detached_house_group->land_use_zones = $request->land_use_zones;
            $ex_new_detached_house_group->restrictions_by_law = $request->restrictions_by_law;
            $ex_new_detached_house_group->land_classification = $request->land_classification;
            $ex_new_detached_house_group->terrain = $request->terrain;
            $ex_new_detached_house_group->adjacent_road = $request->adjacent_road;
            $ex_new_detached_house_group->adjacent_road_width = $request->adjacent_road_width;
            $ex_new_detached_house_group->private_road = $request->private_road;
            $ex_new_detached_house_group->setback = $request->setback;
            $ex_new_detached_house_group->water_supply = $request->water_supply;
            $ex_new_detached_house_group->sewage_line = $request->sewage_line;
            $ex_new_detached_house_group->gas = $request->gas;
            $ex_new_detached_house_group->building_certification_number = $request->building_certification_number;
            $ex_new_detached_house_group->other_fee = $request->other_fee;
            $ex_new_detached_house_group->status = $request->status;
            $ex_new_detached_house_group->delivery_date = $request->delivery_date;
            $ex_new_detached_house_group->property_introduction = $request->property_introduction;
            $ex_new_detached_house_group->sales_comment = $request->sales_comment;
            $ex_new_detached_house_group->elementary_school_name = $request->elementary_school_name;
            $ex_new_detached_house_group->elementary_school_district = $request->elementary_school_district;
            $ex_new_detached_house_group->junior_high_school_name = $request->junior_high_school_name;
            $ex_new_detached_house_group->junior_high_school_district = $request->junior_high_school_district;
            $ex_new_detached_house_group->terms_and_conditions = $request->terms_and_conditions;
            $ex_new_detached_house_group->conditions_of_transactions = $request->conditions_of_transactions;
            $ex_new_detached_house_group->save();
            if(!empty($request->file('files'))) {
                foreach ($request->file('files') as $index => $e) {
                    $ext = $e['image']->guessExtension();
                    $file_name = "{$request->apartment_name}_{$index}.{$ext}";
                    $e['image']->storeAs('public/new_detached_house_images', $file_name);
                    $images = NewDetachedHouseImage::find($id);
                    $images->path = $file_name;
                    $images->new_detached_house_id = $new_detached_house->id;
                    $images->save();
                }
                $ex_new_detached_house_group->images = $file_name;
                $ex_new_detached_house_group->save();
            }
        });
        $new_detached_house_group = NewDetachedHouseGroup::find($id);
        $request->session()->regenerateToken();
        Session::flash('message', '編集内容を登録しました。');
        return view('admin.new_detached_house_group.edit', compact('new_detached_house_group'));
    }
}
