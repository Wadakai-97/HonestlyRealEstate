@extends('layouts.admin')
@section('title', '新築戸建：物件一覧')
@section('body')
<h2>新築戸建：物件一覧</h2>
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
            <th>建物名</th>
            <th>間取り</th>
            <th>価格</th>
            <th>土地面積</th>
            <th>建物面積</th>
            <th>住所</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($new_detached_houses as $new_detached_house)
            <tr>
                <td class="hidden">{{ $new_detached_house->id }}</td>
                <td>{{ $new_detached_house->apartment_name }}</td>
                <td>{{ $new_detached_house->room }}</td>
                <td>{{ $new_detached_house->number_of_rooms }}{{ $new_detached_house->type_of_room }}</td>
                <td>{{ $new_detached_house->occupation_area }}㎡</td>
                <td>{{ $new_detached_house->price }}</td>
                <td>{{ $new_detached_house->pref }}{{ $new_detached_house->municipalities }}</td>
                <td>
                    <form methid="POST" action="{{ route('admin.newDetachedHouseRecommend.signUp', ['id' => $new_detached_house->id]) }}">
                        @csrf
                        <input type="submit" id="newDetachedHouseRecommend" value="おすすめ登録">
                    </form>
                </td>
                <td><button onclick="location.href='{{ route('admin.new_detached_house.detail', ['id' => $new_detached_house->id]) }}'">詳細</button></td>
                <td><button id="newDetachedHouseDelete">削除</button></td>
            </tr>
        @empty
            <p>現在登録されているマンションはありません。</p>
        @endforelse
    </tbody>
</table>
@endsection
