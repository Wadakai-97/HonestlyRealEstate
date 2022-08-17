@extends('layouts.user')
@section('title', '新築戸建:検索結果')
@section('body')
<form action="{{ route('new_detached_house.search') }}" method="post" class="form">
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
                    <label for="new_detached_house_right">
                        <select name="new_detached_house_right">
                            <option disabled selected>-- 未選択 --</option>
                            @foreach (PropertyInformationConsts::LAND_RIGHT_LIST as $key => $new_detached_house_right)
                            <option value="{{ $key }}" @if(old('new_detached_house_right') === $new_detached_house_right) selected @endif>{{ $new_detached_house_right }}</option>
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
                    <label for="lowest_new_detached_house_area">
                        最低面積 ：
                        <select name="lowest_new_detached_house_area">
                            <option disabled selected>-- 下限なし --</option>
                            @foreach (FilteringConsts::new_detached_house_AREA_LIST as $key => $lowest_new_detached_house_area)
                            <option value="{{ $key }}" @if(old('lowest_new_detached_house_area') === $lowest_new_detached_house_area) selected @endif>{{ $lowest_new_detached_house_area }}㎡以上</option>
                            @endforeach
                        </select>
                    </label>
                    <label for="highest_new_detached_house_area">
                        〜 最高面積 ：
                        <select name="highest_new_detached_house_area">
                            <option disabled selected>-- 上限なし --</option>
                            @foreach (FilteringConsts::new_detached_house_AREA_LIST as $key => $highest_new_detached_house_area)
                            <option value="{{ $key }}" @if(old('highest_new_detached_house_area') === $highest_new_detached_house_area) selected @endif>{{ $highest_new_detached_house_area }}㎡未満</option>
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
            @if(!empty(request()->new_detached_house_right))
                【土地権利】{{ $request->new_detached_house_right }}
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
            @if(!empty(request()->lowest_new_detached_house_area) && empty(request()->highest_new_detached_house_area))
                【最低土地面積】{{ $request->lowest_new_detached_house_area }}㎡
            @endif
            @if(empty(request()->lowest_new_detached_house_area) && !empty(request()->highest_new_detached_house_area))
                【最高土地面積】{{ $request->highest_new_detached_house_area }}㎡
            @endif
            @if(!empty(request()->lowest_new_detached_house_area) && !empty(request()->highest_new_detached_house_area))
                【最低土地面積〜最高土地面積】{{ $request->lowest_new_detached_house_area }}㎡〜{{ $request->highest_new_detached_house_area }}㎡
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
            <th>販売価格</th>
            <th>土地面積</th>
            <th>土地権利</th>
            <th>建築条件</th>
            <th>最寄り駅</th>
            <th>最終更新日</th>
        </tr>
    </thead>
    @forelse ($new_detached_houses as $new_detached_house)
        <tbody>
            <tr>
                <td><a href="{{ route('new_detached_house.detail', ['id' => $new_detached_house->id]) }}" class="font_link">{{ $new_detached_house->name }}</a></td>
                <td>{{ $new_detached_house->pref }}{{ $new_detached_house->municipalities }}</td>
                <td>{{ number_format($new_detached_house->price) }}万円</td>
                <td>{{ $new_detached_house->new_detached_house_area }}㎡</td>
                <td>{{ $new_detached_house->new_detached_house_right }}</td>
                <td>{{ $new_detached_house->construction_conditions }}</td>
                <td>{{ $new_detached_house->station }}まで{{ $new_detached_house->walking_distance_station }}分</td>
                <td>{{ $new_detached_house->updated_at->format('Y年m月d日') }}</td>
            </tr>
        </tbody>
    @empty
        <p>検索条件に一致する物件はありませんでした。</p>
    @endforelse
</table>

    {{ $new_detached_houses->appends(request()->input())->links() }}
@endsection
