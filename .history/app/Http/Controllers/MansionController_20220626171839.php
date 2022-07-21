<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use App\Models\Mansion;
use App\Models\MansionImage;
use App\Http\Requests\MansionSearchRequest;
use App\Http\Requests\MansionSignUpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MansionController extends Controller
{
    // ユーザー画面

    // TOPページ
    public function top() {
        return view('user.mansion.top');
    }
    // 検索
    public function search(MansionSearchRequest $request) {
        // 入力値取得
        $pref = $request->pref;
        $lowest_price = $request->lowest_price;
        $highest_price = $request->highest_price;
        $lowest_occupation_area = $request->lowest_occupation_area;
        $highest_occupation_area = $request->highest_occupation_area;
        $plan = $request->plan;
        $old = $request->old;
        $walk = $request->walk;

        $query = Mansion::query();

        if(!empty($pref)) {
            $query = $query->Where(function ($query) use($pref) {
                for ($i = 0; $i < count($pref); $i++){
                    $query->orwhere('pref', '=',  $pref[$i]);
                }
            });
        }
        if(!empty($lowest_price)) {
            $query = $query->where('price', '>', $lowest_price);
        }
        if(!empty($highest_price)) {
            $query = $query->where('price', '<', $highest_price);
        }
        if(!empty($lowest_occupation_area)) {
            $query = $query->where('occupation_area', '>=', $lowest_occupation_area);
        }
        if(!empty($highest_occupation_area)) {
            $query = $query->where('occupation_area', '<', $highest_occupation_area);
        }

        if(!empty($plan)) {
            $query = $query->Where(function ($query) use($plan) {
                for ($i = 0; $i < count($plan); $i++){
                        $query->orwhere('number_of_rooms', '=', $plan[$i]);
                }
            });
        }

        if(!empty($old)) {
            $date = Carbon::today()->subYear($old);
            $query = $query->whereDate('year', '>', $date);
        }
        if(!empty($walk)) {
            $query = $query->where('walking_distance_station', '<', $walk);
        }

        $mansions = $query->paginate(15);

        return view('user.mansion.result', compact('mansions'));
    }

    // 物件詳細
    public function detail($id) {
        $mansion = Mansion::find($id);
        $date = new Carbon();
        $next_updated_at = $date->addDays(14);
        
        $updated_at = date('Y/m/d', strtotime($mansion->updated_at));
        return view('user.mansion.detail', compact('mansion', 'next_updated_at'));
    }


    // 管理者画面

    // 新規登録画面の表示
    public function showForm() {
        return view('admin.mansion.sign_up');
    }
    // 新規登録
    public function signUp(MansionSignUpRequest $request) {
        DB::transaction(function() use($request) {
            $post = new Mansion;
            $post->apartment_name = $request->apartment_name;
            $post->room = $request->room;
            $post->price = $request->price;
            $post->tax = $request->tax;
            $post->pref = $request->pref;
            $post->municipalities = $request->municipalities;
            $post->block = $request->block;
            $post->land_area = $request->land_area;
            $post->building_area = $request->building_area;
            $post->number_of_rooms = $request->number_of_rooms;
            $post->type_of_room = $request->type_of_room;
            $post->measuring_method = $request->measuring_method;
            $post->occupation_area = $request->occupation_area;
            $post->balcony_area = $request->balcony_area;
            $post->parking_lot = $request->parking_lot;
            $post->floor = $request->floor;
            $post->story = $request->story;
            $post->year = $request->year;
            $post->month = $request->month;
            $post->day = $request->day;
            $post->direction = $request->direction;
            $post->station = $request->station;
            $post->walking_distance_station = $request->walking_distance_station;
            $post->building_construction = $request->building_construction;
            $post->total_number_of_households = $request->total_number_of_households;
            $post->land_right = $request->land_right;
            $post->land_use_zones = $request->land_use_zones;
            $post->management_company = $request->management_company;
            $post->management_system = $request->management_system;
            $post->maintenance_fee = $request->maintenance_fee;
            $post->reserve_fund_for_repair = $request->reserve_fund_for_repair;
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
                    $file_name = "{$request->apartment_name}_{$index}.{$ext}";
                    // $path = $e['image']->storeAs('public/mansion_images', $file_name);
                    $e['image']->storeAs('public/mansion_images', $file_name);
                    $images = new MansionImage;
                    $images->path = $file_name;
                    $images->mansion_id = $post->id;
                    $images->save();
                }
                $post->images = $file_name;
                $post->save();
            }
        });
        return redirect()->route('admin.mansion.signUp')->with('message', '登録が完了しました。');
    }
    public function list() {
        return view('admin.mansion.list');
    }
    public function delete($id) {
        DB::transaction(function() use($id) {
            $target = Mansion::find($id);
            $target->delete();
        });
    }
    public function showDetail($id) {
        $mansion = Mansion::find($id);
        return view('admin.mansion.detail', compact('mansion'));
    }
    public function edit($id) {
        $mansion = Mansion::find($id);
        return view('admin.mansion.edit', compact('mansion'));
    }
    public function save($id, Request $request) {
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
        return view('admin.mansion.edit', compact('mansion'));
    }
}
