@extends('layouts.admin')
@section('title', '土地一覧画面')
@section('body')
<h2>土地一覧</h2>
<table class="list">
    <thead>
        <colgroup>
            <col style="width: 20%;">
            <col style="width: 10%;">
            <col style="width: 15%;">
            <col style="width: 45%;">
            <col style="width: 5%;">
        </colgroup>
        <tr>
            <th>土地名</th>
            <th>土地面積</th>
            <th>価格</th>
            <th>住所</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody id="landList">
    </tbody>
</table>
@endsection
