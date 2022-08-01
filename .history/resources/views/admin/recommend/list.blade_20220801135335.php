@extends('layouts.admin')
@section('title', 'おすすめ物件一覧')
@section('body')
<h2>おすすめ物件一覧</h2>
    @if(!empty($mansions))
    <h3></h3>
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
                @forelse($mansions as $mansion)
                <tr>
                    <td>{{ $mansion->mansion->apartment_name }}</td>
                    <td>{{ $mansion->mansion->room }}号室</td>
                    <td>{{ $mansion->mansion->number_of_rooms }}{{ $mansion->mansion->type_of_room }}</td>
                    <td>{{ $mansion->mansion->occupation_area }}㎡</td>
                    <td>{{ $mansion->mansion->price }}万円</td>
                    <td>{{ $mansion->mansion->pref }}{{ $mansion->mansion->municipalities }}</td>
                    <td><input type="submit" value="削除"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
