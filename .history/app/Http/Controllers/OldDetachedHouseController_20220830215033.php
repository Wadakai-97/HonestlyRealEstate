<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Recommend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\OldDetachedHouse;
use App\Models\OldDetachedHouseImage;
use App\Http\Requests\ImageSignUpRequest;
use App\Http\Requests\DetachedHouseSearchRequest;
use App\Http\Requests\OldDetachedHouseSignUpRequest;

class OldDetachedHouseController extends Controller
{
    // For User
    public function top() {
        return view('user.old_detached_house.top');
    }
    public function search(DetachedHouseSearchRequest $request) {
        $old_detached_houses = OldDetachedHouse::select('id', 'name', 'price', 'pref', 'municipalities', 'land_area', 'building_area', 'number_of_rooms', 'type_of_room', 'year', 'land_right', 'station', 'access_method', 'distance_station', 'updated_at')
                                                ->wherePlan($request)
                                                ->wherePref($request)
                                                ->whereMunicipalities($request)
                                                ->whereLowestPrice($request)
                                                ->whereHighestPrice($request)
                                                ->whereLowestLandArea($request)
                                                ->whereHighestLandArea($request)
                                                ->whereLowestBuildingArea($request)
                                                ->whereHighestBuildingArea($request)
                                                ->whereOld($request)
                                                ->whereStation($request)
                                                ->whereWalkingDistanceStation($request)
                                                ->whereLandRight($request)
                                                ->paginate(15);

        $today = Carbon::today()->year;
        return view('user.old_detached_house.result', compact('old_detached_houses', 'request', 'today'));
    }
    public function detail() {
        return view('user.old_detached_house.detail');
    }
    public function sort(Request $request) {
        $old_detached_house = new OldDetachedHouse;
        $column = $old_detached_house->column($request);
        $type = $old_detached_house->sort($request);

        $old_detached_houses = OldDetachedHouse::select('id', 'name', 'price', 'pref', 'municipalities', 'land_area', 'building_area', 'number_of_rooms', 'type_of_room', 'year', 'land_right', 'station', 'access_method', 'distance_station', 'updated_at')
                                                ->wherePlan($request)
                                                ->wherePref($request)
                                                ->whereMunicipalities($request)
                                                ->whereLowestPrice($request)
                                                ->whereHighestPrice($request)
                                                ->whereLowestLandArea($request)
                                                ->whereHighestLandArea($request)
                                                ->whereLowestBuildingArea($request)
                                                ->whereHighestBuildingArea($request)
                                                ->whereOld($request)
                                                ->whereStation($request)
                                                ->whereWalkingDistanceStation($request)
                                                ->whereLandRight($request)
                                                ->orderBy($column, $type)
                                                ->paginate(15);

        $today = Carbon::today()->year;
        return view('user.old_detached_house.result', compact('old_detached_houses', 'request', 'today'));
    }

    // For Admin
    public function showForm() {
        return view('admin.old_detached_house.sign_up');
    }
    public function signUp(OldDetachedHouseSignUpRequest $request) {
        $post = new OldDetachedHouse;
        $post->signUp($request);
        $request->session()->regenerateToken();

        return redirect('admin.oldDetachedHouse.sign_up')->with('message', '登録が完了しました。');
    }

    // Image
    public function imageSignUp($id, ImageSignUpRequest $request) {
        $old_detached_house_image = new OldDetachedHouseImage;
        $old_detached_house_image->imageSignUp($id, $request);
        $old_detached_house = OldDetachedHouse::find($id);
        $old_detached_house_images = OldDetachedHouseImage::where('old_detached_house_id', '=', $id)->get();
        $image_counter = 1;
        $request->session()->regenerateToken();

        return view('admin.old_detached_house.edit_image', compact('old_detached_house', 'image_counter', 'old_detached_house_images'))->with('message', '画像登録が完了しました。');
    }
    public function imageDelete($id) {
        $old_detached_house_image = OldDetachedHouseImage::find($id);
        $old_detached_house_id = $old_detached_house_image->old_detached_house_id;

        DB::transaction(function() use($id) {
            $old_detached_house_image = OldDetachedHouseImage::find($id);
            Storage::delete('storage/property_images/old_detached_house/' . $old_detached_house_image->path);
            $old_detached_house_image->delete();
        });

        $old_detached_house = OldDetachedHouse::find($old_detached_house_id);
        $old_detached_house_images = OldDetachedHouseImage::where('old_detached_house_id', '=', $old_detached_house_id)->get();
        $existing_images = OldDetachedHouseImage::where('old_detached_house_id', '=', $old_detached_house_id)->count();

        if(!empty($existing_images)) {
            $image_counter = $existing_images;
        } else if(empty($existing_images)) {
            $image_counter = 1;
        }

        return view('admin.old_detached_house.edit_image', compact('old_detached_house', 'old_detached_house_images', 'image_counter'));
    }
    public function imageUpdate($id, ImageSignUpRequest $request) {
        $old_detached_house_image = OldDetachedHouseImage::find($id);
        $old_detached_house_image->imageUpdate($id, $request);
        $old_detached_house = OldDetachedHouse::find($old_detached_house_image->old_detached_house_id);
        $old_detached_house_images = OldDetachedHouseImage::where('old_detached_house_id', '=', $id)->get();
        $image_counter = 1;
        $request->session()->regenerateToken();

        return view('admin.old_detached_house.edit_image', compact('old_detached_house', 'old_detached_house_images','id', 'image_counter'));
    }
    public function imageEdit($id) {
        $old_detached_house = OldDetachedHouse::find($id);
        $old_detached_house_images = OldDetachedHouseImage::where('old_detached_house_id', '=', $id)->get();
        $image_counter = 1;
        return view('admin.old_detached_house.edit_image', compact('old_detached_house', 'old_detached_house_images', 'image_counter'));
    }


    public function list() {
        $old_detached_houses = OldDetachedHouse::select('id', 'pref', 'municipalities', 'block', 'number_of_rooms', 'type_of_room', 'price', 'land_right', 'year', 'land_area', 'building_area', 'station', 'access_method', 'distance_station')
                                            ->paginate(15);

        return view('admin.old_detached_house.list', compact('old_detached_houses'));
    }

    // Recommend
    public function recommendSignUp($id) {
        if(DB::table('recommends')->where('new_detached_house_id', $id)->exists()) {
            $message = 'errorMessage';
            $flash_message = "この物件は既におすすめ登録されています。";
        } else {
            $old_detached_house = OldDetachedHouse::find($id);
            $old_detached_house->recommend($id);
            $message = 'successMessage';
            $flash_message = "おすすめ登録に成功しました。";
        }

        return redirect()->route('admin.oldDetachedHouse.list')->with($message, $flash_message);
    }
    public function recommendDelete($id) {
        $recommend_old_detached_house = Recommend::where('old_detached_house_id', $id)->get();

        if(!empty($recommend_old_detached_house)) {
            Recommend::where('old_detached_house_id', $id)->delete();
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
            $target = OldDetachedHouse::find($id);
            $target->delete();
        });
    }
    public function adminSearch(DetachedHouseSearchRequest $request) {
        $old_detached_houses = OldDetachedHouse::select('id', 'pref', 'municipalities', 'block', 'number_of_rooms', 'type_of_room', 'price', 'land_right', 'year', 'land_area', 'building_area', 'station', 'access_method', 'distance_station')
                                                ->wherePlan($request)
                                                ->whereAddress($request)
                                                ->whereLowestPrice($request)
                                                ->whereHighestPrice($request)
                                                ->whereLandRight($request)
                                                ->whereLowestLandArea($request)
                                                ->whereHighestLandArea($request)
                                                ->whereLowestBuildingArea($request)
                                                ->whereHighestBuildingArea($request)
                                                ->whereStation($request)
                                                ->whereAccessMethod($request)
                                                ->whereDistanceStation($request)
                                                ->whereOld($request)
                                                ->paginate(15);

        return view('admin.old_detached_house.result', compact('old_detached_houses', 'request'));
    }
    public function showDetail($id) {
        $old_detached_house = OldDetachedHouse::find($id);
        return view('admin.old_detached_house.detail', compact('old_detached_house'));
    }
    public function edit($id) {
        $old_detached_house = OldDetachedHouse::find($id);
        return view('admin.old_detached_house.edit', compact('old_detached_house'));
    }
    public function update($id, OldDetachedHouseSignUpRequest $request) {
        $old_detached_house = OldDetachedHouse::find($id);
        $old_detached_house->updateOldDetachedHouse($id, $request);
        $request->session()->regenerateToken();

        return redirect()->route('admin.oldDetachedHouse.edit', ['id' => $old_detached_house->id])->with('message', '変更内容を登録しました。');
    }

    // CSV Download
    public function csvDownload() {
        $old_detached_houses = OldDetachedHouse::get();
        $today = Carbon::today()->format('Ymd');
        $file_name = $today . '_old_detached_house_list.csv';
        $item_name = [
            'ID', '建物名', '部屋番号', '販売価格', '税金', '都道府県', '市区町村', '番町番地', '土地面積', '建物面積', '部屋数', '間取り', '測定方法', '専有面積', 'バルコニー', 'バルコニー面積', '駐車場', '階数', '建物構造', '築年', '築月', '築日', '方角', '最寄り駅', '最寄り駅までのアクセス方法', '最寄り駅までの距離', '建物構造', '総戸数', '土地権利', '用途地域', '管理会社', '管理形態', '管理費', '修繕積立金', 'その他の費用', '現況', '引渡し日', '小学校', '小学校までの徒歩距離', '中学校', '中学校までの徒歩距離', '設備条件', '取引態様', '物件紹介コメント', 'セールスコメント', '作成日', '更新日',
        ];
        return $old_detached_houses->exportCsv($file_name, $item_name);
    }

    public function filteringCsvDownload(Request $request) {
        $old_detached_houses = OldDetachedHouse::wherePlan($request)
        ->wherePlan($request)
        ->whereAddress($request)
        ->whereLowestPrice($request)
        ->whereHighestPrice($request)
        ->whereLandRight($request)
        ->whereLowestLandArea($request)
        ->whereHighestLandArea($request)
        ->whereLowestBuildingArea($request)
        ->whereHighestBuildingArea($request)
        ->whereStation($request)
        ->whereAccessMethod($request)
        ->whereDistanceStation($request)
        ->whereOld($request)
                            ->get();
        $today = Carbon::today()->format('Ymd');
        $file_name = $today . '_old_detached_house_filter.csv';
        $item_name = [
            'ID', '建物名', '部屋番号', '販売価格', '税金', '都道府県', '市区町村', '番町番地', '土地面積', '建物面積', '部屋数', '間取り', '測定方法', '専有面積', 'バルコニー', 'バルコニー面積', '駐車場', '階数', '建物構造', '築年', '築月', '築日', '方角', '最寄り駅', '最寄り駅までのアクセス方法', '最寄り駅までの距離', '建物構造', '総戸数', '土地権利', '用途地域', '管理会社', '管理形態', '管理費', '修繕積立金', 'その他の費用', '現況', '引渡し日', '小学校', '小学校までの徒歩距離', '中学校', '中学校までの徒歩距離', '設備条件', '取引態様', '物件紹介コメント', 'セールスコメント', '作成日', '更新日',
        ];
        return $old_detached_houses->exportCsv($file_name, $item_name);
    }
}
