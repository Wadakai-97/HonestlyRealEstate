@extends('layouts.admin')
@section('title', 'おすすめ物件一覧')
@section('body')
<h2>おすすめ物件一覧</h2>
    @if(!empty($recommends->mansion_id))
        <table class="list">
            <colgroup>
                <col style="width: 8%;">
                <col style="width: 22%;">
                <col style="width: 8%;">
                <col style="width: 22%;">
                <col style="width: 8%;">
                <col style="width: 22%;">
            </colgroup>
            <thead>
                <tr col>マンション</tr>
                <tr>
                    <th>建物名</th>
                    <th>号室</th>
                    <th>間取り</th>
                    <th>専有面積</th>
                    <th>価格</th>
                    <th>住所</th>
                    <th colspan="3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($recommends->unique('mansion_id') as $recommend)
                    <tr>
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
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
