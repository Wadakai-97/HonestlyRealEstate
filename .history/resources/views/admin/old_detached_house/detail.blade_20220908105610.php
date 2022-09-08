@extends('layouts.admin')
@section('title', '中古戸建：詳細画面')
@section('body')
<h3>中古戸建：詳細画面</h3>
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
                {{ $old_detached_house->name }}
            </td>
            <th>販売価格</th>
            <td>
                {{ $old_detached_house->price}}万円（{{ $old_detached_house->tax }}）
            </td>
        </tr>
        <tr>
            <th>住所</th>
            <td colspan=3>
                {{ $old_detached_house->pref }}{{ $old_detached_house->municipalities }}{{ $old_detached_house->block }}
            </td>
        </tr>
        <tr>
            <th>土地面積</th>
            <td>
                {{ $old_detached_house->land_area }}㎡
            </td>
            <th>建物面積</th>
            <td>
                {{ $old_detached_house->building_area }}㎡
            </td>
        </tr>
        <tr>
            <th>間取り</th>
            <td>
                {{ $old_detached_house->number_of_rooms }}{{ $old_detached_house->type_of_room }}
            </td>
        </tr>
        <tr>
            <th>方角</th>
            <td>
                {{ $old_detached_house->direction }}
            </td>
            <th>バルコニー面積</th>
            <td>
                {{ $old_detached_house->balcony_area }}㎡
            </td>
        </tr>
        <tr>
            <th>完成時期（築年月）</th>
            <td>
                {{ $old_detached_house->year}}/{{ $old_detached_house->month }}/{{ $old_detached_house->day}}
            </td>
            <th>建物構造</th>
            <td>
                {{ $old_detached_house->building_construction }}
            </td>
        </tr>
        <tr>
            <th>その他費用</th>
            <td>
                @if(!empty($old_detached_house->other_fee))
                    {{ $old_detached_house->other_fee}}
                @else
                    なし
                @endif
            </td>
            <th>駐車場</th>
            <td>
                @if($old_detached_house->parking == 'なし' || $old_detached_house->parking_lot == '0')
                    なし
                @elseif($old_detached_house->parking == 'あり' )
                    {{ $old_detached_house->parking_lot }}台
                @endif
            </td>
        </tr>
        <tr>
            <th>用途地域</th>
            <td>
                {{ $old_detached_house->land_use_zones }}
            </td>
            <th>土地権利</th>
            <td>
                {{ $old_detached_house->land_right }}
            </td>
        </tr>
        <tr>
            <th>現況</th>
            <td>
                {{ $old_detached_house->status }}
            </td>
            <th>入居時期</th>
            <td>
                {{ $old_detached_house->delivery_date }}
            </td>
        </tr>
        <tr>
            <th>最寄り駅</th>
            <td>
                {{ $old_detached_house->station }}まで{{ $old_detached_house->access_method }}{{ $old_detached_house->distance_station }}分
            </td>
            <th>取引態様</th>
            <td>
                {{ $old_detached_house->conditions_of_transactions }}
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
            <th><p>セールスコメント</p></th>
            <td>
                {{ $old_detached_house->sales_comment }}
            </td>
        </tr>
        <tr>
            <th><p>物件紹介コメント</p></th>
            <td>
                {{ $old_detached_house->property_introduction }}
            </td>
        </tr>
        <tr>
            <th><p>設備条件</p></th>
            <td>
                {{ $old_detached_house->terms_and_conditions }}
            </td>
        </tr>
    </tbody>
</table>

<button onclick="location.href='{{ route('admin.oldDetachedHouse.edit', ['id' => $old_detached_house->id]) }}'">編集</button>
@endsection
