@extends('layouts.admin')
@section('title', 'おすすめ物件一覧')
@section('body')
<h2>おすすめ物件一覧</h2>
<table class="list">
    <colgroup>
        <col style="width: 15%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 35%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>物件名</th>
            <th>間取り</th>
            <th>価格</th>
            <th>土地面積</th>
            <th>建物面積</th>
            <th>住所</th>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            {{-- @if(!empty($recommends->mansion_id)) --}}
            @foreach()
            <td>あいうえお</td>
            <td>{{ $recommends->id }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            {{-- @endif --}}
        </tr>
    </tbody>
</table>
@endsection
