@extends('layouts.user')
@section('title', 'マンション：詳細画面')
@section('body')
<a href="{{ route('hre') }}">TOPページ</a> > <a href="{{ route('buy') }}">買いたい</a> > <a href="{{ route('mansion') }}">マンション</a> > <a href="">検索結果</a><br>

<h1 class="mansion_name">【{{ $mansion->apartment_name }}】販売価格:{{ number_format($mansion->price) }}万円</h1>
    <table class="triple_table">
        <tbody>
            <tr>
                <th>所在地</th>
                    <td colspan=5>{{ $mansion->pref }}{{ $mansion->municipalities }}{{ $mansion->block }}</td>
            </tr>
            <tr>
                <th>最寄り駅</th>
                    <td colspan=5>{{ $mansion->station }}まで{{ $mansion->access_method }}{{ $mansion->distance_station }}分</td>
            </tr>
            <tr>
                <th>間取り</th>
                    <td>{{ $mansion->number_of_rooms }}{{ $mansion->type_of_room }}</td>
                <th>専有面積(測定方法)</th>
                    <td>{{ $mansion->occupation_area }}㎡({{ $mansion->measuring_method }})</td>
                <th>バルコニー面積</th>
                    <td>{{ $mansion->balcony_area }}㎡</td></tr>
            </tr>
            <tr>
                <th>管理費</th>
                    <td>{{ number_format($mansion->maintenance_fee) }}円</td>
                <th>修繕積立金</th>
                    <td>{{ number_format($mansion->reserve_fund_for_repair) }}円</td>
                <th>その他費用</th>
                    <td>
                        @if(!empty($mansion->other_fee))
                            {{ $mansion->other_fee}}
                        @else
                            なし
                        @endif
                    </td>
            </tr>
            <tr>
                <th></th>
                    <td>{{ $mansion->floor }}階</td>
                <th>所在階</th>
                    <td>{{ $mansion->floor }}階</td>
                <th>築年月</th>
                    <td>
                        @if(!empty($mansion->day))
                            {{ $mansion->year }}年{{ $mansion->month }}月{{ $mansion->day }}日
                        @elseif(empty($mansion->day))
                            {{ $mansion->year }}年{{ $mansion->month }}月
                        @endif
                    </td>
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
                <td>{{ date('Y年m月d日', strtotime($today)) }}</td>
                <th>次回更新日</th>
                <td>{{ date('Y年m月d日', strtotime($rollover_date)) }}</td>
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
                    <td>徒歩{{ $mansion->elementary_school_district }}分</td>
            </tr>
            <tr>
                <th>中学校</th>
                    <td>{{ $mansion->junior_high_school_name }}</td>
                <th>通学距離</th>
                    <td>徒歩{{ $mansion->junior_high_school_district }}分</td>
            </tr>
        </tbody>
    </table><br>

<a href="tel:0000000000"><button class="btn">電話をかける(000-000-0000)</button></a>

<h3 class="secondary_item">住宅ローンシミュレーション</h3>
<form class="loan_payment_simulation">
    <table class="single_table">
        <tbody>
            <tr>
                <th>物件価格</th>
                <td>
                    <input type="hidden" id="price" value="{{ $mansion->price }}">{{ number_format($mansion->price) }}万円({{ $mansion->tax }})
                </td>
            </tr>
            <tr>
                <th>金利</th>
                <td>
                    <div class="multiple_answers">
                        <label><input type="radio" value="0.475" name="annual_interest"> 0.475%(変動)</label>
                        <label><input type="radio" value="1.35" name="annual_interest"> 1.35%(固定)</label>
                        <label><input type="radio" value="other" name="annual_interest"><input type="text" id="otherAnnualInterest" value=""> %</label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>借入年数</th>
                <td>
                    <div class="multiple_answers">
                        <label><input type="radio" name="borrowing_period" value="35" onclick="interestText()">35年</label>
                        <label><input type="radio" name="borrowing_period" value="30" onclick="interestText()">30年</label>
                        <label><input type="radio" name="borrowing_period" value="25" onclick="interestText()">25年</label>
                        <label><input type="radio" name="borrowing_period" value="other" class="other_interest" onclick="interestText()"><input type="text" id="otherBorrowingPeriod" value="" > 年</label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>頭金</th>
                <td>
                    <label><input name="down_payment" type="radio" value="0">なし</label>
                    <label><input name="down_payment" type="radio" value="other"><input type="text" id="otherDownPayment" value=""> 万円</label>
                </td>
            </tr>
        </tbody>
    </table><br>

    <input type="button" class="btn" onclick="calculation()" value="結果を見る"><br>
</form>


<table>
    <tr>
        <th colspan=2>毎月のお支払い金額（参考例）</th>
    </tr>
    <tr>
        <td id="result" colspan=2></td>
    </tr>
</table>

<h3 class="secondary_item">お問い合わせ</h3>
<div class="contact_form">
    <form method="POST" action="{{ route('contact.confirm') }}"` class="contact_form">
        @csrf
        <table class="single_table">
            <tr>
                <th>
                    <label class="required">お名前</label>
                </th>
                <td>
                    <div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
                        <input name="name" type="text" old="{{ old('name') }}" placeholder="正直 太郎">
                        <span class="help-block">{{$errors->first('name')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label class="required">メールアドレス</label>
                </th>
                <td>
                    <div class="form-group @if(!empty($errors->first('email'))) has-error @endif">
                        <input name="email" type="email" value="{{ old('email') }}" placeholder="HRE@gmail.com">
                        <span class="help-block">{{$errors->first('email')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label class="required">電話番号</label>
                </th>
                <td>
                    <div class="form-group @if(!empty($errors->first('phone'))) has-error @endif">
                        <input name="phone" type="text" value="{{ old('phone') }}" placeholder="000-0000-0000">
                        <span class="help-block">{{$errors->first('phone')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label class="required">住所</label>
                </th>
                <td>
                    <div class="form-group @if(!empty($errors->first('address'))) has-error @endif">
                        <input name="address" type="text" value="{{ old('address') }}" placeholder="〇〇県〇〇市〇〇町〇-〇">
                        <span class="help-block">{{$errors->first('address')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label class="required">お問い合わせ詳細</label>
                </th>
                <td>
                    <div class="multiple_answers">
                        <label name="content"><input type="checkbox" value="購入相談" name="content[]"> 購入相談</label>
                        <label name="content"><input type="checkbox" value="売却相談" name="content[]"> 売却相談</label>
                        <label name="content"><input type="checkbox" value="賃貸相談" name="content[]"> 賃貸相談</label>
                        <label name="content"><input type="checkbox" value="その他" name="content[]"> その他</label>
                    </div>
                </td>
            </tr>
            <tr class="small_textarea">
                <th>
                    <label class="required">お問い合わせ内容</label>
                </th>
                <td>
                    <div class="form-group @if(!empty($errors->first('messages'))) has-error @endif">
                        <textarea value="{{ old('messages') }}" placeholder="今週の土曜日１０時に５名で購入相談と物件見学を希望します。"></textarea>
                        <span class="help-block">{{$errors->first('messages')}}</span>
                    </div>
                </td>
            </tr>
        </table>

        <button class="submit_button" type="submit">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front text">お問い合わせ(無料)</span>
        </button>
    </form>
</div>
@endsection
