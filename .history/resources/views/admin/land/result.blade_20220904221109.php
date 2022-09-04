@extends('layouts.admin')
@section('title', '土地：検索結果')
@section('body')
<h3>土地：検索結果</h3>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form action="{{ route('admin.land.search')}}" method="post" class="filtering_form">
    @csrf
    <table class="filtering_table">
        <colgroup>
            <col style="width: 8%;">
            <col style="width: 42%;">
            <col style="width: 8%;">
            <col style="width: 42%;">
        </colgroup>
        <thead>
            <h3>検索条件</h3>
        </thead>
        <tbody>
            <tr>
                <th>住所</th>
                <td>
                    <input type="text" name="address">
                </td>
                <th>土地権利</th>
                <td>
                    <label for="land_right">
                        <select name="land_right">
                            <option disabled selected>-- 未選択 --</option>
                            @foreach (PropertyInformationConsts::LAND_RIGHT_LIST as $key => $land_right)
                            <option value="{{ $key }}" @if(old('land_right') === $land_right) selected @endif>{{ $land_right }}</option>
                            @endforeach
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <th>販売価格</th>
                <td>
                    <label for="lowest_price">
                        最低価格 ：
                        <select name="lowest_price">
                            <option disabled selected>-- 下限なし --</option>
                            @foreach (FilteringConsts::PRICE_LIST as $key => $lowest_price)
                            <option value="{{ $key }}" @if(old('lowest_price') === $lowest_price) selected @endif>{{ $lowest_price }}万円以上</option>
                            @endforeach
                        </select>
                    </label>
                    <label for="highest_price">
                        〜 最高価格：
                        <select name="highest_price">
                            <option disabled selected>-- 上限なし --</option>
                            @foreach (FilteringConsts::PRICE_LIST as $key => $highest_price)
                            <option value="{{ $key }}" @if(old('highest_price') === $highest_price) selected @endif>{{ $highest_price }}万円未満</option>
                            @endforeach
                        </select>
                    </label>
                </td>
                <th>土地面積</th>
                <td>
                    <label for="lowest_land_area">
                        最低面積 ：
                        <select name="lowest_land_area">
                            <option disabled selected>-- 下限なし --</option>
                            @foreach (FilteringConsts::LAND_AREA_LIST as $key => $lowest_land_area)
                            <option value="{{ $key }}" @if(old('lowest_land_area') === $lowest_land_area) selected @endif>{{ $lowest_land_area }}㎡以上</option>
                            @endforeach
                        </select>
                    </label>
                    <label for="highest_land_area">
                        〜 最高面積 ：
                        <select name="highest_land_area">
                            <option disabled selected>-- 上限なし --</option>
                            @foreach (FilteringConsts::LAND_AREA_LIST as $key => $highest_land_area)
                            <option value="{{ $key }}" @if(old('highest_land_area') === $highest_land_area) selected @endif>{{ $highest_land_area }}㎡未満</option>
                            @endforeach
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <th>最寄り駅</th>
                <td>
                    <input type="text">
                </td>
                <th>駅徒歩</th>
                <td>
                    <div class="multiple_answers">
                        <label for="walk1"><input type="radio" id="walk1" value="5" name="distance_station"> 5分以内</label>
                        <label for="walk2"><input type="radio" id="walk2" value="10" name="distance_station"> 10分以内</label>
                        <label for="walk3"><input type="radio" id="walk3" value="15" name="distance_station"> 15分以内</label>
                        <label for="walk4"><input type="radio" id="walk4" value="20" name="distance_station"> 20分以内</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="検索">
</form>

<form action="{{ route('admin.land.filteringCsv') }}">
    @csrf
    <input type="submit" value="CSV Download">
</form>

@if(!empty(request()))
    <div class="search_condition">
        <h4>現在の検索条件</h4>
        <p>
            @if(!empty(request()->address))
                【住所】{{ $request->address }}
            @endif
            @if(!empty(request()->land_right))
                【土地権利】{{ $request->land_right }}
            @endif
            @if(!empty(request()->lowest_price) && empty(request()->highest_price))
                【最低価格】{{ number_format($request->lowest_price }}万円
            @endif
            @if(empty(request()->lowest_price) && !empty(request()->highest_price))
                【最高価格】{{ number_format($request->highest_price }}万円
            @endif
            @if(!empty(request()->lowest_price) && !empty(request()->highest_price))
                【最低価格〜最高価格】{{ number_format($request->lowest_price }}万円〜{{ $request->highest_price }}万円
            @endif
            @if(!empty(request()->lowest_land_area) && empty(request()->highest_land_area))
                【最低土地面積】{{ $request->lowest_land_area }}㎡
            @endif
            @if(empty(request()->lowest_land_area) && !empty(request()->highest_land_area))
                【最高土地面積】{{ $request->highest_land_area }}㎡
            @endif
            @if(!empty(request()->lowest_land_area) && !empty(request()->highest_land_area))
                【最低土地面積〜最高土地面積】{{ $request->lowest_land_area }}㎡〜{{ $request->highest_land_area }}㎡
            @endif
            @if(!empty(request()->station))
                【最寄り駅】{{ $request->station }}
            @endif
            @if(!empty(request()->distance_station))
                【駅徒歩】{{ $request->distance_station }}分
            @endif
        </p>
    </div>
@endif

<table class="list">
    <colgroup>
        <col style="width: 38%;">
        <col style="width: 8%;">
        <col style="width: 8%;">
        <col style="width: 8%;">
        <col style="width: 8%;">
        <col style="width: 15%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>住所</th>
            <th>価格</th>
            <th>土地面積</th>
            <th>土地権利</th>
            <th>建築条件</th>
            <th>最寄り駅</th>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($lands as $land)
            <tr>
                <td class="hidden">{{ $land->id }}</td>
                <td>{{ $land->pref }}{{ $land->municipalities }}{{ $land->block }}</td>
                <td>{{ number_format($land->price) }}万円</td>
                <td>{{ number_format($land->land_area) }}㎡</td>
                <td>{{ $land->land_right }}</td>
                <td>{{ $land->construction_conditions }}</td>
                <td>{{ $land->station }}まで{{ $land->distance_station }}分</td>
                <td>
                    <form methid="POST" action="{{ route('admin.landRecommend.signUp', ['id' => $land->id]) }}">
                        @csrf
                        <input type="submit" id="landRecommend" value="★">
                    </form>
                </td>
                <td><button onclick="location.href='{{ route('admin.land.detail', ['id' => $land->id]) }}'">詳細</button></td>
                <td><button id="landDelete">削除</button></td>
            </tr>
        @empty
            <p>該当する土地はありません。</p>
        @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $lands->links('pagination::default') }}
</div>
@endsection
