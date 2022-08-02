<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mansion;
use App\Models\MansionImage;
use App\Http\Requests\MansionSearchRequest;
use App\Http\Requests\MansionSignUpRequest;
use App\Http\Requests\MansionImageSignUpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MansionController extends Controller
{
    // For User
    public function top() {
        return view('user.mansion.top');
    }
    public function search(Request $request) {
        $pref = $request->pref;
        $municipalities = $request->municipalities ?? '';
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
                            ->whereMunicipalities($municipalities)
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
        $request->session()->regenerateToken();
        return view('user.mansion.result', compact('today', 'mansions', 'request'));
    }
    public function detail($id) {
        $mansion = Mansion::find($id);
        $today = Carbon::today();
        $rollover_date = $today->addDays(14);


        // 類似物件の紹介
        $id = $this->id;
        $ip_addresses = $this->accesses->pluck('ip');

        // IPがアクセスした他の商品を取得 ・・・ ①
        $products = \App\ProductAccess::whereIn('ip', $ip_addresses)
            ->where('product_id', '!=', $id)
            ->get();

        // おすすめ商品のデータ加工 ・・・ ②
        $access_counts = $products
            ->groupBy('product_id')    // 商品でグループ化
            ->map(function($products){ // データ件数を返す

                return $products->count();

            })
            ->filter(function($product_count){ // データ件数が３以上のものだけにする

                return ($product_count >= 3);

            })
            ->sortDesc();

        // おすすめデータを全削除して新規登録 ・・・ ③
        $this->recommendations()->delete();

        foreach($access_counts as $product_id => $access_count) {

            $recommendation = new \App\ProductRecommendation;
            $recommendation->original_product_id = $id;
            $recommendation->product_id = $product_id;
            $recommendation->access_count = $access_count;
            $recommendation->save();

        }

        // おすすめ商品を更新した日時を変更 ・・・ ④
        $this->recommendation_updated_at = now();
        $this->save();

       return view('user.mansion.detail', compact('mansion', 'today', 'rollover_date'));
    }


    // For Admin
    // View
    public function showForm() {
        return view('admin.mansion.sign_up');
    }
    public function list() {
        return view('admin.mansion.list');
    }
    public function edit($id) {
        $mansion = Mansion::find($id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        return view('admin.mansion.edit', compact('mansion', 'mansion_images'));
    }
    public function imageEdit($id) {
        $mansion = Mansion::find($id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        $existing_images = MansionImage::where('mansion_id', '=', $id)->count();
        if(!empty($existing_images)) {
            $image_counter = $existing_images;
        } else if(empty($existing_images)) {
            $image_counter = 1;
        }
        return view('admin.mansion.edit_image', compact('mansion', 'mansion_images', 'image_counter'));
    }

    // SignUP
    public function signUp(MansionSignUpRequest $request) {
        $mansion = new Mansion;
        $mansion->mansionSignUp($request);
        $request->session()->regenerateToken();
        return redirect()->route('admin.mansion.form')->with('message', '登録が完了しました。');
    }
    public function imageSignUp($id, MansionImageSignUpRequest $request) {
        $mansion_image = new MansionImage;
        $mansion_image->imageSignUp($id, $request);
        $mansion = Mansion::find($id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        $existing_images = MansionImage::where('mansion_id', '=', $id)->count();
        if(!empty($existing_images)) {
            $image_counter = $existing_images;
        } else if(empty($existing_images)) {
            $image_counter = 1;
        }
        $request->session()->regenerateToken();
        return view('admin.mansion.edit_image', compact('mansion', 'image_counter', 'mansion_images'))->with('message', '画像登録が完了しました。');
    }
    //Search
    public function adminSearch(Request $request) {
        $pref = $request->pref;
        $municipalities = $request->municipalities ?? '';
        $apartment_name = $request->apartment_name ?? '';
        $lowest_price = $request->lowest_price;
        $highest_price = $request->highest_price;
        $lowest_occupation_area = $request->lowest_occupation_area;
        $highest_occupation_area = $request->highest_occupation_area;
        $plan = $request->plan;
        $type_of_room = $request->type_of_room;
        $old = $request->old;
        $station = $request->station;
        $walking_distance_station = $request->walking_distance_station;

        $mansions = Mansion::select('id', 'pref', 'municipaliteis',  'apartment_name', 'price', 'occupation_area', 'number_of_rooms', 'type_of_room', 'year', 'station', 'walking_distance_station')
                            ->wherePref($pref)
                            ->whereMunicipalities($municipalities)
                            ->whereApartmentName($apartment_name)
                            ->whereLowestPrice($lowest_price)
                            ->whereHighestPrice($highest_price)
                            ->whereLowestOccupationArea($lowest_occupation_area)
                            ->whereHighestOccupationArea($highest_occupation_area)
                            ->wherePlan($plan)
                            ->whereTypeOfRoom($type_of_room)
                            ->whereOld($old)
                            ->whereStation($station)
                            ->whereWalkingDistanceStation($walking_distance_station)
                            ->paginate(15);

        $request->session()->regenerateToken();

        return view('admin.mansion.result', compact('mansions', 'request'));
    }
    // For Delete
    public function delete($id) {
        DB::transaction(function() use($id) {
            $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
            if(!empty($mansion_images)) {
                foreach ($mansion_images as $mansion_image) {
                    Storage::delete('mansion_images/' . $mansion_image->path);
                    $mansion_image->delete();
                }
            }
            $mansion = Mansion::find($id);
            $mansion->delete();
        });
    }
    public function imageDelete($id) {
        DB::transaction(function() use($id) {
            $mansion_image = MansionImage::find($id);
            Storage::delete('mansion_images/' . $mansion_image->path);
            $mansion_image->delete();
        });
    }

    // For Detail
    public function showDetail($id) {
        $mansion = Mansion::find($id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        return view('admin.mansion.detail', compact('mansion', 'mansion_images'));
    }
    // For Update
    public function update($id, Request $request) {
        $mansion = Mansion::find($id);
        $mansion->updateMansion($id, $request);
        $request->session()->regenerateToken();
        return redirect()->route('admin.mansion.edit', ['id' => $mansion->id])->with('message', '変更内容を登録しました。');
    }
    public function imageUpdate($id, Request $request) {
        $mansion_image = MansionImage::find($id);
        $mansion_image->imageUpdate($id, $request);
        $mansion = Mansion::find($mansion_image->mansion_id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        $existing_images = MansionImage::where('mansion_id', '=', $id)->count();
        if(!empty($existing_images)) {
            $image_counter = $existing_images;
        } else if(empty($existing_images)) {
            $image_counter = 1;
        }
        $request->session()->regenerateToken();
        // return view('admin.mansion.edit_image', compact('mansion', 'image_counter', 'mansion_images', 'id'))->with('message', '変更内容を登録しました。');
        return redirect()->route('admin.mansionImage.edit', compact('mansion', 'mansion_images', 'image_counter', 'id'))->with('message', '変更内容を登録しました。');
    }
    // For Recommend
    public function recommend($id) {
        $mansion = Mansion::find($id);
        $mansion->recommend($id);
        return redirect()->route('admin.mansion.list')->with('message', 'お気に入り登録が完了しました。');
    }
    // For CSV Download
    public function csvDownload() {
        $mansions = Mansion::get();
        return $mansions->exportCsv();
    }
}
