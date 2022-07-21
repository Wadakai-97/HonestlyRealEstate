@extends('layouts.admin')
@section('title', '新築戸建詳細')
@section('body')
<h2>{{ $new_detached_group->name }}：詳細</h2>
<table>
    <tbody>
        <tr>
            <th colspan=4 class="table_top">物件概要</th>
        </tr>
        <tr>
            <th>建物名</th>
            <td>
                {{ $new_detached->name }}
            </td>
            <th>販売価格</th>
            <td>
                {{ $new_detached->price}}万円（{{ $new_detached->tax }}）
            </td>
        </tr>
        <tr>
            <th>住所</th>
            <td colspan=3>
                {{ $new_detached->pref }}{{ $new_detached->municipalities }}{{ $new_detached->block }}
            </td>
        </tr>
        <tr>
            <th>土地面積</th>
            <td>
                {{ $new_detached->land_area }}㎡
            </td>
            <th>建物面積</th>
            <td>
                {{ $new_detached->building_area }}㎡
            </td>
        </tr>
        <tr>
            <th>間取り</th>
            <td>
                {{ $new_detached->number_of_rooms }}{{ $new_detached->type_of_room }}
            </td>
        </tr>
        <tr>
            <th>方角</th>
            <td>
                {{ $new_detached->direction }}
            </td>
            <th>バルコニー面積</th>
            <td>
                {{ $new_detached->balcony_area }}㎡
            </td>
        </tr>
        <tr>
            <th>完成時期（築年月）</th>
            <td>
                {{ $new_detached->year}}/{{ $new_detached->month }}/{{ $new_detached->day}}
            </td>
            <th>建物構造</th>
            <td>
                {{ $new_detached->building_construction }}
            </td>
        </tr>
        <tr>
            <th>その他費用</th>
            <td>
                {{ $new_detached->other_fee }}
            </td>
            <th>駐車場</th>
            <td>
                {{ $new_detached->parking_lot }}
            </td>
        </tr>
        <tr>
            <th>用途地域</th>
            <td>
                {{ $new_detached->land_use_zones }}
            </td>
            <th>土地権利</th>
            <td>
                {{ $new_detached->land_right }}
            </td>
        </tr>
        <tr>
            <th>現況</th>
            <td>
                {{ $new_detached->status }}
            </td>
            <th>入居時期</th>
            <td>
                {{ $new_detached->delivery_date }}
            </td>
        </tr>
        <tr>
            <th>最寄り駅</th>
            <td>
                {{ $new_detached->station }}まで徒歩{{ $new_detached->walking_distance_station }}分
            </td>
            <th>取引態様</th>
            <td>
                {{ $new_detached->conditions_of_transactions }}
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
                {{ $new_detached->sales_comment }}
            </td>
        </tr>
        <tr>
            <th><p>物件紹介コメント</p></th>
            <td>
                {{ $new_detached->property_introduction }}
            </td>
        </tr>
        <tr>
            <th><p>設備条件</p></th>
            <td>
                {{ $new_detached->terms_and_conditions }}
            </td>
        </tr>
    </tbody>
</table>

<form action="{{ route('admin.newDetachedHouse.edit', ['id' => $new_detached->id]) }}">
    @csrf
    <input type="submit" value="編集する" class="show_edit_btn">
</form>
@endsection
