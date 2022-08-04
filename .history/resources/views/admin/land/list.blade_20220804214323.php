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
        @forelse($lands as $land)
            <tr>
                <td class="hidden">{{ $land->id }}</td>
                <td>{{ $land->apartment_name }}</td>
                <td>{{ $land->room }}</td>
                <td>{{ $land->number_of_rooms }}{{ $land->type_of_room }}</td>
                <td>{{ $land->occupation_area }}㎡</td>
                <td>{{ $land->price }}</td>
                <td>{{ $land->pref }}{{ $land->municipalities }}</td>
                <td>
                    <form methid="POST" action="{{ route('admin.landRecommend.signUp', ['id' => $land->id]) }}">
                        @csrf
                        <input type="submit" id="landRecommend" value="おすすめ登録">
                    </form>
                </td>
                <td><button onclick="location.href='{{ route('admin.land.detail', ['id' => $land->id]) }}'">詳細</button></td>
                <td><input type="submit" id="landDelete" value="削除"></td>
            </tr>
        @empty
            <p>現在登録されている土地はありません。</p>
        @endforelse
    </tbody>
</table>
@endsection
