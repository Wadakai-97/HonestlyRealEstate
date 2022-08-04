@extends('layouts.admin')
@section('title', '新築分譲住宅：物件一覧')
@section('body')
<h2>新築分譲住宅：物件一覧</h2>
<table class="list">
    <colgroup>
        <col style="width: 20%;">
        <col style="width: 10%;">
        <col style="width: 15%;">
        <col style="width: 45%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>分譲地名</th>
            <th>間取り</th>
            <th>価格</th>
            <th>住所</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody id="newDetachedHouseGroupList">


    </tbody>
</table>
@endsection
