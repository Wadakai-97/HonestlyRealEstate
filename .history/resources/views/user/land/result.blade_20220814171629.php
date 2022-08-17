@extends('layouts.user')
@section('title', '土地：検索結果')
@section('body')

<form action="{{ route('land.search') }}" method="post" class="form">
    @csrf
    <table class="single_table">
        <tbody>
            <tr>
                <th>住所</th>
                <td>
                    <input type="text" name="address">
                </td>
            </tr>
            <tr>
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
            </tr>
            <tr>
                <th>最寄り駅</th>
                <td>
                    <div>
                        <p>エリア</p>
                        <select name="area" id="area">
                            <option value="">選択してください。</option>
                        </select>
                    </div>
                    <div>
                        <p>都道府県</p>
                        <select name="prefecture" id="prefecture">
                            <option value="">エリアを選択してください。</option>
                        </select>
                    </div>
                    <div>
                        <p>路線</p>
                        <select name="line" id="line">
                            <option value="">都道府県を選択してください。</option>
                        </select>
                    </div>
                    <div>
                        <p>駅</p>
                        <div class="form-group @if(!empty($errors->first('station'))) has-error @endif">
                            <select name="station" id="station">
                                <option value="">路線を選択してください。</option>
                            </select>
                            <span class="help-block">{{$errors->first('station')}}</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>駅徒歩</th>
                <td>
                    <div class="multiple_answers">
                        <label for="walk1"><input type="radio" id="walk1" value="5" name="walking_distance_station"> 5分以内</label>
                        <label for="walk2"><input type="radio" id="walk2" value="10" name="walking_distance_station"> 10分以内</label>
                        <label for="walk3"><input type="radio" id="walk3" value="15" name="walking_distance_station"> 15分以内</label>
                        <label for="walk4"><input type="radio" id="walk4" value="20" name="walking_distance_station"> 20分以内</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="この条件で検索する" class="btn"><br>
    <input type="reset" value="条件をクリアする" class="btn">
</form>

<h3 class="part_title">検索結果</h3>

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
                【最低価格】{{ $request->lowest_price }}万円
            @endif
            @if(empty(request()->lowest_price) && !empty(request()->highest_price))
                【最高価格】{{ $request->highest_price }}万円
            @endif
            @if(!empty(request()->lowest_price) && !empty(request()->highest_price))
                【最低価格〜最高価格】{{ $request->lowest_price }}万円〜{{ $request->highest_price }}万円
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
            @if(!empty(request()->walking_distance_station))
                【駅徒歩】{{ $request->walking_distance_station }}分
            @endif
        </p>
    </div>
@endif

<table class="result_table">
    <thead>
        <tr>
            <th>物件名</th>
            <th>住所</th>
            
            <th>最終更新日</th>
        </tr>
    </thead>
    @forelse ($lands as $land)
        <tbody>
            <tr>
                <td><a href="{{ route('land.detail', ['id' => $land->id]) }}" class="font_link">{{ $land->name }}</a></td>
                <td>{{ number_format($land->price) }}万円</td>
                <td>{{ $land->pref }}{{ $land->municipalities }}</td>
                <td>「{{ $land->station }}」徒歩{{ $land->walking_distance_station }}分</td>
                <td>{{ $land->number_of_rooms }}{{ $land->type_of_room }}</td>
                <td>{{ $land->occupation_area }}㎡</td>
                <td>{{ $land->floor }}階/{{ $land->story }}</td>
                <td>{{ $today - $land->year }}年</td>
                <td>{{ $land->updated_at->format('Y年m月d日') }}</td>
            </tr>
        </tbody>
    @empty
        <p>検索条件に一致する物件はありませんでした。</p>
    @endforelse
</table>

    {{ $lands->appends(request()->input())->links() }}
@endsection
