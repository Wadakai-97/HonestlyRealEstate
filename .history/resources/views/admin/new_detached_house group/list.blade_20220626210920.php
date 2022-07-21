@extends('layouts.admin')
@section('title', '一覧画面')
@section('body')
<h2>新築分譲住宅一覧</h2>
<table class="list">
    <thead>
        <tr>
            <th>建物名</th>
            <th>間取り</th>
            <th>価格</th>
            <th>住所</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody id="newDetachedHouseList">
    </tbody>
</table>
@endsection
