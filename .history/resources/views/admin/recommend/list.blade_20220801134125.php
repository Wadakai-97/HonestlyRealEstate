@extends('layouts.admin')
@section('title', 'おすすめ物件一覧')
@section('body')
<h2>おすすめ物件一覧</h2>
    @if(!empty($recommends))
        <table class="list">
            <colgroup>
                <col style="width: 28%;">
                <col style="width: 7%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 15%;">
                <col style="width: 10%;">
            </colgroup>
            <thead>
                <tr>
                    <th>建物名</th>
                    <th>号室</th>
                    <th>間取り</th>
                    <th>専有面積</th>
                    <th>価格</th>
                    <th>住所</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($recommends as $recommend)
                <tr>
                    <td>{{ $recommend->mansion->apartment_name }}</td>
                    <td>{{ $recommend->mansion->room }}</td>
                    <td>{{ $recommend->mansion->number_of_rooms }}{{ $recommend->mansion->type_of_room }}</td>
                    <td>{{ $recommend->mansion->occupation_area }}㎡</td>
                    <td>{{ $recommend->mansion->price }}万円</td>
                    <td>{{ $recommend->mansion->pref }}{{ $recommend->mansion->municipalities }}</td>
                    <td><input type="submit" value="削除"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
