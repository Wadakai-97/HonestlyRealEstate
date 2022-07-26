@extends('layouts.admin')
@section('title', '新築戸建：物件一覧')
@section('body')
<h2>新築戸建：物件一覧</h2>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif



<table class="list">
    <colgroup>
        <col style="width: 35%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>住所</th>
            <th>間取り</th>
            <th>価格</th>
            <th>土地面積</th>
            <th>建物面積</th>
            <th>土地権利</th>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($new_detached_houses as $new_detached_house)
            <tr>
                <td class="hidden">{{ $new_detached_house->id }}</td>
                <td>{{ $new_detached_house->pref }}{{ $new_detached_house->municipalities }}{{ $new_detached_house->block }}</td>
                <td>{{ $new_detached_house->number_of_rooms }}{{ $new_detached_house->type_of_room }}</td>
                <td>{{ $new_detached_house->price }}万円</td>
                <td>{{ $new_detached_house->land_area }}㎡</td>
                <td>{{ $new_detached_house->building_area }}㎡</td>
                <td>{{ $new_detached_house->land_right }}</td>
                <td>
                    <form methid="POST" action="{{ route('admin.newDetachedHouseRecommend.signUp', ['id' => $new_detached_house->id]) }}">
                        @csrf
                        <input type="submit" id="newDetachedHouseRecommend" value="★">
                    </form>
                </td>
                <td><button onclick="location.href='{{ route('admin.newDetachedHouse.detail', ['id' => $new_detached_house->id]) }}'">詳細</button></td>
                <td><button id="newDetachedHouseDelete">削除</button></td>
            </tr>
        @empty
            <p>現在登録されている新築戸建はありません。</p>
        @endforelse
    </tbody>
</table>

{{ $new_detached_houses->links() }}

@endsection
