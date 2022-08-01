@extends('layouts.admin')
@section('title', 'おすすめ物件一覧')
@section('body')
<h2>おすすめ物件一覧</h2><br>

    @if(!empty($lands))
    <h3>土地</h3>
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
                    <th colspan=2></th>
                </tr>
            </thead>
            <tbody>
                @forelse($lands as $land)
                <tr>
                    <td>{{ $land->land->name }}</td>
                    <td>{{ $land->land->land_area }}㎡</td>
                    <td>{{ $land->land->price }}</td>
                    <td>{{ $land->land->pref }}{{ $land->land->municipalities }}{{ $land->land->block }}</td>
                    <td><input type="button" value="詳細"></td>
                    <td><input type="submit" value="削除"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if(isset($mansions))
    <h3>マンション</h3>
        <table class="list">
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
                    <td><input type="button" value="詳細"></td>
                    <td><input type="submit" value="削除"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if(!empty($new_detached_houses))
    <h3>新築戸建</h3>
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
                    <td>{{ $new_detached_house->new_detached_house->name }}</td>
                    <td>{{ $new_detached_house->new_detached_house->number_of_rooms }}{{ $new_detached_house->new_detached_house->type_of_room }}</td>
                    <td>{{ $new_detached_house->new_detached_house->price }}万円</td>
                    <td>{{ $new_detached_house->new_detached_house->land_area }}</td>
                    <td>{{ $new_detached_house->new_detached_house->building_area }}㎡</td>
                    <td>{{ $new_detached_house->new_detached_house->pref }}{{ $new_detached_house->new_detached_house->municipalities }}</td>
                    <td><input type="button" value="詳細"></td>
                    <td><input type="submit" value="削除"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if(!empty($new_detached_house_groups))
    <h3>新築分譲住宅</h3>
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
                    <td>{{ $new_detached_house_group->new_detached_house_group->name }}</td>
                    <td>{{ $new_detached_house_group->new_detached_house_group->lowest_number_of_rooms }}{{ $new_detached_house_group->new_detached_house_group->lowest_type_of_room }}〜{{ $new_detached_house_group->new_detached_house_group->highest_number_of_rooms }}{{ $new_detached_house_group->new_detached_house_group->highest_type_of_room }}</td>
                    <td>{{ $new_detached_house_group->new_detached_house_group->lowest_priceprice }}万円〜{{ $new_detached_house_group->new_detached_house_group->highest_priceprice }}万円</td>
                    <td>{{ $new_detached_house_group->new_detached_house_group->pref }}{{ $new_detached_house_group->new_detached_house_group->municipalities }}</td>
                    <td><input type="button" value="詳細"></td>
                    <td><input type="submit" value="削除"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if(!empty($old_detached_houses))
    <h3>中古戸建</h3>
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
                @forelse($old_detached_houses as $old_detached_house)
                <tr>
                    <td>{{ $old_detached_house->old_detached_house->name }}</td>
                    <td>{{ $old_detached_house->old_detached_house->number_of_rooms }}{{ $old_detached_house->old_detached_house->type_of_room }}</td>
                    <td>{{ $old_detached_house->old_detached_house->price }}万円</td>
                    <td>{{ $old_detached_house->old_detached_house->land_area }}</td>
                    <td>{{ $old_detached_house->old_detached_house->building_area }}㎡</td>
                    <td>{{ $old_detached_house->old_detached_house->pref }}{{ $old_detached_house->old_detached_house->municipalities }}</td>
                    <td><input type="button" value="詳細"></td>
                    <td><input type="submit" value="削除"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
