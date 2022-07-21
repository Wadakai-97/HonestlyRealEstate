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
            <td><a href="{{ route('mansion.detail', ['id' => $mansion->id]) }}">{{ $mansion->apartment_name }}</a></td></tr>
            <td>{{ number_format($mansion->price) }}万円</td></tr>
            <td>{{ $mansion->pref }}{{ $mansion->municipalities }}</td></tr>
            <td>「{{ $mansion->station }}」徒歩{{ $mansion->walking_distance_station }}分</td></tr>
            <td>{{ $mansion->number_of_rooms }}{{ $mansion->type_of_room }}</td></tr>
            <td>{{ $mansion->occupation_area }}㎡（{{ $mansion->measuring_method }}）</td></tr>
            <td>{{ $mansion->floor }}階</td></tr>
            <td>{{ $mansion->year }}年{{ $mansion->month }}月</td></tr>
            ><td>{{ $mansion->building_construction }}</td>
        </tr>
    </tbody>
    @endforeach
</table>

{{ $mansions->appends(request()->input())->links('pagination::default') }}

@endsection
