@extends('layouts.user')
@section('title', '詳細画面')
@section('body')
<a href="{{ route('hre') }}">TOPページ</a> > <a href="{{ route('buy') }}">買いたい</a> > <a href="{{ route('mansion') }}">マンション</a> > <a href="">検索結果</a><br>

<h1 class="mansion_name">【{{ $mansion->apartment_name }}】販売価格:{{ $mansion->price }}万円</h1>
    <table>
        <thead>
            <th colsp>物件概要</th>
        </thead>
        <tbody>
            <tr>
                <th>所在地</th>
                    <td>{{ $mansion->pref }}{{ $mansion->city }}{{ $mansion->ward }}{{ $mansion->town }}{{ $mansion->chome }}</td>
                <th>専有面積</th>
                    <td>{{ $mansion->measuring_method }}{{ $mansion->occupation_area }}㎡</td>
                <th>間取り</th>
                    <td>{{ $mansion->number_of_rooms }}{{ $mansion->type_of_room }}</td>
            </tr>
            <tr>
                <th>交通</th>
                    <td>{{ $mansion->station }}</td>
                <th>駅徒歩</th>
                    <td>{{ $mansion->walking_distance_station }}分</td>
                <th>用途地域</th>
                    <td>{{ $mansion->land_use_zones }}</td>
            </tr>
            <tr>
                <th>管理費</th>
                    <td>{{ $mansion->maintenance_fee }}円</td>
                <th>修繕積立金</th>
                    <td>{{ $mansion->reserve_fund_for_repair }}円</td>
                <th>その他費用</th>
                    <td>{{ $mansion->other_fee }}</td>
            </tr>
            <tr>
                <th>所在階</th>
                    <td>{{ $mansion->floor }}階</td>
                <th>築年月</th>
                    <td>{{ $mansion->year }}/{{ $mansion->month }}/{{ $mansion->day }}</td>
                <th>バルコニー面積</th>
                    <td>{{ $mansion->balcony_area }}㎡</td></tr>
        </tbody>
    </table>

<h3>物件の特徴</h3>
    <p>{{ $mansion->property_introduction }}</p>

<h3>建物概要</h3>
    <table>
        <colgroup>
            <col style="width: 20%;">
            <col style="width: 30%;">
            <col style="width: 20%;">
            <col style="width: 30%;">
        </colgroup>
        <tbody>
            <tr>
                <th>採光</th>
                    <td>{{ $mansion->direction }}</td>
                <th>取引態様</th>
                    <td>{{ $mansion->conditions_of_transactions }}</td>
                </tr>
            <tr>
                <th>現況</th>
                    <td>{{ $mansion->status }}</td>
                <th>入居時期</th>
                    <td>{{ $mansion->delivery_date }}</td>
            </tr>
            <tr>
                <th>総戸数</th>
                    <td>{{ $mansion->total_number_of_households }}戸</td>
                <th>建物構造</th>
                    <td>{{ $mansion->building_construction }}</td>
            </tr>
            <tr>
                <th>土地権利</th>
                    <td>{{ $mansion->land_right }}</td>
                <th>駐車場</th>
                    <td>{{ $mansion->parking_lot }}</td>
            </tr>
            <tr>
                <th>管理会社</th>
                    <td>{{ $mansion->management_company }}</td>
                <th>管理形態</th>
                    <td>{{ $mansion->management_system }}</td>
            </tr>
            <tr>
                <th>用途地域</th>
                    <td>{{ $mansion->land_use_zones }}</td>
                <th>取引態様</th>
                    <td>{{ $mansion->conditions_of_transactions }}</td>
            </tr>
            <tr>
                <th>更新日</th>
                    <td>{{ date('Y/m/d', strtotime($mansion->updated_at)) }}</td>
                <th>次回更新日</th>
                    <td>{{ date('Y/m/d', strtotime($next_updated_at)) }}</td>
            </tr>
        </tbody>
    </table>

<h3>セールスポイント</h3>
<p  class="documents">{{ $mansion->sales_comment }}</p>

<h3>学区情報</h3>
    <table>
        <colgroup>
            <col style="width: 15%;">
            <col style="width: 35%;">
            <col style="width: 15%;">
            <col style="width: 35%;">
        </colgroup>
        <tbody>
            <tr>
                <th>小学校</th>
                    <td>{{ $mansion->elementary_school_name }}</td>
                <th>通学距離(分)</th>
                    <td>{{ $mansion->elementary_school_district }}分</td>
            </tr>
            <tr>
                <th>中学校</th>
                    <td>{{ $mansion->junior_high_school_name }}</td>
                <th>通学距離(分)</th>
                    <td>{{ $mansion->junior_high_school_district }}分</td>
            </tr>
        </tbody>
    </table>

<a href="tel:0000000000"><button>電話をかける(000-000-0000)</button></a><br>

<h3>
    <div id="map"></div>
</h3>

<h3>この物件のお支払いをシミュレーションしてみる</h3>
<form class="loan_payment_simulation">
    <table>
        <tbody>
            <colgroup>
                <col style="width: 30%;">
                <col style="width: 70%;">
            </colgroup>
            <tr>
                <th>物件価格</th>
                <td><input type="hidden" id="price" value="{{ $mansion->price }}">{{ $mansion->price }}万円（{{ $mansion->tax }}）</td>
            </tr>
            <tr>
                <th>金利</th>
                <td>
                    <label><input type="radio" value="0.475" id="annual_interest">変動金利：0.475%</label>
                    <label><input type="radio" value="1.35" id="annual_interest">固定金利：1.35%</label>
                    <input type="radio" id="annual_interest"><input id="annual_interest" type="text" value="">%
                </td>
            </tr>
            <tr>
                <th>借入期間</th>
                <td>
                    <label><input type="radio" name="borrowing_period" value="35" id="borrowing_period" onclick="interestText()">35年</label>
                    <label><input type="radio" name="borrowing_period" value="30" id="borrowing_period" onclick="interestText()">30年</label>
                    <label><input type="radio" value="25" id="borrowing_period" onclick="interestText()">25年</label>
                    <input type="radio" id="borrowing_period" class="other_interest" onclick="interestText()"><input type="text" value="" id="borrowing_period">年</label>
                </td>
            </tr>
            <tr>
                <th>頭金</th>
                <td><label><input type="radio" value="0" id="down_payment">なし</label>
                    <label><input type="radio" id="down_payment"><input id="down_payment" type="text" value=""> 万円</label>
                </td>
            </tr>
            <tr>
                <td colspan=2>
                    <input type="button" value="結果を見る" onclick="calculation()">
                </td>
            </tr>
        </tbody>
    </table>
</form>

<table>
    <tr>
        <th>毎月のお支払い金額</th>
        <td id="result" colspan=3>万円
        </td>
    </tr>
</table>

<div class="contact_form">
    <form method="POST" action="{{ route('contact.confirm') }}" class="contact_form">
        @csrf
        <table>
            <colgroup>
                <col style="width: 30%;">
                <col style="width: 70%;">
            </colgroup>
            <tr>
                <th><label class="required">お名前</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
                        <input name="name" type="text" placeholder="正直 太郎">
                        <span class="help-block">{{$errors->first('name')}}</span>
                    <div>
                </td>
            </tr>
            <tr>
                <th><label class="required">メールアドレス</label></th>
                <td><input name="email" type="email" placeholder="HRE@gmail.com"></td>
            </tr>
            <tr>
                <th><label>電話番号</label></th>
                <td><input name="phone" type="text" placeholder="000-0000-0000"></td>
            </tr>
            <tr>
                <th><label>住所</label></th>
                <td><input name="address" type="text"></td>
            </tr>
            <tr>
                <th><label class="required">お問い合わせ種類</label></th>
                <td>
                    <label name="type"><input type="radio" value="初回購入" name="type">初回購入</label>
                    <label name="type"><input type="radio" value="住み替え(売却あり)" name="type">住み替え(売却あり)</label>
                    <label name="type"><input type="radio" value="住み替え(売却なし)" name="type">住み替え(売却なし)</label>
                </td>
            </tr>
            <tr>
                <th><label class="required">希望内容</label></th>
                <td>
                    <label name="contents"><input type="checkbox" value="実際に物件を見たい" name="contents[]">実際に物件を見たい</label>
                    <label name="contents"><input type="checkbox" value="詳細な資料が欲しい" name="contents[]">詳細な資料がほしい</label>
                    <label name="contents"><input type="checkbox" value="住宅購入に関して相談したい" name="contents[]">住宅購入に関して相談したい</label>
                    <label name="contents"><input type="checkbox" value="希望条件に沿う物件を見学したい" name="contents[]">類似物件も見たい</label>
                </td>
            </tr>
            <tr>
                <th><label class="required">お問い合わせ内容</label></th>
                <td><textarea name="customer_request" placeholder="今週の土曜日１０時に５名で購入相談と物件見学を希望します。希望条件は〇〇のため、事前にご用意いただけますと幸いです。"></textarea></td>
            </tr>
        </table>

        <a href=""><p>個人情報の取扱について</p></a><br>

        <button type="submit">同意して次へ進む</button>
    </form>
</div>
@endsection
