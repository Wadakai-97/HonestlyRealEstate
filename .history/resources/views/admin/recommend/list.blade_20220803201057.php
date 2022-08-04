@extends('layouts.admin')
@section('title', 'おすすめ物件一覧')
@section('body')
<h2>おすすめ物件：登録済み一覧</h2><br>

    @if($lands->isNotEmpty())
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
                    <td>
                        <form action="{{ route('admin.recommend.delete', ['id' => $land->id]) }}">
                            @csrf
                            <input type="hidden" id="propertyId" name="land" value="{{ $land->id }}">
                            <input type="submit" id="recommendDelete" value="削除">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($mansions->isNotEmpty())
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
                    <td>
                        <input type="hidden" id="propertyId" name="mansion" value="{{ $mansion->id }}">
                        {{-- <form action="{{ route('admin.recommend.delete', ['id' => $mansion->id]) }}" method="post"> --}}

                            <input type="button" id="recommendDelete" value="{{ $mansion->id }}">削除
                        {{-- </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($new_detached_houses->isNotEmpty())
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
                    <td>
                        <form action="{{ route('admin.recommend.delete', ['id' => $new_detached_house->id]) }}">
                            @csrf
                            <input type="hidden" id="propertyId" name="new_detached_house" value="{{ $new_detached_house->id }}">
                            <input type="submit" id="recommendDelete" value="削除">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($new_detached_house_groups->isNotEmpty())
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
                    <td>
                        <form action="{{ route('admin.recommend.delete', ['id' => $new_detached_house_group->id]) }}">
                            @csrf
                            <input type="hidden" id="propertyId" name="new_detached_house_group" value="{{ $new_detached_house_group->id }}">
                            <input type="submit" id="recommendDelete" value="削除">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($old_detached_houses->isNotEmpty())
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
                    <td>
                        <form action="{{ route('admin.recommend.delete', ['id' => $old_detached_house->id]) }}">
                            @csrf
                            <input type="hidden" id="propertyId" name="old_detached_house" value="{{ $old_detached_house->id }}">
                            <input type="submit" id="recommendDelete" value="削除">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if($lands->isNotEmpty() && $mansions->isNotEmpty() && $new_detached_houses->isNotEmpty() && $new_detached_house_groups->isNotEmpty() && $old_detached_houses->isNotEmpty())
        <p>おすすめ登録された物件はありません。</p>
    @endif

@endsection
