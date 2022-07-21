@extends('layouts.admin')
@section('title', 'ニュース：一覧表示')
@section('body')
<h2>ニュース：一覧表示</h2>
<table class="list">
    <thead>
        <colgroup>
            <col style="width: 30%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
        </colgroup>
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
