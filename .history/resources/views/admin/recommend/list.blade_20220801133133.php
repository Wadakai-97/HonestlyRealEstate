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
        @forelse($recommends->unique('mansion_id') as $recommend)
        <tr>
            {{-- @if(!empty($recommends->mansion_id)) --}}
            <td>{{ $recommend->mansion->apartment_name }}</td>
            <td>{{ $recommend->mansion->number_of_rooms }}{{ $recommend->mansion->type_of_room }}</td>
            <td>{{ $recommend->mansion->price }}万円</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @empty
        <p>登録されている物件はありません。</p>
        @endforelse
    </tbody>
</table>
@endsection
