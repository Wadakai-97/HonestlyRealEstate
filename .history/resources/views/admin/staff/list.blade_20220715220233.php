@extends('layouts.admin')
@section('title', 'スタッフ：一覧表示')
@section('body')
<h2>スタッフ:一覧表示</h2>
<table class="list">
    <thead>
        <colgroup>
            <col style="width: 90%;">
            <col style="width: 10%;">
        </colgroup>
        <tr>
            <th>スタッフ名</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody id="staffList">
    </tbody>
</table>
@endsection
