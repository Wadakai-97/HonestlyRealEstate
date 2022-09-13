<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mansion;
use App\Models\MansionImage;
use App\Models\MansionAccess;
use App\Models\Recommend;
use App\Http\Requests\ImageSignUpRequest;
use App\Http\Requests\MansionSearchRequest;
use App\Http\Requests\MansionSignUpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MansionController extends Controller
{
    // For User
    public function top() {
        $tokyo = Mansion::where('pref', '=', '東京都')->count();
        $kanagawa = Mansion::where('pref', '=', '神奈川県')->count();
        return view('user.mansion.top', compact('tokyo', 'kanagawa'));
    }
    //神奈川県
    public function kanagawa() {
        $yoko01 = Mansion::where('municipalities', 'LIKE', '横浜市鶴見区%')->count();
        $yoko02 = Mansion::where('municipalities', 'LIKE', '横浜市神奈川区%')->count();
        $yoko03 = Mansion::where('municipalities', 'LIKE', '横浜市西区%')->count();
        $yoko04 = Mansion::where('municipalities', 'LIKE', '横浜市中区%')->count();
        $yoko05 = Mansion::where('municipalities', 'LIKE', '横浜市南区%')->count();
        $yoko06 = Mansion::where('municipalities', 'LIKE', '横浜市保土ケ谷区%')->count();
        $yoko07 = Mansion::where('municipalities', 'LIKE', '横浜市磯子区%')->count();
        $yoko08 = Mansion::where('municipalities', 'LIKE', '横浜市金沢区%')->count();
        $yoko09 = Mansion::where('municipalities', 'LIKE', '横浜市港北区%')->count();
        $yoko10 = Mansion::where('municipalities', 'LIKE', '横浜市戸塚区%')->count();
        $yoko11 = Mansion::where('municipalities', 'LIKE', '横浜市港南区%')->count();
        $yoko12 = Mansion::where('municipalities', 'LIKE', '横浜市旭区%')->count();
        $yoko13 = Mansion::where('municipalities', 'LIKE', '横浜市緑区%')->count();
        $yoko14 = Mansion::where('municipalities', 'LIKE', '横浜市瀬谷区%')->count();
        $yoko15 = Mansion::where('municipalities', 'LIKE', '横浜市栄区%')->count();
        $yoko16 = Mansion::where('municipalities', 'LIKE', '横浜市泉区%')->count();
        $yoko17 = Mansion::where('municipalities', 'LIKE', '横浜市青葉区%')->count();
        $yoko18 = Mansion::where('municipalities', 'LIKE', '横浜市都筑区%')->count();
        $kawa01 = Mansion::where('municipalities', 'LIKE', '川崎市川崎区%')->count();
        $kawa02 = Mansion::where('municipalities', 'LIKE', '川崎市幸区%')->count();
        $kawa03 = Mansion::where('municipalities', 'LIKE', '川崎市中原区%')->count();
        $kawa04 = Mansion::where('municipalities', 'LIKE', '川崎市高津区%')->count();
        $kawa05 = Mansion::where('municipalities', 'LIKE', '川崎市多摩区%')->count();
        $kawa06 = Mansion::where('municipalities', 'LIKE', '川崎市宮前区%')->count();
        $kawa07 = Mansion::where('municipalities', 'LIKE', '川崎市麻生区%')->count();
        $saga01 = Mansion::where('municipalities', 'LIKE', '相模原市緑区%')->count();
        $saga02 = Mansion::where('municipalities', 'LIKE', '相模原市中央区%')->count();
        $saga03 = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $yokosuka = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $hiratsuka = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $kamakura = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $fujisawa = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $odawara = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $chigasaki = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $zushi = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $miura = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $hadano = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $atsugi = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $yamato = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $isehara = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $ebina = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $zama = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $minami_ashigara = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $ayase = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $hayama = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $kouza = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $naka = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $ashigara_kami = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $aikou = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        $ashigara_shimo = Mansion::where('municipalities', 'LIKE', '相模原市南区%')->count();
        return view('user.mansion.kanagawa.top', compact('yoko01', 'yoko02','yoko03','yoko04','yoko05','yoko06','yoko07','yoko08','yoko09','yoko10','yoko11','yoko12','yoko13','yoko14','yoko15','yoko16','yoko17', 'yoko18', 'kawa01','kawa02','kawa03','kawa04','kawa05','kawa06','kawa07','saga01','saga02','saga03','yokosuka','hiratsuka','kamakura','fujisawa','odawara','chigasaki','zushi','miura','hadano','atsugi','yamato','isehara','ebina','zama','minami_ashigara','ayase','hayama','kouza','','','','',));
    }
    public function kanagawaSearch(MansionSearchRequest $request) {
        $mansions = Mansion::select('id', 'apartment_name', 'pref', 'municipalities', 'price', 'occupation_area', 'number_of_rooms', 'type_of_room', 'floor', 'story', 'year', 'station', 'access_method', 'distance_station', 'updated_at')
                            ->where('pref', '=', '神奈川県')
                            ->wherePlan($request)
                            ->whereAddress($request)
                            ->whereLowestPrice($request)
                            ->whereHighestPrice($request)
                            ->whereLowestOccupationArea($request)
                            ->whereHighestOccupationArea($request)
                            ->whereOld($request)
                            ->whereStation($request)
                            ->whereWalkingDistanceStation($request)
                            ->paginate(15);

        $today = Carbon::today()->year;
        return view('user.mansion.kanagawa.result', compact('today', 'mansions', 'request'));
    }
    public function kanagawaSort(Request $request) {
        $mansion = new Mansion;
        $column = $mansion->column($request);
        $type = $mansion->sort($request);

        $mansions = Mansion::select('id', 'apartment_name', 'pref', 'municipalities', 'price', 'occupation_area', 'number_of_rooms', 'type_of_room', 'floor', 'story', 'year', 'station', 'access_method', 'distance_station', 'updated_at')
                            ->where('pref', '=', '神奈川県')
                            ->wherePlan($request)
                            ->whereAddress($request)
                            ->whereLowestPrice($request)
                            ->whereHighestPrice($request)
                            ->whereLowestOccupationArea($request)
                            ->whereHighestOccupationArea($request)
                            ->whereOld($request)
                            ->whereStation($request)
                            ->whereWalkingDistanceStation($request)
                            ->orderBy($column, $type)
                            ->paginate(15);

        $today = Carbon::today()->year;
        return view('user.mansion.kanagawa.result', compact('today', 'mansions', 'request'));
    }
    public function kanagawaDetail($id) {
        $mansion = Mansion::find($id);
        $today = Carbon::today();
        $rollover_date = $today->addDays(14);

        return view('user.mansion.kanagawa.detail', compact('mansion', 'today', 'rollover_date'));
    }
    //東京都
    public function tokyo() {
        return view('user.mansion.tokyo.top');
    }
    public function tokyoSearch(MansionSearchRequest $request) {
        $mansions = Mansion::select('id', 'apartment_name', 'pref', 'municipalities', 'price', 'occupation_area', 'number_of_rooms', 'type_of_room', 'floor', 'story', 'year', 'station', 'access_method', 'distance_station', 'updated_at')
                            ->where('pref', '=', '東京都')
                            ->wherePlan($request)
                            ->whereAddress($request)
                            ->whereLowestPrice($request)
                            ->whereHighestPrice($request)
                            ->whereLowestOccupationArea($request)
                            ->whereHighestOccupationArea($request)
                            ->whereOld($request)
                            ->whereStation($request)
                            ->whereWalkingDistanceStation($request)
                            ->paginate(15);

        $today = Carbon::today()->year;
        return view('user.mansion.tokyo.result', compact('today', 'mansions', 'request'));
    }
    public function tokyoSort(Request $request) {
        $mansion = new Mansion;
        $column = $mansion->column($request);
        $type = $mansion->sort($request);

        $mansions = Mansion::select('id', 'apartment_name', 'pref', 'municipalities', 'price', 'occupation_area', 'number_of_rooms', 'type_of_room', 'floor', 'story', 'year', 'station', 'access_method', 'distance_station', 'updated_at')
                            ->where('pref', '=', '東京都')
                            ->wherePlan($request)
                            ->whereAddress($request)
                            ->whereLowestPrice($request)
                            ->whereHighestPrice($request)
                            ->whereLowestOccupationArea($request)
                            ->whereHighestOccupationArea($request)
                            ->whereOld($request)
                            ->whereStation($request)
                            ->whereWalkingDistanceStation($request)
                            ->orderBy($column, $type)
                            ->paginate(15);

        $today = Carbon::today()->year;
        return view('user.mansion.tokyo.result', compact('today', 'mansions', 'request'));
    }
    public function tokoyoDetail($id) {
        $mansion = Mansion::find($id);
        $today = Carbon::today();
        $rollover_date = $today->addDays(14);

        return view('user.mansion.tokyo.detail', compact('mansion', 'today', 'rollover_date'));
    }


    // For Admin
    // View
    public function showForm() {
        return view('admin.mansion.sign_up');
    }
    public function list() {
        $mansions = Mansion::select('id', 'apartment_name', 'room', 'number_of_rooms', 'type_of_room', 'occupation_area', 'price', 'pref', 'municipalities', 'station', 'access_method', 'distance_station', 'year')
                            ->paginate(15);
        return view('admin.mansion.list', compact('mansions'));
    }
    public function edit($id) {
        $mansion = Mansion::find($id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        return view('admin.mansion.edit', compact('mansion', 'mansion_images'));
    }

    // SignUP
    public function signUp(MansionSignUpRequest $request) {
        $mansion = new Mansion;
        $mansion->mansionSignUp($request);
        $request->session()->regenerateToken();

        return redirect()->route('admin.mansion.form')->with('message', '登録が完了しました。');
    }

    public function imageSignUp($id, ImageSignUpRequest $request) {
        $mansion_image = new MansionImage;
        $mansion_image->imageSignUp($id, $request);
        $mansion = Mansion::find($id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        $image_counter = 1;
        $request->session()->regenerateToken();

        return view('admin.mansion.edit_image', compact('mansion', 'image_counter', 'mansion_images'))->with('message', '画像登録が完了しました。');
    }
    public function imageDelete($id) {
        $mansion_image = MansionImage::find($id);
        $mansion_id = $mansion_image->mansion_id;

        DB::transaction(function() use($id) {
            $mansion_image = MansionImage::find($id);
            Storage::delete('storage/property_images/mansion/' . $mansion_image->path);
            $mansion_image->delete();
        });

        $mansion = Mansion::find($mansion_id);
        $mansion_images = MansionImage::where('mansion_id', '=', $mansion_id)->get();
        $existing_images = MansionImage::where('mansion_id', '=', $mansion_id)->count();

        if(!empty($existing_images)) {
            $image_counter = $existing_images;
        } else if(empty($existing_images)) {
            $image_counter = 1;
        }

        return view('admin.mansion.edit_image', compact('mansion', 'mansion_images', 'image_counter'));
    }
    public function imageEdit($id) {
        $mansion = Mansion::find($id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        $image_counter = 1;
        return view('admin.mansion.edit_image', compact('mansion', 'mansion_images', 'image_counter'));
    }
    public function imageUpdate($id, Request $request) {
        $mansion_image = MansionImage::find($id);
        $mansion_image->imageUpdate($id, $request);
        $mansion = Mansion::find($mansion_image->mansion_id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        $image_counter = 1;
        $request->session()->regenerateToken();

        return view('admin.mansion.edit_image', compact('mansion', 'mansion_images','id', 'image_counter'));
    }

    // Search
    public function adminSearch(MansionSearchRequest $request) {
        $mansions = Mansion::select('id', 'pref', 'municipalities',  'apartment_name', 'room', 'price', 'occupation_area', 'number_of_rooms', 'type_of_room', 'year', 'station', 'access_method', 'distance_station')
                            ->wherePlan($request)
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
                            ->paginate(15);

        return view('admin.mansion.result', compact('mansions', 'request'));
    }
    // Delete
    public function delete($id) {
        DB::transaction(function() use($id) {
            $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
            if(!empty($mansion_images)) {
                foreach ($mansion_images as $mansion_image) {
                    if(!empty($mansion_image->path)) {
                        Storage::delete('storage/property_images/mansion/' . $mansion_image->path);
                        $mansion_image->delete();
                    }
                }
            }
            $mansion = Mansion::find($id);
            $mansion->delete();
        });
        return redirect()->route('admin.recommend.list')->with('message', 'お気に入り登録を削除しました。');
    }

    // Detail
    public function showDetail($id) {
        $mansion = Mansion::find($id);
        $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
        return view('admin.mansion.detail', compact('mansion', 'mansion_images'));
    }
    // Update
    public function update($id, Request $request) {
        $mansion = Mansion::find($id);
        $mansion->updateMansion($id, $request);
        $request->session()->regenerateToken();

        return redirect()->route('admin.mansion.edit', ['id' => $mansion->id])->with('message', '変更内容を登録しました。');
    }
    // Recommend
    public function recommendSignUp($id) {
        if(DB::table('recommends')->where('mansion_id', $id)->exists()) {
            $message = 'errorMessage';
            $flash_message = "この物件は既におすすめ登録されています。";
        } else {
            $mansion = Mansion::find($id);
            $mansion->recommend($id);
            $message = 'successMessage';
            $flash_message = "おすすめ登録に成功しました。";
        }

        return redirect()->route('admin.mansion.list')->with($message, $flash_message);
    }
    public function recommendDelete($id) {
        $recommend_mansion = Recommend::where('mansion_id', $id)->get();

        if(!empty($recommend_mansion)) {
            Recommend::where('mansion_id', $id)->delete();
            $message = 'successMessage';
            $flash_message = "おすすめ登録を削除しました。";
        } else {
            $message = 'errorMessage';
            $flash_message = "削除に失敗しました。";
        }

        return redirect()->route('admin.recommend.list')->with($message, $flash_message);
    }
    // CSV Download
    public function csvDownload() {
        $mansions = Mansion::get();
        $today = Carbon::today()->format('Ymd');
        $file_name = $today . '_mansion_list.csv';
        $item_name = [
            'ID', '建物名', '部屋番号', '販売価格', '税金', '都道府県', '市区町村', '番町番地', '土地面積', '建物面積', '部屋数', '間取り', '測定方法', '専有面積', 'バルコニー', 'バルコニー面積', '駐車場', '階数', '建物構造', '築年', '築月', '築日', '方角', '最寄り駅', '最寄り駅までのアクセス方法', '最寄り駅までの所要時間', '建物構造', '総戸数', '土地権利', '用途地域', '管理会社', '管理形態', '管理費', '修繕積立金', 'その他の費用', '現況', '引渡し日', '小学校', '小学校までの徒歩距離', '中学校', '中学校までの徒歩距離', '設備条件', '取引態様', '物件紹介コメント', 'セールスコメント', '作成日', '更新日',
        ];
        return $mansions->exportCsv($file_name, $item_name);
    }

    public function filteringCsvDownload(Request $request) {
        $mansions = Mansion::wherePlan($request)
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
        $file_name = $today . '_mansion_filter.csv';
        $item_name = [
            'ID', '建物名', '部屋番号', '販売価格', '税金', '都道府県', '市区町村', '番町番地', '土地面積', '建物面積', '部屋数', '間取り', '測定方法', '専有面積', 'バルコニー', 'バルコニー面積', '駐車場', '階数', '建物構造', '築年', '築月', '築日', '方角', '最寄り駅', '最寄り駅までのアクセス方法', '最寄り駅までの所要時間', '建物構造', '総戸数', '土地権利', '用途地域', '管理会社', '管理形態', '管理費', '修繕積立金', 'その他の費用', '現況', '引渡し日', '小学校', '小学校までの徒歩距離', '中学校', '中学校までの徒歩距離', '設備条件', '取引態様', '物件紹介コメント', 'セールスコメント', '作成日', '更新日',
        ];
        return $mansions->exportCsv($file_name, $item_name);
    }
}
