@extends('layouts.admin')
@section('title', '中古戸建：物件一覧')
@section('body')
<h2>中古戸建：物件一覧</h2>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form action="{{ route('admin.oldDetachedHouse.search')}}" method="post" class="filtering_form">
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
                <th>間取り</th>
                <td>
                    <div class="multiple_answers">
                        <label for="room1"><input type="checkbox" id="room1" value="1" name="plan[]"> 1K/DK/LDK/ワンルーム</label>
                        <label for="room2"><input type="checkbox" id="room2" value="2" name="plan[]"> 2K/DK/LDK</label>
                        <label for="room3"><input type="checkbox" id="room3" value="3" name="plan[]"> 3K/DK/LDK</label>
                        <label for="room4"><input type="checkbox" id="room4" value="4" name="plan[]"> 4K/DK/LDK</label>
                        <label for="room5"><input type="checkbox" id="room5"  value="5" name="plan[]" > 5K/DK/LDK</label>
                    </div>
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
                <th>建物面積</th>
                <td>
                    <label for="lowest_building_area">
                        最低面積 ：
                        <select name="lowest_building_area">
                            <option disabled selected>-- 下限なし --</option>
                            @foreach (FilteringConsts::BUILDING_AREA_LIST as $key => $lowest_building_area)
                            <option value="{{ $key }}" @if(old('lowest_building_area') === $lowest_building_area) selected @endif>{{ $lowest_building_area }}㎡以上</option>
                            @endforeach
                        </select>
                    </label>
                    <label for="highest_building_area">
                        〜 最高面積 ：
                        <select name="highest_building_area">
                            <option disabled selected>-- 上限なし --</option>
                            @foreach (FilteringConsts::BUILDING_AREA_LIST as $key => $highest_building_area)
                            <option value="{{ $key }}" @if(old('highest_building_area') === $highest_building_area) selected @endif>{{ $highest_building_area }}㎡未満</option>
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

    <input type="submit" value="検索">
</form>

<table class="list">
    <colgroup>
        <col style="width: 36%;">
        <col style="width: 8%;">
        <col style="width: 8%;">
        <col style="width: 8%;">
        <col style="width: 8%;">
        <col style="width: 8%;">
        <col style="width: 10%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>住所</th>
            <th>間取り</th>
            <th>価格</th>
            <th>土地権利</th>
            <th>築年数</th>
            <th>土地面積</th>
            <th>建物面積</th>
            <th>最寄り駅</th>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($old_detached_houses as $old_detached_house)
            <tr>
                <td class="hidden">{{ $old_detached_house->id }}</td>
                <td>{{ $old_detached_house->name }}</td>
                <td>{{ $old_detached_house->number_of_rooms }}{{ $old_detached_house->type_of_room }}</td>
                <td>{{ $old_detached_house->price }}万円</td>
                <td>{{ $old_detached_house->land_area }}㎡</td>
                <td>{{ $old_detached_house->building_area }}㎡</td>
                <td>{{ $old_detached_house->pref }}{{ $old_detached_house->municipalities }}{{ $old_detached_house->block }}</td>
                <td>
                    <form methid="POST" action="{{ route('admin.oldDetachedHouseRecommend.signUp', ['id' => $old_detached_house->id]) }}">
                        @csrf
                        <input type="submit" id="oldDetachedHouseRecommend" value="★">
                    </form>
                </td>
                <td><button onclick="location.href='{{ route('admin.oldDetachedHouse.detail', ['id' => $old_detached_house->id]) }}'">詳細</button></td>
                <td><button id="oldDetachedHouseDelete">削除</button></td>
            </tr>
        @empty
            <p>現在登録されている中古戸建はありません。</p>
        @endforelse
    </tbody>
</table>

{{ $old_detached_houses->links() }}

@endsection
