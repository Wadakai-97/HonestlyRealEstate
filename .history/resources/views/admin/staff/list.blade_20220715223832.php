@extends('layouts.admin')
@section('title', 'スタッフ：一覧表示')
@section('body')
<h2>スタッフ:一覧表示</h2>
<table class="list">
    <colgroup>
        <col style="width: 60%;">
        <col style="width: 20%;">
        <col style="width: 10%;">
    </colgroup>
    <thead>
        <tr>
            <th>スタッフ名</th>
            <th>役職</th>
            <th colspan=2></th>
        </tr>
    </thead>
    <tbody id="staffList">
    </tbody>
</table>
@endsection
