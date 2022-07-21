@extends('layouts.admin')
@section('title', 'マンション：物件一覧')
@section('body')
<h2>マンション：物件一覧</h2>

<h3>絞り込み検索</h3>

<form action="{{ route('admin.mansion.search')}}" method="post">
    @csrf

    <label>都道府県</label>
    <input type="text" name="prefKeyword">

    <label>市区町村</label>
    <input type="text" name="municipalitiesKeyword">

    <label>建物名</label>
        <input type="text" name="apartmentNameKeyword" value="">

    <label>間取り</label>
        <input type="number" name="numberOfRooms">
        <select>
            <option disabled selected>未選択</option>
            @foreach (PropertyInformationConsts::TYPE_OF_ROOM_LIST as $key => $type_of_room)
            <option value="{{ $key }}" name="typeOfRoom" @if(old('type_of_room') === $type_of_room) selected @endif>{{ $type_of_room }}</option>
            @endforeach
        </select>
    <label>最低価格</label>
        <input type="number" name="lowestPrice">

        <label>最高価格</label>
        <input type="number" name="highestPrice">

    <input type="submit" id="mansionSearch" value="検索">
</form>

<form action="{{ route('admin.mansion.csv') }}">
    @csrf
    <input type="submit" value="Download CSV">
</form>

<table class="list">
    <thead>
        <colgroup>
            <col style="width: 30%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 30%;">
            <col style="width: 10%;">
        </colgroup>
        <tr>
            <th>建物名</th>
            <th>間取り</th>
            <th>価格</th>
            <th>住所</th>
            <th colspan="2"></th>
        </tr>
    </thead>
        @foreach($mansions as $mansion)
        <tr>
            <td>{{ $mansion->apartment_name }}</td>
            <td>{{ $mansion->number_of_rooms }}{{ $mansion-></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endforeach
    <tbody id="mansionList">
    </tbody>
</table>

{{ $mansions->appends(request()->input())->links('pagination::default') }}

@endsection
