@extends('layouts.admin')
@section('title', 'マンション：物件一覧')
@section('body')
<h2>マンション：物件一覧</h2>

<h3>絞り込み検索</h3>

<form action="{{ route('admin.mansion.search')}}" method="post">
    @csrf
    <table>
        <thead><tr><th>絞り込み検索条件</th></tr></thead>
        <tbody>
            <tr>
                <th><label>都道府県</label></th>
                <td><input type="text" name="pref"></td>
                <th><label>市区町村</label></th>
                <td><input type="text" name="municipalities"></td>
                <th><label>建物名</label></th>
                <td><input type="text" name="apartment_name" value=""></td>
                <th><label>間取り</label></th>
                <td></td>
                <th></th>
                <td></td>
                <th></th>
                <td></td>
            </tr>



                
            <label>最低価格</label>
                <input type="number" name="lowest_price">

                <label>最高価格</label>
                <input type="number" name="highest_price">
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
