@extends('layouts.admin')
@section('title', '中古戸建：検索結果')
@section('body')
<h3>中古戸建：検索結果</h3>

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
                        <label for="room1"><input type="checkbox" id="room1" value="1" name="plan[]">1K/DK/LDK/ワンルーム</label>
                        <label for="room2"><input type="checkbox" id="room2" value="2" name="plan[]">2K/DK/LDK</label>
                        <label for="room3"><input type="checkbox" id="room3" value="3" name="plan[]">3K/DK/LDK</label>
                        <label for="room4"><input type="checkbox" id="room4" value="4" name="plan[]">4K/DK/LDK</label>
                        <label for="room5"><input type="checkbox" id="room5"  value="5" name="plan[]" >5K/DK/LDK以上</label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>販売価格</th>
                <td>
                    <div class="form-group @if(!empty($errors->first('lowest_price'))) has-error @endif">
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
                    <span class="help-block">{{$errors->first('lowest_price')}}</span>
                    </div>
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
                    <div class="form-group @if(!empty($errors->first('lowest_land_area'))) has-error @endif">
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
                    <span class="help-block">{{$errors->first('lowest_land_area')}}</span>
                    </div>
                </td>
                <th>建物面積</th>
                <td>
                    <div class="form-group @if(!empty($errors->first('lowest_building_area'))) has-error @endif">
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
                    <span class="help-block">{{$errors->first('lowest_building_area')}}</span>
                    </div>
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
            <tr>
                <th>築年数</th>
                <td colspan=3>
                    <div class="multiple_answers">
                        <label for="old1"><input type="radio" id="old1" value="5" name="old"> 5年以内</label>
                        <label for="old2"><input type="radio" id="old2" value="10" name="old"> 10年以内</label>
                        <label for="old3"><input type="radio" id="old3" value="15" name="old"> 15年以内</label>
                        <label for="old4"><input type="radio" id="old4" value="20" name="old"> 20年以内</label>
                        <label for="old5"><input type="radio" id="old5" value="25" name="old"> 25年以内</label>
                        <label for="old6"><input type="radio" id="old6" value="30" name="old"> 30年以内</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="検索">
</form>

<form action="{{ route('admin.oldDetachedHouse.filteringCsv') }}">
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
            @if(!empty(request()->plan))
                【間取り】
                @foreach($request->plan as $plan)
                    @if($plan == 1)
                    1K/DK/LDK/ワンルーム
                    @elseif($plan > 1 && $plan < 5 && $plan != 5)
                    {{ $plan }}K/DK/LDK
                    @elseif($plan = 5)
                    5K/DK/LDK以上
                    @endif
                @endforeach
            @endif
            @if(!empty(request()->lowest_price) && empty(request()->highest_price))
                【最低価格】{{ $request->lowest_price }}万円
            @endif
            @if(empty(request()->lowest_price) && !empty(request()->highest_price))
                【最高価格】{{ $request->highest_price }}万円
            @endif
            @if(!empty(request()->lowest_price) && !empty(request()->highest_price))
                【最低価格〜最高価格】{{ $request->lowest_price }}万円〜{{ $request->highest_price }}万円
            @endif
            @if(!empty(request()->land_right))
                【土地権利】{{ $request->land_right }}
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
            @if(!empty(request()->lowest_building_area) && empty(request()->highest_building_area))
                【最低建物面積】{{ number_format($request->lowest_building_area }}㎡
            @endif
            @if(empty(request()->lowest_building_area) && !empty(request()->highest_building_area))
                【最高建物面積】{{ number_format($request->highest_building_area) }}㎡
            @endif
            @if(!empty(request()->lowest_building_area) && !empty(request()->highest_building_area))
                【最低建物面積〜最高建物面積】{{ number_format($request->lowest_building_area) }}㎡〜{{ number_format($request->highest_building_area) }}㎡
            @endif
            @if(!empty(request()->station))
                【最寄り駅】{{ $request->station }}
            @endif
            @if(!empty(request()->distance_station))
                【駅徒歩】{{ $request->distance_station }}分
            @endif
            @if(!empty(request()->old))
                【築年数】{{ $request->old }}年以内
            @endif
        </p>
    </div>
@endif

<table class="list">
    <colgroup>
        <col style="width: 27%;">
        <col style="width: 8%;">
        <col style="width: 8%;">
        <col style="width: 8%;">
        <col style="width: 8%;">
        <col style="width: 8%;">
        <col style="width: 10%;">
        <col style="width: 8%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>住所</th>
            <th>間取り</th>
            <th>価格</th>
            <th>土地権利</th>
            <th>土地面積</th>
            <th>建物面積</th>
            <th>最寄り駅</th>
            <th>完成年</th>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($old_detached_houses as $old_detached_house)
            <tr>
                <td class="hidden">{{ $old_detached_house->id }}</td>
                <td>{{ $old_detached_house->pref }}{{ $old_detached_house->municipalities }}{{ $old_detached_house->block }}</td>
                <td>{{ $old_detached_house->number_of_rooms }}{{ $old_detached_house->type_of_room }}</td>
                <td>{{ number_format($old_detached_house->price) }}万円</td>
                <td>{{ $old_detached_house->land_right }}</td>
                <td>{{ number_format($old_detached_house->land_area) }}㎡</td>
                <td>{{ number_format($old_detached_house->building_area) }}㎡</td>
                <td>{{ $old_detached_house->station }}まで{{ $old_detached_house->distance_station }}分</td>
                <td>{{ $old_detached_house->year }}年</td>
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
<div class="d-flex justify-content-center">
    {{ $old_detached_houses->links() }}
</div>
@endsection
