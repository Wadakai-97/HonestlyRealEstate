@extends('layouts.admin')
@section('title', '新築戸建：物件一覧')
@section('body')
<h2>新築戸建：物件一覧</h2>
<table class="list">
    <col style="width: 15%;">
    <col style="width: 10%;">
    <col style="width: 10%;">
    <col style="width: 10%;">
    <col style="width: 10%;">
    <col style="width: 35%;">
    <col style="width: 5%;">
</colgroup>
    <thead>
        <colgroup>
        <tr>
            <th>建物名</th>
            <th>間取り</th>
            <th>価格</th>
            <th>土地面積</th>
            <th>建物面積</th>
            <th>住所</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody id="newDetachedHouseList">
    </tbody>
</table>
@endsection
