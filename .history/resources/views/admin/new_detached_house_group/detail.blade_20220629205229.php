@extends('layouts.admin')
@section('title', '新築分譲住宅：詳細画面')
@section('body')
<h2>{{ $new_detached_house_group->name }}：詳細画面</h2>
<table>
    <tbody>
        <tr>
            <th colspan=4 class="table_top">物件概要</th>
        </tr>
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
            <td colspan=3>
                {{ $new_detached_house_group->pref }}{{ $new_detached_house_group->municipalities }}{{ $new_detached_house_group->block }}
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
            <th>その他費用</th>
            <td>
                {{ $new_detached_house_group->other_fee }}
            </td>
            <th>駐車場</th>
            <td>
                {{ $new_detached_house_group->lowest_parking_lot }}~{{ $new_detached_house_group->highest_parking_lot }}
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
            <th>現況</th>
            <td>
                {{ $new_detached_house_group->status }}
            </td>
            <th>入居時期</th>
            <td>
                {{ $new_detached_house_group->delivery_date }}
            </td>
        </tr>
        <tr>
            <th>最寄り駅</th>
            <td>
                {{ $new_detached_house_group->station }}まで徒歩{{ $new_detached_house_group->walking_distance_station }}分
            </td>
            <th>取引態様</th>
            <td>
                {{ $new_detached_house_group->conditions_of_transactions }}
            </td>
        </tr>
        <tr>
            <th>物件画像（複数可能）</th>
            <td colspan=3>
            </td>
        </tr>
    </tbody>
</table><br>
<table>
    <tbody>
        <tr>
            <th colspan=2 class="table_top">物件紹介</th>
        </tr>
        <tr>
            <th><p>セールスコメント</p></th>
            <td>
                {{ $new_detached_house_group->sales_comment }}
            </td>
        </tr>
        <tr>
            <th><p>物件紹介コメント</p></th>
            <td>
                {{ $new_detached_house_group->property_introduction }}
            </td>
        </tr>
        <tr>
            <th><p>設備条件</p></th>
            <td>
                {{ $new_detached_house_group->terms_and_conditions }}
            </td>
        </tr>
    </tbody>
</table>

<form action="{{ route('admin.newDetachedHouse.edit', ['id' => $new_detached_house_group->id]) }}">
    @csrf
    <input type="submit" value="編集する" class="show_edit_btn">
</form>
@endsection
