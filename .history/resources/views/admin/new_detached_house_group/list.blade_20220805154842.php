@extends('layouts.admin')
@section('title', '新築分譲住宅：物件一覧')
@section('body')
<h2>新築分譲住宅：物件一覧</h2>
<table class="list">
    <colgroup>
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>分譲地名</th>
            <th>間取り</th>
            <th>価格</th>
            <th>土地面積</th>
            <th>建物面積</th>
            <th>住所</th>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($new_detached_house_groups as $new_detached_house_group)
            <tr>
                <td class="hidden">{{ $new_detached_house_group->id }}</td>
                <td>{{ $new_detached_house_group->name }}</td>
                <td>{{ $new_detached_house_group->lowest_number_of_rooms }}{{ $new_detached_house_group->lowest_type_of_room }}〜{{ $new_detached_house_group->highest_number_of_rooms }}{{ $new_detached_house_group->highest_type_of_room }}</td>
                <td>{{ $new_detached_house_group->lowest_price }}万円〜{{ $new_detached_house_group->highest_price }}万円</td>
                <td>{{ $new_detached_house_group->lowest_land_area }}㎡〜{{ $new_detached_house_group->highest_land_area }}㎡</td>
                <td>{{ $new_detached_house_group->lowest_building_area }}㎡〜{{ $new_detached_house_group->highest_building_area }}㎡</td>
                <td>{{ $new_detached_house_group->pref }}{{ $new_detached_house_group->municipalities }}{{ $new_detached_house_group->block }}</td>
                <td>
                    <form methid="POST" action="{{ route('admin.newDetachedHouseGroupRecommend.signUp', ['id' => $new_detached_house_group->id]) }}">
                        @csrf
                        <input type="submit" id="newDetachedHouseGroupRecommend" value="おすすめ登録">
                    </form>
                </td>
                <td><button onclick="location.href='{{ route('admin.newDetachedHouseGroup.detail', ['id' => $new_detached_house_group->id]) }}'">詳細</button></td>
                <td><button id="newDetachedHouseGroupDelete">削除</button></td>
            </tr>
        @empty
            <p>現在登録されている新築分譲住宅はありません。</p>
        @endforelse
    </tbody>
</table>

{{ $new_detached_house_groups->links() }}

@endsection
