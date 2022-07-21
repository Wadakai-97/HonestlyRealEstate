@extends('layouts.admin')
@section('title', 'マンション：物件一覧')
@section('body')
<h2>マンション：物件一覧</h2>
<form action="{{ name('admin.mansion.csv') }}">
@csrf
<input type="submit" value="">
</form>

<table class="list">
    <thead>
        <tr>
            <th>建物名</th>
            <th>間取り</th>
            <th>価格</th>
            <th>住所</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody id="mansionList">
    </tbody>
</table>
@endsection
