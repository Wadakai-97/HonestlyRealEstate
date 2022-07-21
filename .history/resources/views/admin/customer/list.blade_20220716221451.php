@extends('layouts.admin')
@section('title', 'お客様一覧')
@section('body')
<h2>お客様一覧</h2>

<table class="list">
    <thead>
        <colgroup>
            <col style="width: 15%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 15%;">
            <col style="width: 5%;">
        </colgroup>
        <tr>
            <th>お客様名</th>
            <th>種類</th>
            <th>内容</th>
            <th>お問い合わせ日</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody id="customerList">
    </tbody>
</table>
@endsection
