@extends('layouts.admin')
@section('title', 'マンション：物件一覧')
@section('body')
<h2>マンション：物件一覧</h2>

<h3>絞り込み検索</h3>
<form action="" method="POST">
    @csrf
    <label>マンション名</label>
        <input type="text" id="apartmentNameKeyword" value="">

    <label>間取り</label>

    <label>最低価格</label>
    <label>最高価格</label>
    <label></label>

    <label for=""></label>
</form>

<form action="{{ route('admin.mansion.csv') }}">
@csrf
<input type="submit" value="物件情報一覧をダウンロードする">
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
