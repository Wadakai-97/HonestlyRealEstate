@extends('layouts.admin')
@section('title', 'お客様一覧')
@section('body')
<h2>お客様一覧</h2>

<table class="list">
    <thead>
        <tr>
            <th>お客様名</th>
            <th>種類</th>
            <th>お問い合わせ内容</th>
            <th></th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody id="customerList">
    </tbody>
</table>
@endsection
