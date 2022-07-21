@extends('layouts.admin')
@section('title', 'ブログ一覧')
@section('body')
<h2>ブログ一覧</h2>

<table class="list">
    <colgroup>
        <col style="width: 30%;">
        <col style="width: 10%;">
        <col style="width: 70%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>タイトル</th>
            <th>スタッフ</th>
            <th>内容</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody id="blogList">
    </tbody>
</table>
@endsection
