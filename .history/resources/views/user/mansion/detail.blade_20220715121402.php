@extends('layouts.user')
@section('title', '詳細画面')
@section('body')
<a href="{{ route('hre') }}">TOPページ</a> > <a href="{{ route('buy') }}">買いたい</a> > <a href="{{ route('mansion') }}">マンション</a> > <a href="">検索結果</a><br>

<h1 class="mansion_name">【{{ $mansion->apartment_name }}】販売価格:{{ number_format($mansion->price) }}万円</h1>
    <table class="triple_table">
        <tbody>
            <tr>
                <th>所在地</th>
                    <td>{{ $mansion->pref }}{{ $mansion->municipalities }}{{ $mansion->block }}</td>
                <th>専有面積(測定方法)</th>
                    <td>{{ $mansion->occupation_area }}㎡({{ $mansion->measuring_method }})</td>
                <th>間取り</th>
                    <td>{{ $mansion->number_of_rooms }}{{ $mansion->type_of_room }}</td>
            </tr>
            <tr>
                <th>最寄り駅</th>
                    <td>{{ $mansion->station }}</td>
                <th>駅徒歩</th>
                    <td>{{ $mansion->walking_distance_station }}分</td>
                <th>用途地域</th>
                    <td>{{ $mansion->land_use_zones }}</td>
            </tr>
            <tr>
                <th>管理費</th>
                    <td>{{ number_format($mansion->maintenance_fee) }}円</td>
                <th>修繕積立金</th>
                    <td>{{ number_format($mansion->reserve_fund_for_repair) }}円</td>
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

<h3 class="secondary_item">物件の特徴</h3>
    <p class="explanation">{{ $mansion->property_introduction }}</p>

<h3 class="secondary_item">建物概要</h3>
    <table class="double_table">
        <tbody>
            <tr>
                <th>向き</th>
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
                <th>更新日</th>
                <td>{{ date('Y/m/d', strtotime($mansion->updated_at)) }}</td>
                <th>次回更新日</th>
                <td>{{ date('Y/m/d', strtotime($next_updated_at)) }}</td>
            </tr>
            <tr>
                <th>取引態様</th>
                    <td>{{ $mansion->conditions_of_transactions }}</td>
            </tr>
        </tbody>
    </table>

<h3 class="secondary_item">セールスポイント</h3>
<p class="explanation">{{ $mansion->sales_comment }}</p>

<h3 class="secondary_item">学区情報</h3>
    <table class="double_table">
        <tbody>
            <tr>
                <th>小学校</th>
                    <td>{{ $mansion->elementary_school_name }}</td>
                <th>通学距離</th>
                    <td>{{ $mansion->elementary_school_district }}分</td>
            </tr>
            <tr>
                <th>中学校</th>
                    <td>{{ $mansion->junior_high_school_name }}</td>
                <th>通学距離</th>
                    <td>{{ $mansion->junior_high_school_district }}分</td>
            </tr>
        </tbody>
    </table>

<a href="tel:0000000000"><button class="btn">電話をかける(000-000-0000)</button></a>

<h3>
    <div id="map"></div>
</h3>

<form class="loan_payment_simulation">
    <table class="single_table">
        <thead><tr><th colspan=2>住宅ローンシミュレーション</th></tr></thead>
        <tbody>
            <tr>
                <th>物件価格</th>
                <td>
                    <input type="hidden" id="price" value="{{ $mansion->price }}">{{ $mansion->price }}万円（{{ $mansion->tax }}）
                </td>
            </tr>
            <tr>
                <th>金利</th>
                <td>
                    <div class="multiple_answers">
                        <label><input type="radio" value="0.475" name="annual_interest" id="annual_interest">変動金利：0.475%</label>
                        <label><input type="radio" value="1.35" name="annual_interest" id="annual_interest">固定金利：1.35%</label>
                        <label><input type="radio" name="annual_interest" id="annual_interest"><input id="annual_interest" type="text" value="">%</label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>借入期間</th>
                <td>
                    <div class="multiple_answers">
                        <label><input type="radio" name="borrowing_period" id="borrowing_period" value="35" onclick="interestText()">35年</label>
                        <label><input type="radio" name="borrowing_period" id="borrowing_period" value="30" onclick="interestText()">30年</label>
                        <label><input type="radio" name="borrowing_period" id="borrowing_period" value="25" onclick="interestText()">25年</label>
                        <label><input type="radio" name="borrowing_period" id="borrowing_period" class="other_interest" onclick="interestText()"><input type="text" value="" id="borrowing_period"></label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>頭金</th>
                <td>
                    <label><input name="down_payment" type="radio" value="0" id="down_payment">なし</label>
                    <label><input name="down_payment" type="radio" id="down_payment"><input id="down_payment" type="text" value=""> 万円</label>
                </td>
            </tr>
        </tbody>
    </table>

    <input type="button" class="btn" onclick="calculation()" value="結果を見る">
</form>


<table>
    <tr>
        <th colspan=2>毎月のお支払い金額（参考例）</th>
    </tr>
    <tr>
        <td id="result" colspan=2></td>
    </tr>
</table>

<div class="contact_form">
    <form method="POST" action="{{ route('contact.confirm') }}" class="contact_form">
        @csrf
        <table class="single_table">
            <tr>
                <th>
                    <label class="required">お名前</label>
                </th>
                <td>
                    <div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
                        <input name="name" type="text" placeholder="正直 太郎">
                        <span class="help-block">{{$errors->first('name')}}</span>
                    <div>
                </td>
            </tr>
            <tr>
                <th>
                    <label class="required">メールアドレス</label>
                </th>
                <td>
                    <input name="email" type="email" placeholder="HRE@gmail.com">
                </td>
            </tr>
            <tr>
                <th>
                    <label>電話番号</label>
                </th>
                <td>
                    <input name="phone" type="text" placeholder="000-0000-0000">
                </td>
            </tr>
            <tr>
                <th>
                    <label>住所</label>
                </th>
                <td>
                    <input name="address" type="text">
                </td>
            </tr>
            <tr>
                <th>
                    <label class="required">お問い合わせ種類</label>
                </th>
                <td>
                    <div class="multiple_answers">
                        <label name="type"><input type="radio" value="初回購入" name="type"> 初回購入</label>
                        <label name="type"><input type="radio" value="住み替え(売却あり)" name="type"> 住み替え(売却あり)</label>
                        <label name="type"><input type="radio" value="住み替え(売却なし)" name="type"> 住み替え(売却なし)</label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label class="required">希望内容</label>
                </th>
                <td>
                    <div class="multiple_answers">
                        <label name="contents"><input type="checkbox" value="実際に物件を見たい" name="contents[]"> 実際に物件を見たい</label>
                        <label name="contents"><input type="checkbox" value="詳細な資料が欲しい" name="contents[]"> 詳細な資料がほしい</label>
                        <label name="contents"><input type="checkbox" value="住宅購入に関して相談したい" name="contents[]"> 住宅購入に関して相談したい</label>
                        <label name="contents"><input type="checkbox" value="希望条件に沿う物件を見学したい" name="contents[]"> 類似物件も見たい</label>
                    </div>
                </td>
            </tr>
            <tr class="small_textarea">
                <th>
                    <label class="required">お問い合わせ内容</label>
                </th>
                <td>
                    <textarea name="customer_request" placeholder="今週の土曜日１０時に５名で購入相談と物件見学を希望します。希望条件は〇〇のため、事前にご用意いただけますと幸いです。"></textarea>
                </td>
            </tr>
        </table>

        <a href=""><p>個人情報の取扱について</p></a>

        <input type="submit" class="btn" value="お問い合わせ内容を確認する。">
    </form>
</div>
@endsection
