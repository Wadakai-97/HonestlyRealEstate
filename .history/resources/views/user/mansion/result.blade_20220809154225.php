@extends('layouts.user')
@section('title', 'マンション検索結果')
@section('body')
<h3 class="part_title">検索結果</h3>

@if(!empty(request()))
    <div class="search_condition">
        <h3>検索条件</h3>
        @if(!empty(request()->pref)))
            <p>都道府県：{{ $request->pref }}</p>
        @endif

        {{-- 販売価格 --}}
        @if(!empty(request()->lowest_price) && empty(request()->highest_price))
            <p>最低価格：{{ $request->lowest_price }}万円</p>
        @endif
        @if(empty(request()->lowest_price) && !empty(request()->highest_price))
            <p>最高価格：{{ $request->highest_price }}万円</p>
        @endif
        @if(!empty(request()->lowest_price) && !empty(request()->highest_price))
            <p>最低価格：{{ $request->lowest_price }}万円〜最高価格：{{ $request->highest_price }}万円</p>
        @endif

        {{-- 専有面積 --}}
        @if(!empty(request()->lowest_occupation_area) && empty(request()->highest_occupation_area))
            <p>最低専有面積：{{ $request->lowest_occupation_area }}㎡</p>
        @endif
        @if(empty(request()->lowest_occupation_area) && !empty(request()->highest_occupation_area))
            <p>最高専有面積：{{ $request->highest_occupation_area }}㎡</p>
        @endif
        @if(!empty(request()->lowest_occupation_area) && !empty(request()->highest_occupation_area))
            <p>最低専有面積：{{ $request->lowest_occupation_area }}㎡〜最高専有面積：{{ $request->highest_occupation_area }}㎡</p>
        @endif

        {{-- 間取り --}}
        {{-- @if(!empty(request()->plan))
            <p>間取り：{{ $request->plan }}</p>
        @endif --}}

        {{-- 築年数 --}}
        @if(!empty(request()->old))
            <p>築年数：{{ $request->old }}年以内</p>
        @endif

        {{-- 最寄り駅 --}}
        @if(!empty(request()->station))
            <p>最寄り駅：{{ $request->station }}</p>
        @endif

        {{-- 駅徒歩 --}}
        @if(!empty(request()->walking_distance_station))
            <p>駅徒歩：{{ $request->walking_distance_station }}分</p>
        @endif
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
