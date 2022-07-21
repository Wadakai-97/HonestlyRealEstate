@extends('layouts.admin')
@section('title', '土地一覧画面')
@section('body')
<h2>土地一覧</h2>
<table class="list">
    <thead>
        <tr>
            <th>建物名</th>
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
