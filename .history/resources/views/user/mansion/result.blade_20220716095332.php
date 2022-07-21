@extends('layouts.user')
@section('title', 'マンション検索結果')
@section('body')
<h3 class="part_title">検索結果</h3>

<table class="single_table">
    <thead>
        <tr>
            <td>物件名</td>
            <td>販売価格</td>
            <td>所在地</td>
            <td>交通</td>
            <td>間取り</td>
            <td>専有面積</td>
            <td>所在階</td>
            <td>築年数</td>
        </tr>
    </thead>
    @foreach ($mansions as $mansion)
    <tbody>
        <tr>
            <td><a href="{{ route('mansion.detail', ['id' => $mansion->id]) }}">{{ $mansion->apartment_name }}</a></td>
            <td>{{ number_format($mansion->price) }}万円</td>
            <td>{{ $mansion->pref }}{{ $mansion->municipalities }}</td>
            <td>「{{ $mansion->station }}」徒歩{{ $mansion->walking_distance_station }}分</td>
            <td>{{ $mansion->number_of_rooms }}{{ $mansion->type_of_room }}</td>
            <td>{{ $mansion->occupation_area }}㎡（{{ $mansion->measuring_method }}）</td>
            <td>{{ $mansion->floor }}階</td>
            <td>{{ $mansion->year }}年{{ $mansion->month }}月</td>
            <td>{{ $mansion->building_construction }}</td>
        </tr>
    </tbody>
    @endforeach
</table>

{{ $mansions->appends(request()->input())->links('pagination::default') }}

@endsection
