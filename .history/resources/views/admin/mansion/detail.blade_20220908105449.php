@extends('layouts.admin')
@section('title', 'マンション：詳細画面')
@section('body')
<h3>詳細画面</h3>
<table>
    <colgroup>
        <col style="width: 15%;">
        <col style="width: 35%;">
        <col style="width: 15%;">
        <col style="width: 35%;">
    </colgroup>
    <thead>
        <tr>
            <th colspan=4 class="table_top">物件概要</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>建物名</th>
            <td>
                {{ $mansion->apartment_name }}{{ $mansion->room }}
            </td>
            <th>販売価格</th>
            <td>
                {{ number_format($mansion->price) }}万円（{{ $mansion->tax }}）
            </td>
        </tr>
        <tr>
            <th>住所</th>
            <td colspan=3>
                {{ $mansion->pref }}{{ $mansion->municipalities }}{{ $mansion->block }}
            </td>
        </tr>
        <tr>
            <th>土地面積</th>
            <td>
                {{ number_format($mansion->land_area) }}㎡
            </td>
            <th>建物面積</th>
            <td>
                {{ number_format($mansion->building_area) }}㎡
            </td>
        </tr>
        <tr>
            <th>間取り</th>
            <td>
                {{ $mansion->number_of_rooms }}{{ $mansion->type_of_room }}（測定方法：{{ $mansion->measuring_method }}）
            </td>
            <th>専有面積</th>
            <td>
                {{ $mansion->occupation_area }}㎡
            </td>
        </tr>
        <tr>
            <th>方角</th>
            <td>
                {{ $mansion->direction }}
            </td>
            <th>バルコニー面積</th>
            <td>
                {{ $mansion->balcony_area }}㎡
            </td>
        </tr>
        <tr>
            <th>所在階/</th>
            <td>
                {{ $mansion->floor }}階
            </td>
            <th>階建</th>
            <td>
                {{ $mansion->story }}
            </td>
        </tr>
        <tr>
            <th>完成時期（築年月）</th>
            <td colspan=3>
                {{ $mansion->year}}/{{ $mansion->month }}/{{ $mansion->day}}
            </td>
        </tr>
        <tr>
            <th>建物構造</th>
            <td>
                {{ $mansion->building_construction }}
            </td>
            <th>総戸数</th>
            <td>
                {{ $mansion->total_number_of_households }}
            </td>
        </tr>
        <tr>
            <th>管理会社</th>
            <td>
                {{ $mansion->management_company }}
            </td>
            <th>管理形態</th>
            <td>
                {{ $mansion->management_system }}
            </td>
        </tr>
        <tr>
            <th>管理費</th>
            <td>
                {{ number_format($mansion->maintenance_fee) }}円
            </td>
            <th>修繕積立金</th>
            <td>
                {{ number_format($mansion->reserve_fund_for_repair) }}円
            </td>
        </tr>
        <tr>
            <th>その他費用</th>
            <td>
                @if(!empty($new_detached_house->other_fee))
                {{ $new_detached_house->other_fee}}
            @else
                なし
            @endif
            </td>
            <th>駐車場</th>
            <td>
                {{ $mansion->parking_lot }}
            </td>
        </tr>
        <tr>
            <th>用途地域</th>
            <td>
                {{ $mansion->land_use_zones }}
            </td>
            <th>土地権利</th>
            <td>
                {{ $mansion->land_right }}
            </td>
        </tr>
        <tr>
            <th>現況</th>
            <td>
                {{ $mansion->status }}
            </td>
            <th>入居時期</th>
            <td>
                {{ $mansion->delivery_date }}
            </td>
        </tr>
        <tr>
            <th>最寄り駅</th>
            <td>
                {{ $mansion->station }}まで{{ $mansion->access_method }}{{ $mansion->distance_station }}分
            </td>
            <th>取引態様</th>
            <td>
                {{ $mansion->conditions_of_transactions }}
            </td>
        </tr>
        <tr>
            <th>物件画像（複数可能）</th>
            <td colspan=3>
                @foreach ($mansion_images as $mansion_image)
                    <img src="{{ asset('/storage/property_images/mansio/' . $mansion_image->path) }}">
                @endforeach
            </td>
        </tr>
    </tbody>
</table><br>

<table>
    <colgroup>
        <col style="width: 20%;">
        <col style="width: 80%;">
    </colgroup>
    <thead>
        <tr>
            <th colspan=2 class="table_top">物件紹介</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>セールスコメント</th>
            <td>
                {{ $mansion->sales_comment }}
            </td>
        </tr>
        <tr>
            <th>物件紹介コメント</th>
            <td>
                {{ $mansion->property_introduction }}
            </td>
        </tr>
        <tr>
            <th>設備条件</th>
            <td>
                {{ $mansion->terms_and_conditions }}
            </td>
        </tr>
    </tbody>
</table>

<button onclick="location.href='{{ route('admin.mansion.edit', ['id' => $mansion->id]) }}'">編集</button>

@endsection
