<?php

namespace App\Http\Controllers;

use App\Models\Land;
use App\Models\LandImage;
use App\Models\Recommend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ImageSignUpRequest;
use App\Http\Requests\LandSearchRequest;
use App\Http\Requests\LandSignUpRequest;

class LandController extends Controller
{
    // For User
    public function top() {
        return view('user.land.top');
    }
    public function search(LandSearchRequest $request) {
        $lands = Land::select('id', 'name', 'pref', 'municipalities', 'block', 'price', 'land_area', 'building_coverage_ratio', 'floor_area_ratio', 'land_right', 'construction_conditions', 'station', 'access_method', 'distance_station', 'updated_at')
                    ->wherePref($request)
                    ->whereAddress($request)
                    ->whereLowestPrice($request)
                    ->whereHighestPrice($request)
                    ->whereLowestLandArea($request)
                    ->whereHighestLandArea($request)
                    ->whereConstructionConditions($request)
                    ->whereStation($request)
                    ->whereWalkingDistanceStation($request)
                    ->whereLandRight($request)
                    ->paginate(15);

        return view('user.land.result', compact('lands', 'request'));
    }
    public function sort(request $request) {
        $land = new Land;
        $column = $land->column($request);
        $type = $land->sort($request);

        $lands = Land::select('id', 'name', 'pref', 'municipalities', 'block', 'price', 'land_area', 'building_coverage_ratio', 'floor_area_ratio', 'land_right', 'construction_conditions', 'station', 'access_method', 'distance_station', 'updated_at')
                    ->wherePref($request)
                    ->whereAddress($request)
                    ->whereLowestPrice($request)
                    ->whereHighestPrice($request)
                    ->whereLowestLandArea($request)
                    ->whereHighestLandArea($request)
                    ->whereConstructionConditions($request)
                    ->whereStation($request)
                    ->whereWalkingDistanceStation($request)
                    ->whereLandRight($request)
                    ->orderBy($column, $type)
                    ->paginate(15);

        return view('user.land.result', compact('lands', 'request'));
    }

    public function detail() {
        return view('user.land.detail');
    }


    // For Admin
    // SignUp
    public function showForm() {
        return view('admin.land.sign_up');
    }
    public function signUp(LandSignUpRequest $request) {
        $land = new Land;
        $land->signUp($request);
        $request->session()->regenerateToken();

        return redirect()->route('admin.land.signUp')->with('message', '登録が完了しました。');
    }

    // Image
    public function imageSignUp($id, ImageSignUpRequest $request) {
        $land_image = new LandImage;
        $land_image->imageSignUp($id, $request);
        $land = Land::find($id);
        $land_images = LandImage::where('land_id', '=', $id)->get();
        $image_counter = 1;
        $request->session()->regenerateToken();

        return view('admin.land.edit_image', compact('land', 'image_counter', 'land_images'))->with('message', '画像登録が完了しました。');
    }
    public function imageDelete($id) {
        $land_image = LandImage::find($id);
        $land_id = $land_image->land_id;

        DB::transaction(function() use($id) {
            $land_image = LandImage::find($id);
            Storage::delete('storage/property_images/land/' . $land_image->path);
            $land_image->delete();
        });

        $land = Land::find($land_id);
        $land_images = LandImage::where('land_id', '=', $land_id)->get();
        $existing_images = LandImage::where('land_id', '=', $land_id)->count();

        if(!empty($existing_images)) {
            $image_counter = $existing_images;
        } else if(empty($existing_images)) {
            $image_counter = 1;
        }

        return view('admin.land.edit_image', compact('land', 'land_images', 'image_counter'));
    }
    public function imageUpdate($id, ImageSignUpRequest $request) {
        $land_image = LandImage::find($id);
        $land_image->imageUpdate($id, $request);
        $land = Land::find($land_image->land_id);
        $land_images = LandImage::where('land_id', '=', $id)->get();
        $image_counter = 1;
        $request->session()->regenerateToken();

        return view('admin.land.edit_image', compact('land', 'land_images','id', 'image_counter'));
    }
    public function imageEdit($id) {
        $land = Land::find($id);
        $land_images = LandImage::where('land_id', '=', $id)->get();
        $image_counter = 1;
        return view('admin.land.edit_image', compact('land', 'land_images', 'image_counter'));
    }

    // List
    public function list() {
        $lands = Land::select('id', 'land_area', 'land_right', 'price', 'pref', 'municipalities', 'block', 'construction_conditions', 'station', 'access_method', 'distance_station', )
                    ->paginate(15);

        return view('admin.land.list', compact('lands'));
    }
    public function adminSearch(LansSearchRequest $request) {
        $lands = Land::select('id', 'land_area', 'land_right', 'price', 'pref', 'municipalities', 'block', 'construction_conditions', 'station', 'access_method', 'distance_station', )
                    ->whereAddress($request)
                    ->whereLandRight($request)
                    ->whereLowestPrice($request)
                    ->whereHighestPrice($request)
                    ->whereLowestLandArea($request)
                    ->whereHighestLandArea($request)
                    ->whereConstructionConditions($request)
                    ->whereStation($request)
                    ->whereAccessMethod($request)
                    ->whereDistanceStation($request)
                    ->paginate(15);

        return view('admin.land.result', compact('lands', 'request'));
    }

    // Recommend
    public function recommendSignUp($id) {
        if(DB::table('recommends')->where('land_id', $id)->exists()) {
            $message = 'errorMessage';
            $flash_message = "この物件は既におすすめ登録されています。";
        } else {
            $land = Land::find($id);
            $land->recommend($id);
            $message = 'successMessage';
            $flash_message = "おすすめ登録に成功しました。";
        }

        return redirect()->route('admin.land.list')->with($message, $flash_message);
    }
    public function recommendDelete($id) {
        $recommend_land = Recommend::where('land_id', $id)->get();

        if(!empty($recommend_land)) {
            Recommend::where('land_id', $id)->delete();
            $message = 'successMessage';
            $flash_message = "おすすめ登録を削除しました。";
        } else {
            $message = 'errorMessage';
            $flash_message = "削除に失敗しました。";
        }

        return redirect()->route('admin.recommend.list')->with($message, $flash_message);
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
        $request->session()->regenerateToken();
        Session::flash('message', '編集内容を登録しました。');

        return view('admin.land.edit', compact('land'));
    }

    // CSV Download
    public function csvDownload() {
        $lands = Land::get();
        $today = Carbon::today()->format('Ymd');
        $file_name = $today . '_land_list.csv';
        $item_name = [
            'ID', '土地名', '販売価格', '税金', '都道府県', '市区町村', '番町番地', '建築条件', '土地面積', '建ぺい率', '容積率', '最寄り駅', '最寄り駅までのアクセス方法', '最寄り駅までのアクセス時間', '土地権利', 'その他の費用', '都市計画', '用途地域', '法令上の制限', '国土法' '取引態様', '物件紹介コメント', 'セールスコメント', '作成日', '更新日',
        ];
        return $lands->exportCsv($file_name, $item_name);
    }

    public function filteringCsvDownload(Request $request) {
        $lands = Land::wherePlan($request)
                            ->whereAddress($request)
                            ->whereApartmentName($request)
                            ->whereLowestPrice($request)
                            ->whereHighestPrice($request)
                            ->whereLowestOccupationArea($request)
                            ->whereHighestOccupationArea($request)
                            ->whereOld($request)
                            ->whereStation($request)
                            ->whereAccessMethod($request)
                            ->whereDistanceStation($request)
                            ->get();
        $today = Carbon::today()->format('Ymd');
        $file_name = $today . '_land_filter.csv';
        $item_name = [
            'ID', '建物名', '部屋番号', '販売価格', '税金', '都道府県', '市区町村', '番町番地', '土地面積', '建物面積', '部屋数', '間取り', '測定方法', '専有面積', 'バルコニー', 'バルコニー面積', '駐車場', '階数', '建物構造', '築年', '築月', '築日', '方角', '最寄り駅', '最寄り駅までのアクセス方法', '最寄り駅までの距離', '建物構造', '総戸数', '土地権利', '用途地域', '管理会社', '管理形態', '管理費', '修繕積立金', 'その他の費用', '現況', '引渡し日', '小学校', '小学校までの徒歩距離', '中学校', '中学校までの徒歩距離', '設備条件', '取引態様', '物件紹介コメント', 'セールスコメント', '作成日', '更新日',
        ];
        return $lands->exportCsv($file_name, $item_name);
    }
}
