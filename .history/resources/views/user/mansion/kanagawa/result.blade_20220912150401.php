@extends('layouts.user')
@section('title', 'マンション：検索結果')
@section('body')

<form action="{{ route('mansion.kanagawa.search') }}" method="post" class="form">
    @csrf
    <table class="single_table">
        <tbody>
            <tr>
                <th>希望エリア</th>
                <td>
                    <select>
                        <option value="">-- 未選択 --</option>
                    </select>

                    <select>
                        <option value="">-- 未選択 --</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>販売価格</th>
                <td>
                    <div class="form-group @if(!empty($errors->first('highest_price'))) has-error @endif">
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
                    <span class="help-block">{{$errors->first('highest_price')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>専有面積</th>
                <td>
                    <div class="form-group @if(!empty($errors->first('highest_occupation_area'))) has-error @endif">
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
                    <span class="help-block">{{$errors->first('highest_occupation_area')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>間取り</th>
                <td>
                    <div class="multiple_answers">
                        <label for="room1"><input type="checkbox" id="room1" value="1" name="plan[]"> 1K/DK/LDK/ワンルーム</label>
                        <label for="room2"><input type="checkbox" id="room2" value="2" name="plan[]"> 2K/DK/LDK</label>
                        <label for="room3"><input type="checkbox" id="room3" value="3" name="plan[]"> 3K/DK/LDK</label>
                        <label for="room4"><input type="checkbox" id="room4" value="4" name="plan[]"> 4K/DK/LDK</label>
                        <label for="room5"><input type="checkbox" id="room5"  value="5" name="plan[]" > 5K/DK/LDK以上</label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>築年数</th>
                <td>
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
                        <label for="walk1"><input type="radio" id="walk1" value="5" name="distance_station"> 5分以内</label>
                        <label for="walk2"><input type="radio" id="walk2" value="10" name="distance_station"> 10分以内</label>
                        <label for="walk3"><input type="radio" id="walk3" value="15" name="distance_station"> 15分以内</label>
                        <label for="walk4"><input type="radio" id="walk4" value="20" name="distance_station"> 20分以内</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="この条件で検索する" class="btn"><br>
    <input type="reset" value="条件をクリアする" class="btn">
</form>

<h3 class="part_title">検索結果</h3>

<form action="{{ route('mansion.kanagawa.sort') }}" method="post">
    @csrf
    <select name="sort" onchange="submit(this.form)">
        <option disabled selected>-- 未選択 --</option>
        @foreach (FilteringConsts::MANSION_SORT_LIST as $key => $sort)
        <option value="{{ $sort }}" @if(old('sort') === $sort) selected @endif>{{ $sort }}</option>
        @endforeach
    </select>

    <input type="hidden" name="lowest_price" value="{{ $request->lowest_price }}">
    <input type="hidden" name="highest_price" value="{{ $request->highest_price }}">
    <input type="hidden" name="lowest_occupation_area" value="{{ $request->lowest_occupation_area }}">
    <input type="hidden" name="highest_occupation_area" value="{{ $request->highest_occupation_area }}">
    <input type="hidden" name="old" value="{{ $request->old }}">
    <input type="hidden" name="station" value="{{ $request->station }}">
    <input type="hidden" name="distance_station" value="{{ $request->distance_station }}">
    @if(!empty(request()->plan))
        @foreach($request->plan as $plan)
            <input type="hidden" name="plan[]" value="{{ $plan }}">
        @endforeach
    @endif
</form>

@if(!empty(request()))
    <div class="search_condition">
        <h4>現在の検索条件</h4>
        <p>
            @if(!empty(request()->address))
                【住所】{{ $request->address }}
            @endif
            @if(!empty(request()->apartment_name))
                【物件名】{{ $request->apartment_name }}
            @endif
            @if(!empty(request()->lowest_price) && empty(request()->highest_price))
                【最低価格】{{ number_format($request->lowest_price) }}万円
            @endif
            @if(empty(request()->lowest_price) && !empty(request()->highest_price))
                【最高価格】{{ number_format($request->highest_price) }}万円
            @endif
            @if(!empty(request()->lowest_price) && !empty(request()->highest_price))
                【最低価格〜最高価格】{{ number_format($request->lowest_price) }}万円〜{{ number_format($request->highest_price) }}万円
            @endif
            @if(!empty(request()->lowest_occupation_area) && empty(request()->highest_occupation_area))
                【最低専有面積】{{ number_format($request->lowest_occupation_area) }}㎡
            @endif
            @if(empty(request()->lowest_occupation_area) && !empty(request()->highest_occupation_area))
                【最高専有面積】{{ number_format($request->highest_occupation_area) }}㎡
            @endif
            @if(!empty(request()->lowest_occupation_area) && !empty(request()->highest_occupation_area))
                【最低専有面積〜最高専有面積】{{ number_format($request->lowest_occupation_area) }}㎡〜{{ number_format($request->highest_occupation_area) }}㎡
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
            @if(!empty(request()->old))
                【築年数】{{ $request->old }}年以内
            @endif
            @if(!empty(request()->station))
                【最寄り駅】{{ $request->station }}
            @endif
            @if(!empty(request()->distance_station))
                【駅徒歩】{{ $request->distance_station }}分
            @endif
            @if(!empty(request()->sort))
                【並び替え】{{ $request->sort }}
            @endif
        </p>
    </div>
@endif

<table class="result_table">
    <thead>
        <tr>
            <th>物件名</th>
            <th>販売価格</th>
            <th>所在地</th>
            <th>交通</th>
            <th>間取り</th>
            <th>専有面積</th>
            <th>所在階</th>
            <th>築年数</th>
            <th></th>
        </tr>
    </thead>
    @forelse ($mansions as $mansion)
        <tbody>
            <tr>
                <td><a href="{{ route('mansion.kanagawa.detail', ['id' => $mansion->id]) }}" class="font_link">{{ $mansion->apartment_name }}</a></td>
                <td>{{ number_format($mansion->price) }}万円</td>
                <td>{{ $mansion->pref }}{{ $mansion->municipalities }}</td>
                <td>「{{ $mansion->station }}」まで{{ $mansion->access_method }}{{ $mansion->distance_station }}分</td>
                <td>{{ $mansion->number_of_rooms }}{{ $mansion->type_of_room }}</td>
                <td>{{ $mansion->occupation_area }}㎡</td>
                <td>{{ $mansion->floor }}階/{{ $mansion->story }}</td>
                <td>{{ $today - $mansion->year }}年</td>
                <td>
                    @if(!empty($favorite))
                    @if($favori)
                    <form action="{{ route('mansion.favorite',  ['id' => $mansion->id]) }}" method="post">
                        @csrf
                        <input type="submit" value="お気に入り登録" class="btn">
                    </form>
                </td>
            </tr>
        </tbody>
    @empty
        <p>検索条件に一致する物件はありませんでした。</p>
    @endforelse
</table>

<div class="d-flex justify-content-center">
    {{ $mansions->appends(request()->input())->links('pagination::default') }}
</div>

@endsection
