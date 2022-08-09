@extends('layouts.admin')
@section('title', '中古戸建：物件一覧')
@section('body')
<h2>中古戸建：物件一覧</h2>




<table class="list">
    <colgroup>
        <col style="width: 10%;">
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
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($old_detached_houses as $old_detached_house)
            <tr>
                <td class="hidden">{{ $old_detached_house->id }}</td>
                <td>{{ $old_detached_house->name }}</td>
                <td>{{ $old_detached_house->number_of_rooms }}{{ $old_detached_house->type_of_room }}</td>
                <td>{{ $old_detached_house->price }}万円</td>
                <td>{{ $old_detached_house->land_area }}㎡</td>
                <td>{{ $old_detached_house->building_area }}㎡</td>
                <td>{{ $old_detached_house->pref }}{{ $old_detached_house->municipalities }}{{ $old_detached_house->block }}</td>
                <td>
                    <form methid="POST" action="{{ route('admin.oldDetachedHouseRecommend.signUp', ['id' => $old_detached_house->id]) }}">
                        @csrf
                        <input type="submit" id="oldDetachedHouseRecommend" value="★">
                    </form>
                </td>
                <td><button onclick="location.href='{{ route('admin.oldDetachedHouse.detail', ['id' => $old_detached_house->id]) }}'">詳細</button></td>
                <td><button id="oldDetachedHouseDelete">削除</button></td>
            </tr>
        @empty
            <p>現在登録されている中古戸建はありません。</p>
        @endforelse
    </tbody>
</table>

{{ $old_detached_houses->links() }}

@endsection
