@extends('layouts.admin')
@section('title', '新築分譲住宅：物件一覧')
@section('body')
<h2>新築分譲住宅：物件一覧</h2>
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
            <th>分譲地名</th>
            <th>間取り</th>
            <th>価格</th>
            <th>住所</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($new_detached_house_groups as $new_detached_house_group)
            <tr>
                <td class="hidden">{{ $new_detached_house_group->id }}</td>
                <td>{{ $new_detached_house_group->name }}</td>
                <td>{{ $new_detached_house_group->number_of_rooms }}{{ $new_detached_house_group->type_of_room }}</td>
                <td>{{ $new_detached_house_group->price }}</td>
                <td>{{ $new_detached_house_group->land_area }}㎡</td>
                <td>{{ $new_detached_house_group->building_area }}㎡</td>
                <td>{{ $new_detached_house_group->pref }}{{ $new_detached_house_group->municipalities }}{{ $new_detached_house_group->block }}</td>
                <td>
                    <form methid="POST" action="{{ route('admin.newDetachedHouseGroup@Recommend.signUp', ['id' => $new_detached_house_group->id]) }}">
                        @csrf
                        <input type="submit" id="newDetachedHouseRecommend" value="おすすめ登録">
                    </form>
                </td>
                <td><button onclick="location.href='{{ route('admin.new_detached_house_group.detail', ['id' => $new_detached_house_group->id]) }}'">詳細</button></td>
                <td><button id="newDetachedHouseDelete">削除</button></td>
            </tr>
        @empty
            <p>現在登録されているマンションはありません。</p>
        @endforelse
    </tbody>
</table>
@endsection
