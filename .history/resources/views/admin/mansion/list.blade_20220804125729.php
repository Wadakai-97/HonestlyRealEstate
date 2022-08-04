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
            <col style="width: 22%;">
            <col style="width: 8%;">
            <col style="width: 22%;">
            <col style="width: 8%;">
            <col style="width: 22%;">
        </colgroup>
        <thead>
            <tr>
                <th colspan=6>絞り込み検索条件</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><label>都道府県</label></th>
                <td><input type="text" name="pref"></td>
                <th><label>市区町村</label></th>
                <td><input type="text" name="municipalities"></td>
                <th><label>建物名</label></th>
                <td><input type="text" name="apartment_name" value=""></td>
            </tr>
            <tr>
                <th><label>最低価格</label></th>
                <td><input type="number" name="lowest_price">万円</td>
                <th><label>最高価格</label></th>
                <td><input type="number" name="highest_price">万円</td>
                <th><label>間取り</label></th>
                <td>
                    <input type="number" name="number_of_rooms">
                    <select>
                        <option disabled selected>未選択</option>
                        @foreach (PropertyInformationConsts::TYPE_OF_ROOM_LIST as $key => $type_of_room)
                        <option value="{{ $key }}" name="type_of_room" @if(old('type_of_room') === $type_of_room) selected @endif>{{ $type_of_room }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th><label>最低専有面積</label></th>
                <td><input type="number" name="lowest_occupation_area">㎡</td>
                <th><label>最高専有面積</label></th>
                <td><input type="number" name="highest_occupation_area">㎡</td>
                <th><label>築年数</label></th>
                <td><input type="number" name="old">年以内</td>
            </tr>
            <tr>
                <th>最寄り駅</th>
                <td>
                    <p>エリア</p>
                    <select name="area" id="area">
                        <option value="">選択してください。</option>
                    </select>
                    <p>都道府県</p>
                    <select name="prefecture" id="prefecture">
                        <option value="">エリアを選択してください。</option>
                    </select>
                    <p>路線</p>
                    <select name="line" id="line">
                        <option value="">都道府県を選択してください。</option>
                    </select>
                    <p>駅</p>
                        <select name="station" id="station">
                            <option value="">路線を選択してください。</option>
                        </select>
                    <input type="number" name="walking_distance_station">分以内</td>
            </tr>
        </tbody>
    </table>

    <input type="submit" id="mansionSearch" value="検索">

</form>

<form action="{{ route('admin.mansion.csv') }}">
    @csrf
    <input type="submit" value="CSV Download">
</form>

<table class="list">
    <thead>
        <colgroup>
            <col style="width: 28%;">
            <col style="width: 7%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 15%;">
            <col style="width: 10%;">
        </colgroup>
        <tr>
            <th>建物名</th>
            <th>号室</th>
            <th>間取り</th>
            <th>専有面積</th>
            <th>価格</th>
            <th>住所</th>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($mansions as $mansion)
        <tr>
            <td>{{ $mansion->apartment_name }}</td>
            <td>{{ $mansion->room }}</td>
            <td>{{ $mansion->number_of_rooms }}{{ $mansion->type_of_room }}</td>
            <td>{{ $mansion->occupation_area }}㎡</td>
            <td>{{ $mansion->price }}</td>
            <td>{{ $mansion->pref }}{{ $mansion->municipalities }}</td>
            <td>
                <form method="POST" action="/public/mansion/recommend/{{ $mansion->id }}">
                    @csrf
                    <input type="submit" id="mansionRecommend" value="おすすめ登録">
                </form>
            </td>
            <td>
                <button id="mansionDetail" type="button" onclick="mansionDetail()">詳細</button>
            </td>
            <td>
                <form method="delete" action="/public/mansion/delete/{{ $mansion->id }}">
                    @csrf
                    <input type="submit" id="mansionDelete" value="削除">
                </form>
            </td>
        </tr>
        @empty
            <p>現在登録されているマンションはありません。</p>
        @endforelse
    </tbody>
</table><br>

{{ $mansions->appends(request()->input())->links('pagination::default') }}

@endsection
