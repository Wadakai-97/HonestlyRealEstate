@extends('layouts.admin')
@section('title', 'ブログ一覧')
@section('body')
<h2>ブログ一覧</h2>

<table class="list">
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
