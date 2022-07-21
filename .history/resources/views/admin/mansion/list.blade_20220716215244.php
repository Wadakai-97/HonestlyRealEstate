@extends('layouts.admin')
@section('title', 'マンション：物件一覧')
@section('body')
<h2>マンション：物件一覧</h2>

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
        <thead><tr><th colspan=6>絞り込み検索条件</th></tr></thead>
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
                <th><label>最低価格</label></th>
                <td><input type="number" name="lowest_price"></td>
                <th><label>最高価格</label></th>
                <td><input type="number" name="highest_price"></td>
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
            <col style="width: 30%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 20%;">
            <col style="width: 5%;">
        </colgroup>
        <tr>
            <th>建物名</th>
            <th>間取り</th>
            <th>価格</th>
            <th>住所</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody id="mansionList">
    </tbody>
</table>


@endsection
