@extends('layouts.user')
@section('title', 'マンション検索結果')
@section('body')
<h3 class="part_title">検索結果</h3>

@if(!empty(request()))

<div class="search_condition">

    @if(!empty(request()->lowest_price) && empty(request()->highest_price))
        <p>最低価格：{{ $request->lowest_price }}万円</p>
    @endif
    @if(empty(request()->lowest_price) && !empty(request()->highest_price))
        <p>最低価格：{{ $request->lowest_price }}万円</p>
    @endif
    @if(!empty(request()->lowest_price) && empty(request()->highest_price))
        <p>最低価格：{{ $request->lowest_price }}万円</p>
    @endif

</div>

@endif

<table class="result_table">
    <thead>
        <tr>
            <th>@sortablelink('apartment_name', '物件名')</th>
            <th>@sortablelink('price', '販売価格')</th>
            <th>@sortablelink('municipalities', '所在地')</th>
            <th>@sortablelink('walking_distance_station', '交通')</th>
            <th>@sortablelink('number_of_rooms', '間取り')</th>
            <th>@sortablelink('occupation_area', '専有面積')</th>
            <th>@sortablelink('floor', '所在階')</th>
            <th>@sortablelink('year', '築年数')</th>
            <th>@sortablelink('updated_at', '最終更新日')</th>
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
            <td>{{ $mansion->occupation_area }}㎡</td>
            <td>{{ $mansion->floor }}階/{{ $mansion->story }}</td>
            <td>{{ $today - $mansion->year }}年</td>
            <td>{{ $mansion->updated_at->format('Y年m月d日') }}</td>
        </tr>
    </tbody>
    @endforeach
</table>

{{ $mansions->appends(request()->input())->links() }}

@endsection
