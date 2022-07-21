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
        return view('user.mansion.detail', compact('mansion', 'next_updated_at'));
    }


    // 管理者画面

    // 新規登録画面の表示
    public function showForm() {
        return view('admin.mansion.sign_up');
    }
    // 新規登録
    public function signUp(MansionSignUpRequest $request) {
        $post = new Mansion;
        $post->signUp($request);
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
            $mansion = Mansion::find($id);
            $mansion->apartment_name = $request->apartment_name;
            $mansion->room = $request->room;
            $mansion->price = $request->price;
            $mansion->tax = $request->tax;
            $mansion->pref = $request->pref;
            $mansion->municipalities = $request->municipalities;
            $mansion->block = $request->block;
            $mansion->land_area = $request->land_area;
            $mansion->building_area = $request->building_area;
            $mansion->number_of_rooms = $request->number_of_rooms;
            $mansion->type_of_room = $request->type_of_room;
            $mansion->measuring_method = $request->measuring_method;
            $mansion->occupation_area = $request->occupation_area;
            $mansion->balcony_area = $request->balcony_area;
            $mansion->parking_lot = $request->parking_lot;
            $mansion->floor = $request->floor;
            $mansion->story = $request->story;
            $mansion->year = $request->year;
            $mansion->month = $request->month;
            $mansion->day = $request->day;
            $mansion->direction = $request->direction;
            $mansion->station = $request->station;
            $mansion->walking_distance_station = $request->walking_distance_station;
            $mansion->building_construction = $request->building_construction;
            $mansion->total_number_of_households = $request->total_number_of_households;
            $mansion->land_right = $request->land_right;
            $mansion->land_use_zones = $request->land_use_zones;
            $mansion->management_company = $request->management_company;
            $mansion->management_system = $request->management_system;
            $mansion->maintenance_fee = $request->maintenance_fee;
            $mansion->reserve_fund_for_repair = $request->reserve_fund_for_repair;
            $mansion->other_fee = $request->other_fee;
            $mansion->status = $request->status;
            $mansion->delivery_date = $request->delivery_date;
            $mansion->property_introduction = $request->property_introduction;
            $mansion->sales_comment = $request->sales_comment;
            $mansion->elementary_school_name = $request->elementary_school_name;
            $mansion->elementary_school_district = $request->elementary_school_district;
            $mansion->junior_high_school_name = $request->junior_high_school_name;
            $mansion->junior_high_school_district = $request->junior_high_school_district;
            $mansion->terms_and_conditions = $request->terms_and_conditions;
            $mansion->conditions_of_transactions = $request->conditions_of_transactions;
            $mansion->save();
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
                $mansion->images = $file_name;
                $mansion->save();
            }
        });
        $mansion = Mansion::find($id);
        $request->session()->regenerateToken();
        Session::flash('message', '編集内容を登録しました。');
        return view('admin.mansion.edit', compact('mansion'));
    }
}
