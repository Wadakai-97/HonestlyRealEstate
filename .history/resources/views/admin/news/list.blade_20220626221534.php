@extends('layouts.admin')
@section('title', '一覧表示')
@section('body')
<h2>ニュース：一覧表示</h2>
<table class="list">
    <thead>
        <tr>
            <th>タイトル</th>
            <th>本文</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody id="newsList">
    </tbody>
</table>
@endsection
