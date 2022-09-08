@extends('layouts.admin')
@section('title', '新築戸建：詳細画面')
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
                {{ $new_detached_house->name }}
            </td>
            <th>販売価格</th>
            <td>
                {{ $new_detached_house->price}}万円（{{ $new_detached_house->tax }}）
            </td>
        </tr>
        <tr>
            <th>住所</th>
            <td colspan=3>
                {{ $new_detached_house->pref }}{{ $new_detached_house->municipalities }}{{ $new_detached_house->block }}
            </td>
        </tr>
        <tr>
            <th>土地面積</th>
            <td>
                {{ $new_detached_house->land_area }}㎡
            </td>
            <th>建物面積</th>
            <td>
                {{ $new_detached_house->building_area }}㎡
            </td>
        </tr>
        <tr>
            <th>間取り</th>
            <td>
                {{ $new_detached_house->number_of_rooms }}{{ $new_detached_house->type_of_room }}
            </td>
        </tr>
        <tr>
            <th>方角</th>
            <td>
                {{ $new_detached_house->direction }}
            </td>
            <th>バルコニー面積</th>
            <td>
                {{ $new_detached_house->balcony_area }}㎡
            </td>
        </tr>
        <tr>
            <th>完成時期（築年月）</th>
            <td>
                {{ $new_detached_house->year}}/{{ $new_detached_house->month }}/{{ $new_detached_house->day}}
            </td>
            <th>建物構造</th>
            <td>
                {{ $new_detached_house->building_construction }}
            </td>
        </tr>
        <tr>
            <th>その他費用</th>
            <td>
                {{ $new_detached_house->other_fee }}
            </td>
            <th>駐車場</th>
            <td>
                @if($new_detached_house->parking == 'なし')
                {{ $new_detached_house->parking }}
                @elseif($new_detached_house->parking == 'あり')
                @endi
            </td>
        </tr>
        <tr>
            <th>用途地域</th>
            <td>
                {{ $new_detached_house->land_use_zones }}
            </td>
            <th>土地権利</th>
            <td>
                {{ $new_detached_house->land_right }}
            </td>
        </tr>
        <tr>
            <th>現況</th>
            <td>
                {{ $new_detached_house->status }}
            </td>
            <th>入居時期</th>
            <td>
                {{ $new_detached_house->delivery_date }}
            </td>
        </tr>
        <tr>
            <th>最寄り駅</th>
            <td>
                {{ $new_detached_house->station }}まで徒歩{{ $new_detached_house->walking_distance_station }}分
            </td>
            <th>取引態様</th>
            <td>
                {{ $new_detached_house->conditions_of_transactions }}
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
    <thead>
        <tr>
            <th colspan=2 class="table_top">物件紹介</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>セールスコメント</th>
            <td>
                {{ $new_detached_house->sales_comment }}
            </td>
        </tr>
        <tr>
            <th>物件紹介コメント</th>
            <td>
                {{ $new_detached_house->property_introduction }}
            </td>
        </tr>
        <tr>
            <th>設備条件</th>
            <td>
                {{ $new_detached_house->terms_and_conditions }}
            </td>
        </tr>
    </tbody>
</table>

<button onclick="location.href='{{ route('admin.newDetachedHouse.edit', ['id' => $new_detached_house->id]) }}'" class="show_edit_btn">編集</button>
@endsection
