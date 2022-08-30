<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Recommend;
use App\Models\NewDetachedHouse;
use App\Models\NewDetachedHouseImage;
use App\Models\NewDetachedHouseGroup;
use App\Models\NewDetachedHouseGroupImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\ImageSignUpRequest;
use App\Http\Requests\DetachedHouseSearchRequest;
use App\Http\Requests\NewDetachedHouseRequest;
use App\Http\Requests\NewDetachedHouseSignUpRequest;
use App\Http\Requests\NewDetachedHouseGroupRequest;
use App\Http\Requests\NewDetachedHouseGroupSignUpRequest;

class NewDetachedHouseController extends Controller
{
    // For User
    public function top() {
        return view('user.new_detached_house.top');
    }
    public function search(DetachedHouseSearchRequest $request) {
        $new_detached_houses = NewDetachedHouse::from('new_detached_houses')
                                            ->select('id', 'name', 'pref', 'municipalities', 'price', DB::raw(" '' AS lowest_price"), DB::raw(" '' AS highest_price"), 'land_area', DB::raw(" '' AS lowest_land_area"), DB::raw(" '' AS highest_land_area"),'building_area', DB::raw(" '' AS lowest_building_area"), DB::raw(" '' AS highest_building_area"), 'number_of_rooms', DB::raw(" '' AS lowest_number_of_rooms"), DB::raw(" '' AS highest_number_of_rooms"), 'type_of_room', DB::raw(" '' AS lowest_type_of_room"), DB::raw(" '' AS lowest_type_of_room"), 'station', 'access_method', 'distance_station',  'land_right', 'updated_at')
                                            ->wherePlan($request)
                                            ->whereAddress($request)
                                            ->whereLowestPrice($request)
                                            ->whereHighestPrice($request)
                                            ->whereLowestLandArea($request)
                                            ->whereHighestLandArea($request)
                                            ->whereLowestBuildingArea($request)
                                            ->whereHighestBuildingArea($request)
                                            ->whereStation($request)
                                            ->whereWalkingDistanceStation($request)
                                            ->whereLandRight($request)
                                            ->paginate(10);

        $new_detached_house_groups = NewDetachedHouseGroup::select('id', 'name', 'pref', 'municipalities', DB::raw(" '' AS price"), 'lowest_price', 'highest_price', DB::raw(" '' AS land_area"), 'lowest_land_area', 'highest_land_area', DB::raw(" '' AS building_area"), 'lowest_building_area', 'highest_building_area', DB::raw(" '' AS number_of_rooms"), 'lowest_number_of_rooms', 'highest_number_of_rooms', DB::raw(" '' AS type_of_room"), 'lowest_type_of_room', 'highest_type_of_room', 'station', 'access_method', 'distance_station',  'land_right', 'updated_at')
                                                    ->whereAddress($request)
                                                    ->whereLowestPrice($request)
                                                    ->whereHighestPrice($request)
                                                    ->whereLowestLandArea($request)
                                                    ->whereHighestLandArea($request)
                                                    ->whereLowestBuildingArea($request)
                                                    ->whereHighestBuildingArea($request)
                                                    ->wherePlan($request)
                                                    ->whereStation($request)
                                                    ->whereWalkingDistanceStation($request)
                                                    ->whereLandRight($request)
                                                    ->paginate(5);

        return view('user.new_detached_house.result', compact('new_detached_houses', 'new_detached_house_groups', 'request'));
    }
    public function detail() {
        return view('user.new_detached_house.detail');
    }
    public function sort(Request $request) {

        $new_detached_house = new NewDetachedHouse;
        $column = $new_detached_house->column($request);
        $type = $new_detached_house->sort($request);

        $new_detached_houses = NewDetachedHouse::from('new_detached_houses')
                                            ->select('id', 'name', 'pref', 'municipalities', 'price', DB::raw(" '' AS lowest_price"), DB::raw(" '' AS highest_price"), 'land_area', DB::raw(" '' AS lowest_land_area"), DB::raw(" '' AS highest_land_area"),'building_area', DB::raw(" '' AS lowest_building_area"), DB::raw(" '' AS highest_building_area"), 'number_of_rooms', DB::raw(" '' AS lowest_number_of_rooms"), DB::raw(" '' AS highest_number_of_rooms"), 'type_of_room', DB::raw(" '' AS lowest_type_of_room"), DB::raw(" '' AS lowest_type_of_room"), 'station', 'access_method', 'distance_station', 'land_right', 'updated_at')
                                            ->wherePlan($request)
                                            ->whereAddress($request)
                                            ->whereLowestPrice($request)
                                            ->whereHighestPrice($request)
                                            ->whereLowestLandArea($request)
                                            ->whereHighestLandArea($request)
                                            ->whereLowestBuildingArea($request)
                                            ->whereHighestBuildingArea($request)
                                            ->whereStation($request)
                                            ->whereWalkingDistanceStation($request)
                                            ->whereLandRight($request)
                                            ->orderBy($column, $type)
                                            ->paginate(10);


        $new_detached_house_group = new NewDetachedHouseGroup;
        $column = $new_detached_house_group->column($request);
        $type = $new_detached_house_group->sort($request);

        $new_detached_house_groups = NewDetachedHouseGroup::select('id', 'name', 'pref', 'municipalities', DB::raw(" '' AS price"), 'lowest_price', 'highest_price', DB::raw(" '' AS land_area"), 'lowest_land_area', 'highest_land_area', DB::raw(" '' AS building_area"), 'lowest_building_area', 'highest_building_area', DB::raw(" '' AS number_of_rooms"), 'lowest_number_of_rooms', 'highest_number_of_rooms', DB::raw(" '' AS type_of_room"), 'lowest_type_of_room', 'highest_type_of_room', 'station', 'access_method', 'distance_station',  'land_right', 'updated_at')
                                                    ->whereAddress($request)
                                                    ->whereLowestPrice($request)
                                                    ->whereHighestPrice($request)
                                                    ->whereLowestLandArea($request)
                                                    ->whereHighestLandArea($request)
                                                    ->whereLowestBuildingArea($request)
                                                    ->whereHighestBuildingArea($request)
                                                    ->wherePlan($request)
                                                    ->whereStation($request)
                                                    ->whereWalkingDistanceStation($request)
                                                    ->whereLandRight($request)
                                                    ->orderBy($column, $type)
                                                    ->paginate(5);

        return view('user.new_detached_house.result', compact('new_detached_houses', 'new_detached_house_groups', 'request'));
    }


    // For Admin
    // NewDetachedHouse
    public function showForm() {
        return view('admin.new_detached_house.sign_up');
    }
    public function signUp(NewDetachedHouseSignUpRequest $request) {
        $post = new NewDetachedHouse;
        $post->signUp($request);
        $request->session()->regenerateToken();
        Session::flash('message', '登録が完了しました。');
        return redirect('admin.newDetachedHouse.signUp')->with('message', '登録が完了しました。');
    }
    public function list() {
        $new_detached_houses = NewDetachedHouse::select('id', 'pref', 'municipalities', 'block', 'number_of_rooms', 'type_of_room', 'price', 'land_right', 'land_area', 'building_area', 'station', 'access_method', 'distance_station', )
                            ->paginate(15);

        return view('admin.new_detached_house.list', compact('new_detached_houses'));
    }
    public function adminSearch(DetachedHouseSearchRequest $request) {
        $new_detached_houses = NewDetachedHouse::select('id', 'pref', 'municipalities', 'block', 'number_of_rooms', 'type_of_room', 'price', 'land_right', 'land_area', 'building_area', 'station', 'access_method', 'distance_station', )
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
                                                ->paginate(15);

        return view('admin.new_detached_house.result', compact('new_detached_houses', 'request'));
    }
    // For Recommend
    public function recommendSignUp($id) {
        if(DB::table('recommends')->where('new_detached_house_id', $id)->exists()) {
            $message = 'errorMessage';
            $flash_message = "この物件は既におすすめ登録されています。";
        } else {
            $new_detached_house = NewDetachedHouse::find($id);
            $new_detached_house->recommend($id);
            $message = 'successMessage';
            $flash_message = "おすすめ登録に成功しました。";
        }

        return redirect()->route('admin.newDetachedHouse.list')->with($message, $flash_message);
    }
    public function recommendDelete($id) {
        $recommend_new_detached_house = Recommend::where('new_detached_house_id', $id)->get();

        if(!empty($recommend_new_detached_house)) {
            Recommend::where('new_detached_house_id', $id)->delete();
            $message = 'successMessage';
            $flash_message = "おすすめ登録を削除しました。";
        } else {
            $message = 'errorMessage';
            $flash_message = "削除に失敗しました。";
        }

        return redirect()->route('admin.recommend.list')->with($message, $flash_message);
    }

    // For Image
    public function imageSignUp($id, ImageSignUpRequest $request) {
        $new_detached_house_image = new NewDetachedHouseImage;
        $new_detached_house_image->imageSignUp($id, $request);
        $new_detached_house = NewDetachedHouse::find($id);
        $new_detached_house_images = NewDetachedHouseImage::where('new_detached_house_id', '=', $id)->get();
        $image_counter = 1;
        $request->session()->regenerateToken();
        return view('admin.new_detached_house.edit_image', compact('new_detached_house', 'image_counter', 'new_detached_house_images'))->with('message', '画像登録が完了しました。');
    }
    public function imageDelete($id) {
        $new_detached_house_image = NewDetachedHouseImage::find($id);
        $new_detached_house_id = $new_detached_house_image->new_detached_house_id;

        DB::transaction(function() use($id) {
            $new_detached_house_image = NewDetachedHouseImage::find($id);
            Storage::delete('storage/property_images/new_detached_house/' . $new_detached_house_image->path);
            $new_detached_house_image->delete();
        });

        $new_detached_house = NewDetachedHouse::find($new_detached_house_id);
        $new_detached_house_images = NewDetachedHouseImage::where('new_detached_house_id', '=', $new_detached_house_id)->get();
        $existing_images = NewDetachedHouseImage::where('new_detached_house_id', '=', $new_detached_house_id)->count();

        if(!empty($existing_images)) {
            $image_counter = $existing_images;
        } else if(empty($existing_images)) {
            $image_counter = 1;
        }

        return view('admin.new_detached_house.edit_image', compact('new_detached_house', 'new_detached_house_images', 'image_counter'));
    }
    public function imageUpdate($id, ImageSignUpRequest $request) {
        $new_detached_house_image = NewDetachedHouseImage::find($id);
        $new_detached_house_image->imageUpdate($id, $request);
        $new_detached_house = NewDetachedHouse::find($new_detached_house_image->new_detached_house_id);
        $new_detached_house_images = NewDetachedHouseImage::where('new_detached_house_id', '=', $id)->get();
        $image_counter = 1;
        $request->session()->regenerateToken();

        return view('admin.new_detached_house.edit_image', compact('new_detached_house', 'new_detached_house_images','id', 'image_counter'));
    }
    public function imageEdit($id) {
        $new_detached_house = NewDetachedHouse::find($id);
        $new_detached_house_images = NewDetachedHouseImage::where('new_detached_house_id', '=', $id)->get();
        $image_counter = 1;
        return view('admin.new_detached_house.edit_image', compact('new_detached_house', 'new_detached_house_images', 'image_counter'));
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
    public function update($id, Request $request) {
        $new_detached_house = NewDetachedHouse::find($id);
        $new_detached_house ->updateNewDetachedHouse($id, $request);
        $request->session()->regenerateToken();

        return redirect()->route('admin.newDetachedHouse.edit', ['id' => $new_detached_house->id])->with('message', '変更内容を登録しました。');
    }
    // CSV Download
    public function csvDownload() {
        $new_detached_houses = NewDetachedHouse::get();
        $today = Carbon::today()->format('Ymd');
        $file_name = $today . '_new_detached_house_list.csv';
        $item_name = [
            'ID', '物件名', '販売価格', '税金', '都道府県', '市区町村', '番町番地', '部屋数', '間取り', '土地面積', '建物面積', 'バルコニー', 'バルコニー面積', '建ぺい率', '容積率', '駐車場', '築年', '築月', '築日', '最寄り駅', '最寄り駅までのアクセス方法', '最寄り駅までの所要時間', '建物構造', '土地権利', 'その他の費用', '都市計画区域', '用途地域', '法令上の制限', '地目', '地勢', '接道', '接道幅', '私道', 'セットバック', 'セットバック幅', '上水道', '下水道', 'ガス', '建築確認番号', '現況', '引き渡し日', '小学校', '小学校までの徒歩距離', '中学校', '中学校までの徒歩距離', '設備条件', '取引態様', '物件紹介コメント', 'セールスコメント', '作成日', '更新日',
        ];
        return $new_detached_houses->exportCsv($file_name, $item_name);
    }

    public function filteringCsvDownload(Request $request) {
        $new_detached_houses = NewDetachedHouse::wherePlan($request)
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
                                                ->get();
        $today = Carbon::today()->format('Ymd');
        $file_name = $today . '_new_detached_house_filter.csv';
        $item_name = [
            'ID', '物件名', '販売価格', '税金', '都道府県', '市区町村', '番町番地', '部屋数', '間取り', '土地面積', '建物面積', 'バルコニー', 'バルコニー面積', '建ぺい率', '容積率', '駐車場', '築年', '築月', '築日', '最寄り駅', '最寄り駅までのアクセス方法', '最寄り駅までの所要時間', '建物構造', '土地権利', 'その他の費用', '都市計画区域', '用途地域', '法令上の制限', '地目', '地勢', '接道', '接道幅', '私道', 'セットバック', 'セットバック幅', '上水道', '下水道', 'ガス', '建築確認番号', '現況', '引き渡し日', '小学校', '小学校までの徒歩距離', '中学校', '中学校までの徒歩距離', '設備条件', '取引態様', '物件紹介コメント', 'セールスコメント', '作成日', '更新日',
        ];
        return $new_detached_houses->exportCsv($file_name, $item_name);
    }



    // NewDetachedHouseGroup
    public function showFormGroup() {
        return view('admin.new_detached_house_group.sign_up');
    }
    public function signUpGroup(NewDetachedHouseGroupSignUpRequest $request) {
        $post = new NewDetachedHouseGroup;
        $post->signUp($request);
        $request->session()->regenerateToken();
        Session::flash('message', '登録が完了しました。');

        return redirect('admin.newDetachedHouseGroup.signUp')->with('message', '登録が完了しました。');
    }
    public function groupList() {
        $new_detached_house_groups = NewDetachedHouseGroup::select('id', 'pref', 'municipalities', 'block', 'lowest_number_of_rooms', 'lowest_type_of_room', 'highest_number_of_rooms',  'highest_type_of_room', 'lowest_price', 'highest_price', 'lowest_land_area', 'highest_land_area', 'lowest_building_area', 'highest_building_area', 'land_right', 'station', 'access_method', 'distance_station')
                                                        ->paginate(15);

        return view('admin.new_detached_house_group.list', compact('new_detached_house_groups'));
    }
    public function recommendGroupSignUp($id) {
        if(DB::table('recommends')->where('new_detached_house_group_id', $id)->exists()) {
            $message = 'errorMessage';
            $flash_message = "この物件は既におすすめ登録されています。";
        } else {
            $new_detached_house_group = NewDetachedHouseGroup::find($id);
            $new_detached_house_group->recommend($id);
            $message = 'successMessage';
            $flash_message = "おすすめ登録に成功しました。";
        }

        return redirect()->route('admin.newDetachedHouseGroup.list')->with($message, $flash_message);
    }
    public function recommendGroupDelete($id) {
        $recommend_new_detached_house_group = Recommend::where('new_detached_house_group_id', $id)->get();

        if(!empty($recommend_new_detached_house_group)) {
            Recommend::where('new_detached_house_group_id', $id)->delete();
            $message = 'successMessage';
            $flash_message = "おすすめ登録を削除しました。";
        } else {
            $message = 'errorMessage';
            $flash_message = "削除に失敗しました。";
        }

        return redirect()->route('admin.recommend.list')->with($message, $flash_message);
    }
    public function groupDelete($id) {
        DB::transaction(function() use($id) {
            $target = NewDetachedHouseGroup::find($id);
            $target->delete();
        });
    }
    public function adminGroupSearch(DetachedHouseSearchRequest $request) {
        $new_detached_house_groups = NewDetachedHouseGroup::select('id', 'pref', 'municipalities', 'block', 'lowest_number_of_rooms', 'lowest_type_of_room', 'highest_number_of_rooms',  'highest_type_of_room', 'lowest_price', 'highest_price', 'lowest_land_area', 'highest_land_area', 'lowest_building_area', 'highest_building_area', 'land_right', 'station', 'access_method', 'distance_station')
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
                                                ->paginate(15);

        $request->session()->regenerateToken();

        return view('admin.new_detached_house_group.result', compact('new_detached_house_groups', 'request'));
    }
    public function showDetailGroup($id) {
        $new_detached_house_group = NewDetachedHouseGroup::find($id);
        return view('admin.new_detached_house_group.detail', compact('new_detached_house_group'));
    }
    public function groupEdit($id) {
        $new_detached_house_group = NewDetachedHouseGroup::find($id);
        return view('admin.new_detached_house_group.edit', compact('new_detached_house_group'));
    }
    public function groupUpdate($id, NewDetachedHouseGroupSignUpRequest $request) {
        $new_detached_house_group = NewDetachedHouseGroup::find($id);
        $new_detached_house_group->updateNewDetachedHouseGroup($id, $request);
        $request->session()->regenerateToken();

        return redirect()->route('admin.newDetachedHouseGroup.edit', ['id' => $new_detached_house_group->id])->with('message', '変更内容を登録しました。');
    }

      // For Image
    public function groupImageSignUp($id, ImageSignUpRequest $request) {
        $new_detached_house_group_image = new NewDetachedHouseGroupImage;
        $new_detached_house_group_image->imageSignUp($id, $request);
        $new_detached_house_group = NewDetachedHouseGroup::find($id);
        $new_detached_house_group_images = NewDetachedHouseGroupImage::where('new_detached_house_group_id', '=', $id)->get();
        $image_counter = 1;
        $request->session()->regenerateToken();

        return view('admin.new_detached_house_group.edit_image', compact('new_detached_house_group', 'image_counter', 'new_detached_house_group_images'))->with('message', '画像登録が完了しました。');
    }
    public function groupImageDelete($id) {
        $new_detached_house_group_image = NewDetachedHouseGroupImage::find($id);
        $new_detached_house_group_id = $new_detached_house_group_image->new_detached_house_group_id;

        DB::transaction(function() use($id) {
            $new_detached_house_group_image = NewDetachedHouseGroupImage::find($id);
            Storage::delete('storage/property_images/new_detached_house_group/' . $new_detached_house_group_image->path);
            $new_detached_house_group_image->delete();
        });

        $new_detached_house_group = NewDetachedHouseGroup::find($new_detached_house_group_id);
        $new_detached_house_group_images = NewDetachedHouseGroupImage::where('new_detached_house_group_id', '=', $new_detached_house_group_id)->get();
        $existing_images = NewDetachedHouseGroupImage::where('new_detached_house_group_id', '=', $new_detached_house_group_id)->count();

        if(!empty($existing_images)) {
            $image_counter = $existing_images;
        } else if(empty($existing_images)) {
            $image_counter = 1;
        }

        return view('admin.new_detached_house_group.edit_image', compact('new_detached_house_group', 'new_detached_house_group_images', 'image_counter'));
    }
    public function groupImageUpdate($id, ImageSignUpRequest $request) {
        $new_detached_house_group_image = NewDetachedHouseGroupImage::find($id);
        $new_detached_house_group_image->imageUpdate($id, $request);
        $new_detached_house_group = NewDetachedHouseGroup::find($new_detached_house_group_image->new_detached_house_group_id);
        $new_detached_house_group_images = NewDetachedHouseGroupImage::where('new_detached_house_group_id', '=', $id)->get();
        $image_counter = 1;
        $request->session()->regenerateToken();

        return view('admin.new_detached_house_group.edit_image', compact('new_detached_house_group', 'new_detached_house_group_images','id', 'image_counter'));
    }
    public function groupImageEdit($id) {
        $new_detached_house_group = NewDetachedHouseGroup::find($id);
        $new_detached_house_group_images = NewDetachedHouseGroupImage::where('new_detached_house_g_id', '=', $id)->get();
        $image_counter = 1;
        return view('admin.new_detached_house_group.edit_image', compact('new_detached_house_group', 'new_detached_house_group_images', 'image_counter'));
    }

        // CSV Download
        public function groupCsvDownload() {
            $new_detached_house_groups = NewDetachedHouseGroup::get();
            $today = Carbon::today()->format('Ymd');
            $file_name = $today . '_new_detached_house_group_list.csv';
            $item_name = [
                'ID', '物件名', '最低価格', '最高価格', '税金', '都道府県', '市区町村', '番町番地', '最低部屋数', '最高部屋数', '最低間取り', '最高間取り', '最低土地面積', '最高土地面積', '最低建物面積', '最高建物面積', 'バルコニー', '最低バルコニー面積', '最高バルコニー面積', '最低建ぺい率', '最高建ぺい率', '最低容積率', '最高容積率', '最低駐車場', '' '築年', '築月', '築日', '最寄り駅', '最寄り駅までのアクセス方法', '最寄り駅までの所要時間', '建物構造', '土地権利', 'その他の費用', '都市計画区域', '用途地域', '法令上の制限', '地目', '地勢', '接道', '接道幅', '私道', 'セットバック', 'セットバック幅', '上水道', '下水道', 'ガス', '建築確認番号', '現況', '引き渡し日', '小学校', '小学校までの徒歩距離', '中学校', '中学校までの徒歩距離', '設備条件', '取引態様', '物件紹介コメント', 'セールスコメント', '作成日', '更新日',
            ];
            return $new_detached_house_groups->exportCsv($file_name, $item_name);
        }

        public function groupFilteringCsvDownload(Request $request) {
            $new_detached_house_groups = NewDetachedHouseGroup::wherePlan($request)
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
                                                                ->get();
            $today = Carbon::today()->format('Ymd');
            $file_name = $today . '_new_detached_house_group_filter.csv';
            $item_name = [
                'ID', '物件名', '販売価格', '税金', '都道府県', '市区町村', '番町番地', '部屋数', '間取り', '土地面積', '建物面積', 'バルコニー', 'バルコニー面積', '建ぺい率', '容積率', '駐車場', '築年', '築月', '築日', '最寄り駅', '最寄り駅までのアクセス方法', '最寄り駅までの所要時間', '建物構造', '土地権利', 'その他の費用', '都市計画区域', '用途地域', '法令上の制限', '地目', '地勢', '接道', '接道幅', '私道', 'セットバック', 'セットバック幅', '上水道', '下水道', 'ガス', '建築確認番号', '現況', '引き渡し日', '小学校', '小学校までの徒歩距離', '中学校', '中学校までの徒歩距離', '設備条件', '取引態様', '物件紹介コメント', 'セールスコメント', '作成日', '更新日',
            ];
            return $new_detached_house_groups->exportCsv($file_name, $item_name);
        }
}
