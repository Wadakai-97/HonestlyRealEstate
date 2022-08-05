@extends('layouts.admin')
@section('title', 'マンション：検索結果')
@section('body')
<h2>マンション：絞り込み結果</h2>

<h3>絞り込み検索</h3>


<form action="{{ route('admin.mansion.search')}}" method="post">
    @csrf

    <label>都道府県</label>
    <input type="text" name="pref">

    <label>市区町村</label>
    <input type="text" name="municipalities">

    <label>建物名</label>
        <input type="text" name="apartment_name" value="">

    <label>間取り</label>
        <input type="number" name="number_of_rooms">
        <select>
            <option disabled selected>未選択</option>
            @foreach (PropertyInformationConsts::TYPE_OF_ROOM_LIST as $key => $type_of_room)
            <option value="{{ $key }}" name="type_of_room" @if(old('type_of_room') === $type_of_room) selected @endif>{{ $type_of_room }}</option>
            @endforeach
        </select>
    <label>最低価格</label>
        <input type="number" name="lowest_price">

        <label>最高価格</label>
        <input type="number" name="highest_price">

    <input type="submit" id="mansionSearch" value="検索">
</form>

<table>
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
            <th>号室</th>
            <th>間取り</th>
            <th>専有面積</th>
            <th>価格</th>
            <th>住所</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($mansions as $mansion)
        <tr>
            <td class="hidden"> {{ $mansion->id }}</td>
            <td>{{ $mansion->apartment_name }}</td>
            <td>{{ $mansion->number_of_rooms }}{{ $mansion->type_of_room }}</td>
            <td>{{ number_format($mansion->price) }}万円</td>
            <td>{{ $mansion->pref }}{{ $mansion->municipalities }}</td>
            <td><button onclick="location.href='{{ route('admin.mansion.detail', ['id' => $mansion->id]) }}'">詳細</button></td>
            <td><button id="mansionDelete">削除</button></td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $mansions->appends(request()->input())->links('pagination::default') }}

@endsection
