@extends('layouts.user')
@section('title', 'マンション検索結果')
@section('body')
<h3 class="part_title">検索結果</h3>

@if(!empty(request()))
    <div class="search_condition">
        <h3>検索条件</h3>
        <p>
        @if(!empty(request()->pref)))
            都道府県：{{ $request->pref }}、
        @endif

        {{-- 販売価格 --}}
        @if(!empty(request()->lowest_price) && empty(request()->highest_price))
            最低価格：{{ $request->lowest_price }}万円、
        @endif
        @if(empty(request()->lowest_price) && !empty(request()->highest_price))
            最高価格：{{ $request->highest_price }}万円、
        @endif
        @if(!empty(request()->lowest_price) && !empty(request()->highest_price))
            最低価格：{{ $request->lowest_price }}万円〜最高価格：{{ $request->highest_price }}万円、
        @endif

        {{-- 専有面積 --}}
        @if(!empty(request()->lowest_occupation_area) && empty(request()->highest_occupation_area))
            最低専有面積：{{ $request->lowest_occupation_area }}㎡、
        @endif
        @if(empty(request()->lowest_occupation_area) && !empty(request()->highest_occupation_area))
            最高専有面積：{{ $request->highest_occupation_area }}㎡、
        @endif
        @if(!empty(request()->lowest_occupation_area) && !empty(request()->highest_occupation_area))
            最低専有面積：{{ $request->lowest_occupation_area }}㎡〜最高専有面積：{{ $request->highest_occupation_area }}㎡
        @endif

        {{-- 間取り --}}
        {{-- @if(!empty(request()->plan))
            間取り：{{ $request->plan }}
        @endif --}}

        {{-- 築年数 --}}
        @if(!empty(request()->old))
            築年数：{{ $request->old }}年以内
        @endif

        {{-- 最寄り駅 --}}
        @if(!empty(request()->station))
            最寄り駅：{{ $request->station }}
        @endif

        {{-- 駅徒歩 --}}
        @if(!empty(request()->walking_distance_station))
            駅徒歩：{{ $request->walking_distance_station }}分
        @endif
        </p>
    </div>
@endif

<p>検索結果数：{{ $number_of_result }}件</p>
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
    @forelse ($mansions as $mansion)
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
    @empty

    <p>検索条件に一致する物件はありませんでした。</p>

    @endforelse
</table>

{{ $mansions->appends(request()->input())->links() }}

@endsection
