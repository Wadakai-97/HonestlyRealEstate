@extends('layouts.user')
@section('title', 'マンション検索結果')
@section('body')
<h3 class="part_title">検索結果</h3>

<table class="single_table">
    <thead>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </thead>
    @foreach ($mansions as $mansion)
    <tbody>
        <tr>
            物件名</th><td><a href="{{ route('mansion.detail', ['id' => $mansion->id]) }}">{{ $mansion->apartment_name }}</a></td></tr>
            販売価格</th><td>{{ number_format($mansion->price) }}万円</td></tr>
            所在地</th><td>{{ $mansion->pref }}{{ $mansion->municipalities }}</td></tr>
            交通</th><td>「{{ $mansion->station }}」徒歩{{ $mansion->walking_distance_station }}分</td></tr>
            間取り</th><td>{{ $mansion->number_of_rooms }}{{ $mansion->type_of_room }}</td></tr>
            専有面積</th><td>{{ $mansion->occupation_area }}㎡（{{ $mansion->measuring_method }}）</td></tr>
            所在階</th><td>{{ $mansion->floor }}階</td></tr>
            築年月</th><td>{{ $mansion->year }}年{{ $mansion->month }}月</td></tr>
            建物構造</th><td>{{ $mansion->building_construction }}</td>
        </tr>
    </tbody>
    @endforeach
</table>

{{ $mansions->appends(request()->input())->links('pagination::default') }}

@endsection
