@extends('layouts.admin')
@section('title', '中古戸建：物件一覧')
@section('body')
<h2>中古戸建：物件一覧</h2>
<table class="list">
    <thead>
        <colgroup>
            <col style="width: 15%;">
            <col style="width: 10%;">
            <col style="width: 15%;">
            <col style="width: %;">
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
    <tbody id="oldDetachedHouseList">
    </tbody>
</table>
@endsection
