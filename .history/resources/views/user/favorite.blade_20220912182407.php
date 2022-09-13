@extends('layouts.user')
@section('title', 'お気に入り物件リスト')
@section('body')
@if($lands->isNotEmpty())
    <h3>土地</h3>
        <table>
            <colgroup>
                <col style="width: 20%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 30%;">
                <col style="width: 10%;">
            </colgroup>
            <thead>
                <tr>
                    <th>土地名</th>
                    <th>土地面積</th>
                    <th>土地権利</th>
                    <th>価格</th>
                    <th>住所</th>
                    <th colspan=3></th>
                </tr>
            </thead>
            <tbody>
                @forelse($lands as $land)
                <tr>
                    <td>{{ $land->land->name }}</td>
                    <td>{{ $land->land->land_area }}㎡</td>
                    <td>{{ $land->land->land_right }}</td>
                    <td>{{ $land->land->price }}万円</td>
                    <td>{{ $land->land->pref }}{{ $land->land->municipalities }}{{ $land->land->block }}</td>
                    <td>
                        <button onclick="location.href='{{ route('land.detail', ['id' => $land->land->id]) }}'">詳細</button>
                    </td>
                    <td>
                        <form method="POST" action="{{route('favorite.signOff', ['id' => $land->land->id])}}">
                            @csrf
                            @method('delete')
                            <input type="hidden" id="propertyId" name="land" value="{{ $land->land->id }}">
                            <input type="submit" value="お気に入り削除">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($mansions->isNotEmpty())
    <h3>マンション</h3>
        <table>
            <colgroup>
                <col style="width: 28%;">
                <col style="width: 7%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 15%;">
                <col style="width: 5%;">
            </colgroup>
            <thead>
                <tr>
                    <th>建物名</th>
                    <th>号室</th>
                    <th>間取り</th>
                    <th>専有面積</th>
                    <th>価格</th>
                    <th>住所</th>
                    <th colspan=2></th>
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
                    <td>
                        <button onclick="location.href='{{ route('mansion.detail', ['id' => $mansion->mansion->id]) }}'">詳細</button>
                    </td>
                    <td>
                        <form method="POST" action="{{route('amansionRecommend.delete', ['id' => $mansion->mansion->id])}}">
                            @csrf
                            @method('delete')
                            <input type="hidden" id="propertyId" name="mansion" value="{{ $mansion->mansion->id }}">
                            <input type="submit" value="お気に入り削除">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($new_detached_houses->isNotEmpty())
    <h3>新築戸建</h3>
        <table>
            <colgroup>
                <col style="width: 15%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 25%;">
                <col style="width: 10%;">
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
                    <td>{{ $new_detached_house->new_detached_house->name }}</td>
                    <td>{{ $new_detached_house->new_detached_house->number_of_rooms }}{{ $new_detached_house->new_detached_house->type_of_room }}</td>
                    <td>{{ $new_detached_house->new_detached_house->price }}万円</td>
                    <td>{{ $new_detached_house->new_detached_house->land_area }}㎡</td>
                    <td>{{ $new_detached_house->new_detached_house->building_area }}㎡</td>
                    <td>{{ $new_detached_house->new_detached_house->pref }}{{ $new_detached_house->new_detached_house->municipalities }}</td>
                    <td>
                        <button onclick="location.href='{{ route('admin.newDetachedHouse.detail', ['id' => $new_detached_house->new_detached_house->id]) }}'">詳細</button>
                    </td>
                    <td>
                        <form method="POST" action="{{route('admin.newDetachedHouseRecommend.delete', ['id' => $new_detached_house->new_detached_house->id])}}">
                            @csrf
                            @method('delete')
                            <input type="hidden" id="propertyId" name="new_detached_house" value="{{ $new_detached_house->new_detached_house->id }}">
                            <input type="submit" value="お気に入り削除">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($new_detached_house_groups->isNotEmpty())
    <h3>新築分譲住宅</h3>
        <table>
            <colgroup>
                <col style="width: 20%;">
                <col style="width: 10%;">
                <col style="width: 15%;">
                <col style="width: 35%;">
                <col style="width: 10%;">
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
                    <td>{{ $new_detached_house_group->new_detached_house_group->name }}</td>
                    <td>{{ $new_detached_house_group->new_detached_house_group->lowest_number_of_rooms }}{{ $new_detached_house_group->new_detached_house_group->lowest_type_of_room }}〜{{ $new_detached_house_group->new_detached_house_group->highest_number_of_rooms }}{{ $new_detached_house_group->new_detached_house_group->highest_type_of_room }}</td>
                    <td>{{ $new_detached_house_group->new_detached_house_group->lowest_price }}万円〜{{ $new_detached_house_group->new_detached_house_group->highest_price }}万円</td>
                    <td>{{ $new_detached_house_group->new_detached_house_group->pref }}{{ $new_detached_house_group->new_detached_house_group->municipalities }}</td>
                    <td>
                        <button onclick="location.href='{{ route('admin.newDetachedHouseGroup.detail', ['id' => $new_detached_house_group->new_detached_house_group->id]) }}'">詳細</button>
                    </td>
                    <td>
                        <form method="POST" action="{{route('admin.newDetachedHouseGroupRecommend.delete', ['id' => $new_detached_house_group->new_detached_house_group->id])}}">
                            @csrf
                            @method('delete')
                            <input type="hidden" id="propertyId" name="new_detached_house_group" value="{{ $new_detached_house_group->new_detached_house_group->id }}">
                            <input type="submit" value="お気に入り削除">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($old_detached_houses->isNotEmpty())
    <h3>中古戸建</h3>
        <table>
            <colgroup>
                <col style="width: 15%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 25%;">
                <col style="width: 10%;">
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
                @forelse($old_detached_houses as $old_detached_house)
                <tr>
                    <td>{{ $old_detached_house->old_detached_house->name }}</td>
                    <td>{{ $old_detached_house->old_detached_house->number_of_rooms }}{{ $old_detached_house->old_detached_house->type_of_room }}</td>
                    <td>{{ $old_detached_house->old_detached_house->price }}万円</td>
                    <td>{{ $old_detached_house->old_detached_house->land_area }}㎡</td>
                    <td>{{ $old_detached_house->old_detached_house->building_area }}㎡</td>
                    <td>{{ $old_detached_house->old_detached_house->pref }}{{ $old_detached_house->old_detached_house->municipalities }}</td>
                    <td>
                        <button onclick="location.href='{{ route('admin.oldDetachedHouse.detail', ['id' => $old_detached_house->old_detached_house->id]) }}'">詳細</button>
                    </td>
                    <td>
                        <form method="POST" action="{{route('admin.oldDetachedHouseRecommend.delete', ['id' => $old_detached_house->old_detached_house->id])}}">
                            @csrf
                            @method('delete')
                            <input type="hidden" id="propertyId" name="old_detached_house" value="{{ $old_detached_house->old_detached_house->id }}">
                            <input type="submit" value="お気に入り削除">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($lands->isEmpty() && $mansions->isEmpty() && $new_detached_houses->isEmpty() && $new_detached_house_groups->isEmpty() && $old_detached_houses->isEmpty())
        <h4>現在おすすめ登録された物件はありません。</h4>
    @endif

@endsection
