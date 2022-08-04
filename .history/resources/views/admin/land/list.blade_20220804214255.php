@extends('layouts.admin')
@section('title', '土地一覧画面')
@section('body')
<h2>土地一覧</h2>
<table class="list">
    <colgroup>
        <col style="width: 20%;">
        <col style="width: 10%;">
        <col style="width: 15%;">
        <col style="width: 45%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>土地名</th>
            <th>土地面積</th>
            <th>価格</th>
            <th>住所</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($mansions as $mansion)
        <tr>
            <td class="hidden">{{ $mansion->id }}</td>
            <td>{{ $mansion->apartment_name }}</td>
            <td>{{ $mansion->room }}</td>
            <td>{{ $mansion->number_of_rooms }}{{ $mansion->type_of_room }}</td>
            <td>{{ $mansion->occupation_area }}㎡</td>
            <td>{{ $mansion->price }}</td>
            <td>{{ $mansion->pref }}{{ $mansion->municipalities }}</td>
            <td>
                <form methid="POST" action="{{ route('admin.mansionRecommend.signUp', ['id' => $mansion->id]) }}">
                    @csrf
                    <input type="submit" id="mansionRecommend" value="おすすめ登録">
                </form>
            </td>
            <td><button onclick="location.href='{{ route('admin.mansion.detail', ['id' => $mansion->id]) }}'">詳細</button></td>
            <td><input type="submit" id="mansionDelete" value="削除"></td>
        </tr>
    @empty
        <p>現在登録されているマンションはありません。</p>
    @endforelse
    </tbody>
</table>
@endsection
