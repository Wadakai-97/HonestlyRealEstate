@extends('layouts.admin')
@section('title', 'マンション：物件一覧')
@section('body')
<h2>マンション：物件一覧</h2>

<h3>絞り込み検索</h3>

<form action="" method="post">
    @csrf
    <label>マンション名</label>
        <input type="text" id="apartmentNameKeyword" value="">

    <label>間取り</label>
        <input type="number" id="numberOfRooms">
        <select>
            <option disabled selected>未選択</option>
            @foreach (PropertyInformationConsts::TYPE_OF_ROOM_LIST as $key => $type_of_room)
            <option value="{{ $key }}" id="typeOfRoom" @if(old('type_of_room') === $type_of_room) selected @endif>{{ $type_of_room }}</option>
            @endforeach
        </select>
    <label>最低価格</label>
        <input type="number" id="lowestPrice">

        <label>最高価格</label>
        <input type="number" id="highestPrice">

    <label>住所</label>
    <input type="text" id="address">

    <input type="submit" value="検索">
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
    <tbody id="mansionList">
    </tbody>
</table>


@endsection
