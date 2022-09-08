@extends('layouts.admin')
@section('title', '新築分譲住宅：詳細画面')
@section('body')
<h3>詳細画面</h3>
<table>
    <thead>
        <tr>
            <th colspan=4 class="table_top">物件概要</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>建物名</th>
            <td>
                {{ $new_detached_house_group->name }}
            </td>
            <th>販売価格</th>
            <td>
                {{ $new_detached_house_group->lowest_price}}万円（{{ $new_detached_house_group->tax }}）〜{{ $new_detached_house_group->highest_price}}万円（{{ $new_detached_house_group->tax }}）
            </td>
        </tr>
        <tr>
            <th>住所</th>
            <td>
                {{ $new_detached_house_group->pref }}{{ $new_detached_house_group->municipalities }}{{ $new_detached_house_group->block }}
            </td>
            <th>間取り</th>
            <td>
                {{ $new_detached_house_group->lowest_number_of_rooms }}{{ $new_detached_house_group->lowest_type_of_room }}〜{{ $new_detached_house_group->highest_number_of_rooms }}{{ $new_detached_house_group->highest_type_of_room }}
            </td>
        </tr>
        <tr>
            <th>土地面積</th>
            <td>
                {{ $new_detached_house_group->lowest_land_area }}㎡〜{{ $new_detached_house_group->highest_land_area }}㎡
            </td>
            <th>建物面積</th>
            <td>
                {{ $new_detached_house_group->lowest_building_area }}㎡〜{{ $new_detached_house_group->highest_building_area }}㎡
            </td>
        </tr>
        <tr>
            <th>バルコニー面積</th>
            <td>
                {{ $new_detached_house_group->lowest_balcony_area }}㎡~{{ $new_detached_house_group->highest_balcony_area }}㎡
            </td>
            <th>その他費用</th>
            <td>
                @if(empty($new_detached_house_group->other_fee))
                    なし
                @elseif(!empty($new_detached_house_group->other_fee))
                    {{ $new_detached_house_group->other_fee }}
                @endif
            </td>
        </tr>
        <tr>
            <th>完成時期（築年月）</th>
            <td>
                {{ $new_detached_house_group->year}}/{{ $new_detached_house_group->month }}/{{ $new_detached_house_group->day}}
            </td>
            <th>建物構造</th>
            <td>
                {{ $new_detached_house_group->building_construction }}
            </td>
        </tr>
        <tr>
            <th>駐車場</th>
            <td>
                @if($new_detached_house_group->parking == "あり")
                    {{ $new_detached_house_group->lowest_parking_lot }}台~{{ $new_detached_house_group->highest_parking_lot }}台
                @elseif($new_detached_house_group->parking == "なし")
                    なし
                @endif
            </td>
            <th>現況</th>
            <td>
                {{ $new_detached_house_group->status }}
            </td>
        </tr>
        <tr>
            <th>用途地域</th>
            <td>
                {{ $new_detached_house_group->land_use_zones }}
            </td>
            <th>土地権利</th>
            <td>
                {{ $new_detached_house_group->land_right }}
            </td>
        </tr>
        <tr>
            <th>入居時期</th>
            <td>
                {{ $new_detached_house_group->delivery_date }}
            </td>
            <th>取引態様</th>
            <td>
                {{ $new_detached_house_group->conditions_of_transactions }}
            </td>
        </tr>
        <tr>
            <th>最寄り駅</th>
            <td colspan=3>
                {{ $new_detached_house_group->station }}まで{{ $new_detached_house_grouy{{ $new_detached_house_group->distance_station }}分
            </td>
        </tr>
    </tbody>
</table><br>

<table>
    <thead>
        <tr>
            <th colspan=2 class="table_top">物件概要</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>セールスコメント</th>
            <td>
                {{ $new_detached_house_group->sales_comment }}
            </td>
        </tr>
        <tr>
            <th>物件紹介コメント</th>
            <td>
                {{ $new_detached_house_group->property_introduction }}
            </td>
        </tr>
        <tr>
            <th>設備条件</th>
            <td>
                {{ $new_detached_house_group->terms_and_conditions }}
            </td>
        </tr>
    </tbody>
</table>

<button onclick="location.href='{{ route('admin.newDetachedHouseGroup.edit', ['id' => $new_detached_house_group->id]) }}'" class="show_edit_btn">編集</button>
@endsection
