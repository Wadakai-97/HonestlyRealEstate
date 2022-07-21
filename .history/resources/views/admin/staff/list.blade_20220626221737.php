@extends('layouts.admin')
@section('title', '一覧画面')
@section('body')
<h2>スタッフ:一覧</h2>
<table class="list">
    <thead>
        <tr>
            <th>スタッフ名</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody id="staffList">
    </tbody>
</table>
@endsection
