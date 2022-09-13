@extends('layouts.user')
@section('title', 'お気に入り物件リスト')
@section('body')
@if($lands->isNotEmpty())
    <h3>土地</h3>
        <table>
            <colgroup>
                <col style="width: 30%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 20%;">
                <col style="width: 10%;">
            </colgroup>
            <thead>
                <tr>
                    <th>土地名</th>
                    <th>土地面積</th>
                    <th>土地権利</th>
                    <th>価格</th>
                    <th>住所</th>
                    <th colspan=2></th>
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
                        <a href="{{ route('land.detail', ['id' => $land->land->id]) }}">詳細</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('favorite.signOff', ['id' => $land->land->id]) }}">
                            @csrf
                            <input type="hidden" name="type" value="land">
                            <input type="submit" value="登録削除">
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
                <col style="width: 20%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 20%;">
                <col style="width: 10%;">
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
                    <th colspan=2></th>
                </tr>
            </thead>
            <tbody>
                @forelse($mansions as $mansion)
                <tr>
                    <td class="hidden">{{ $mansion->id }}</td>
                    <td class="hidden">mansion</td>
                    <td>{{ $mansion->mansion->apartment_name }}</td>
                    <td>{{ $mansion->mansion->room }}号室</td>
                    <td>{{ $mansion->mansion->number_of_rooms }}{{ $mansion->mansion->type_of_room }}</td>
                    <td>{{ $mansion->mansion->occupation_area }}㎡</td>
                    <td>{{ $mansion->mansion->price }}万円</td>
                    <td>{{ $mansion->mansion->pref }}{{ $mansion->mansion->municipalities }}</td>
                    <td>
                        <a href="{{ route('mansion.detail', ['id' => $mansion->mansion->id]) }}">詳細</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('favorite.signOff', ['id' => $mansion->mansion->id]) }}">
                            @csrf
                            <input type="hidden" name="type" value="mansion">
                            <input type="submit" value="登録削除">
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
                        <a href="{{ route('newDetachedHouse.detail', ['id' => $new_detached_house->new_detached_house->id]) }}">詳細</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('favorite.signOff', ['id' => $new_detached_house->new_detached_house->id]) }}">
                            @csrf
                            <input type="hidden" name="type" value="new_detached_house">
                            <input type="submit" value="登録削除">
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
                        <a href="{{ route('newDetachedHouse.detail', ['id' => $new_detached_house_group->new_detached_house_group->id]) }}">詳細</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('favorite.signOff', ['id' => $new_detached_house_group->new_detached_house_group->id]) }}">
                            @csrf
                            <input type="hidden" name="type" value="new_detached_house_group">
                            <input type="submit" value="登録削除">
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
                        <a href="{{ route('oldDetachedHouse.detail', ['id' => $old_detached_house->old_detached_house->id]) }}">詳細</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('favorite.signOff', ['id' => $old_detached_house->old_detached_house->id]) }}">
                            @csrf
                            <input type="hidden" name="type" value="old_detached_house">
                            <input type="submit" value="登録削除">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($lands->isEmpty() && $mansions->isEmpty() && $new_detached_houses->isEmpty() && $new_detached_house_groups->isEmpty() && $old_detached_houses->isEmpty())
        <h4>現在お気に入り登録された物件はありません。</h4>
    @endif

@endsection
