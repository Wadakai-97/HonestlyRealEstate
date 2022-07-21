@extends('layouts.user')
@section('title', 'マンション検索結果')
@section('body')
<h3 class="part_title">検索結果</h3>

<select name="" id="">
    <option value="">新着・更新順</option>
    <option value="">価格が安い順</option>
    <option value="">価格が高い順</option>
    <option value="">専有面積が広い順</option>
    <option value="">専有面積が狭い順</option>
    <option value="">間取りが多い順</option>
    <option value="">間取りが少ない順</option>
</select>

@foreach ($mansions as $mansion)
    <table>
        <tbody>
            <tr><th>物件名</th><td><a href="{{ route('mansion.detail', ['id' => $mansion->id]) }}">{{ $mansion->apartment_name }}</a></td></tr>
            <tr><th>販売価格</th><td>{{ $mansion->price }}万円</td></tr>
            <tr><th>所在地</th><td>{{ $mansion->pref }}{{ $mansion->municipalities }}</td></tr>
            <tr><th>交通</th><td>「{{ $mansion->station }}」徒歩{{ $mansion->walking_distance_station }}分</td></tr>
            <tr><th>間取り</th><td>{{ $mansion->number_of_rooms }}{{ $mansion->type_of_room }}</td></tr>
            <tr><th>専有面積</th><td>{{ $mansion->occupation_area }}㎡（{{ $mansion->measuring_method }}）</td></tr>
            <tr><th>所在階</th><td>{{ $mansion->floor }}階</td></tr>
            <tr><th>築年月</th><td>{{ $mansion->year }}年{{ $mansion->month }}月</td></tr>
            <tr><th>建物構造</th><td>{{ $mansion->building_construction }}</td></tr>
        </tbody>
    </table><br>
@endforeach

{{ $mansions->appends(['mansion' => $mansion ?''])->links('pagination::default') }}

@endsection
