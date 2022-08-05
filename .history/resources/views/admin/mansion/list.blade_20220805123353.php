@extends('layouts.admin')
@section('title', 'マンション：物件一覧')
@section('body')
<h2>マンション：物件一覧</h2>

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
            <tr>
                <th colspan=4>絞り込み検索条件</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>希望エリア</th>
                <td>
                    <select id="selectPref">
                        <option value="">-- 未選択 --</option>
                    </select>

                    <select id="selectMunicipalities">
                        <option value="">-- 未選択 --</option>
                    </select>
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
                <th>築年数</th>
                <td>
                    <div class="multiple_answers">
                        <label for="old1"><input type="radio" id="old1" value="" name="old"> 指定なし</label>
                        <label for="old2"><input type="radio" id="old2" value="5" name="old"> 5年以内</label>
                        <label for="old3"><input type="radio" id="old3" value="10" name="old"> 10年以内</label>
                        <label for="old4"><input type="radio" id="old4" value="15" name="old"> 15年以内</label>
                        <label for="old5"><input type="radio" id="old5" value="20" name="old"> 20年以内</label>
                        <label for="old6"><input type="radio" id="old6" value="25" name="old"> 25年以内</label>
                        <label for="old7"><input type="radio" id="old7" value="30" name="old"> 30年以内</label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>最寄り駅</th>
                <td colspan=3>
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

<form action="{{ route('admin.mansion.csv') }}">
    @csrf
    <input type="submit" value="CSV Download">
</form>

<table>
    <thead>
        <colgroup>
            <col style="width: 20%;">
            <col style="width: 5%;">
            <col style="width: 5%;">
            <col style="width: 5%;">
            <col style="width: 8%;">
            <col style="width: 8%;">
            <col style="width: 25%;">
            <col style="width: 10%;">
            <col style="width: 5%;">
        </colgroup>
        <tr>
            <th>建物名</th>
            <th>号室</th>
            <th>建築年</th>
            <th>間取り</th>
            <th>専有面積</th>
            <th>販売価格</th>
            <th>住所</th>
            <th>最寄り駅</th>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($mansions as $mansion)
            <tr>
                <td class="hidden">{{ $mansion->id }}</td>
                <td>{{ $mansion->apartment_name }}</td>
                <td>{{ $mansion->room }}</td>
                <td>{{ $mansion->year }}年</td>
                <td>{{ $mansion->number_of_rooms }}{{ $mansion->type_of_room }}</td>
                <td>{{ $mansion->occupation_area }}㎡</td>
                <td>{{ number_format($mansion->price) }}万円</td>
                <td>{{ $mansion->pref }}{{ $mansion->municipalities }}</td>
                <td>{{ $mansion->station }}まで{{ $mansion->walking_distance_station }}分</td>
                <td>
                    <form methid="POST" action="{{ route('admin.mansionRecommend.signUp', ['id' => $mansion->id]) }}">
                        @csrf
                        <input type="submit" id="mansionRecommend" value="★">
                    </form>
                </td>
                <td><button onclick="location.href='{{ route('admin.mansion.detail', ['id' => $mansion->id]) }}'">詳細</button></td>
                <td><form action="{{ route('admin.mansion.delete')"></form><button id="mansionDelete">削除</button></td>
            </tr>
        @empty
            <p>現在登録されているマンションはありません。</p>
        @endforelse
    </tbody>
</table>

    {{ $mansions->links() }}

@endsection
