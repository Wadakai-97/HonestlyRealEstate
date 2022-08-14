@extends('layouts.admin')
@section('title', '土地一覧画面')
@section('body')
<h2>土地一覧</h2>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form action="{{ route('admin.mansion.search')}}" method="post" class="filtering_form">
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

                <th>物件名</th>
                <td>
                    <input type="text">
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
                <th>専有面積</th>
                <td>
                    <label for="lowest_occupation_area">
                        最低面積 ：
                        <select name="lowest_occupation_area">
                            <option disabled selected>-- 下限なし --</option>
                            @foreach (FilteringConsts::OCCUPATION_AREA_LIST as $key => $lowest_occupation_area)
                            <option value="{{ $key }}" @if(old('lowest_occupation_area') === $lowest_occupation_area) selected @endif>{{ $lowest_occupation_area }}㎡以上</option>
                            @endforeach
                        </select>
                    </label>
                    <label for="highest_occupation_area">
                        〜 最高面積 ：
                        <select name="highest_occupation_area">
                            <option disabled selected>-- 上限なし --</option>
                            @foreach (FilteringConsts::OCCUPATION_AREA_LIST as $key => $highest_occupation_area)
                            <option value="{{ $key }}" @if(old('highest_occupation_area') === $highest_occupation_area) selected @endif>{{ $highest_occupation_area }}㎡未満</option>
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
                        <label for="walk1"><input type="radio" id="walk1" value="" name="walking_distance_station"> 指定なし</label>
                        <label for="walk2"><input type="radio" id="walk2" value="5" name="walking_distance_station"> 5分以内</label>
                        <label for="walk3"><input type="radio" id="walk3" value="10" name="walking_distance_station"> 10分以内</label>
                        <label for="walk4"><input type="radio" id="walk4" value="15" name="walking_distance_station"> 15分以内</label>
                        <label for="walk5"><input type="radio" id="walk5" value="20" name="walking_distance_station"> 20分以内</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" id="mansionSearch" value="検索">
</form>

<table class="list">
    <colgroup>
        <col style="width: 20%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 35%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>物件名</th>
            <th>土地面積</th>
            <th>土地権利</th>
            <th>価格</th>
            <th>住所</th>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($lands as $land)
            <tr>
                <td class="hidden">{{ $land->id }}</td>
                <td>{{ $land->name }}</td>
                <td>{{ $land->land_area }}㎡</td>
                <td>{{ $land->land_right }}</td>
                <td>{{ $land->price }}万円</td>
                <td>{{ $land->pref }}{{ $land->municipalities }}{{ $land->block }}</td>
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
            <p>現在登録されている土地はありません。</p>
        @endforelse
    </tbody>
</table>

{{ $lands->links() }}

@endsection
