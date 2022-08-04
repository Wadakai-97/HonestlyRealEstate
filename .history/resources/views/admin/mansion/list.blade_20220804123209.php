@extends('layouts.admin')
@section('title', 'マンション：物件一覧')
@section('body')
<h2>マンション：物件一覧</h2>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form id="frm" method="post">
    住所を選択できます。<br /><br />
    <table>
     <tr><td>都道府県</td>
      <td><select name="state" onchange="state_select()">
       <option value="">↓(都道府県)</option>
       <option value="1">北海道</option>
       <option value="2">青森県</option>
       <option value="3">岩手県</option>
       <option value="4">宮城県</option>
       <option value="5">秋田県</option>
       <option value="6">山形県</option>
       <option value="7">福島県</option>
       <option value="8">茨城県</option>
       <option value="9">栃木県</option>
       <option value="10">群馬県</option>
       <option value="11">埼玉県</option>
       <option value="12">千葉県</option>
       <option value="13">東京都</option>
       <option value="14">神奈川県</option>
       <option value="15">新潟県</option>
       <option value="16">富山県</option>
       <option value="17">石川県</option>
       <option value="18">福井県</option>
       <option value="19">山梨県</option>
       <option value="20">長野県</option>
       <option value="21">岐阜県</option>
       <option value="22">静岡県</option>
       <option value="23">愛知県</option>
       <option value="24">三重県</option>
       <option value="25">滋賀県</option>
       <option value="26">京都府</option>
       <option value="27">大阪府</option>
       <option value="28">兵庫県</option>
       <option value="29">奈良県</option>
       <option value="30">和歌山県</option>
       <option value="31">鳥取県</option>
       <option value="32">島根県</option>
       <option value="33">岡山県</option>
       <option value="34">広島県</option>
       <option value="35">山口県</option>
       <option value="36">徳島県</option>
       <option value="37">香川県</option>
       <option value="38">愛媛県</option>
       <option value="39">高知県</option>
       <option value="40">福岡県</option>
       <option value="41">佐賀県</option>
       <option value="42">長崎県</option>
       <option value="43">熊本県</option>
       <option value="44">大分県</option>
       <option value="45">宮崎県</option>
       <option value="46">鹿児島県</option>
       <option value="47">沖縄県</option>
       </select>
      </td>
     </tr>
     <tr><td>市区町村</td>
      <td><select name="city" id="city" onchange="city_select()">
        <option value="">↓(市区町村)</option>
       </select>
      </td>
     </tr>
     <tr><td>町域</td>
      <td><select name="town" id="town" >
        <option value="">↓(町域)</option>
       </select>
      </td>
     </tr>
    </table>
    </form>

<form action="{{ route('admin.mansion.search')}}" method="post" class="filtering_form">
    @csrf
    <table class="filtering_table">
        <colgroup>
            <col style="width: 8%;">
            <col style="width: 22%;">
            <col style="width: 8%;">
            <col style="width: 22%;">
            <col style="width: 8%;">
            <col style="width: 22%;">
        </colgroup>
        <thead>
            <tr>
                <th colspan=6>絞り込み検索条件</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><label>都道府県</label></th>
                <td><input type="text" name="pref"></td>
                <th><label>市区町村</label></th>
                <td><input type="text" name="municipalities"></td>
                <th><label>建物名</label></th>
                <td><input type="text" name="apartment_name" value=""></td>
            </tr>
            <tr>
                <th><label>最低価格</label></th>
                <td><input type="number" name="lowest_price">万円</td>
                <th><label>最高価格</label></th>
                <td><input type="number" name="highest_price">万円</td>
                <th><label>間取り</label></th>
                <td>
                    <input type="number" name="number_of_rooms">
                    <select>
                        <option disabled selected>未選択</option>
                        @foreach (PropertyInformationConsts::TYPE_OF_ROOM_LIST as $key => $type_of_room)
                        <option value="{{ $key }}" name="type_of_room" @if(old('type_of_room') === $type_of_room) selected @endif>{{ $type_of_room }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th><label>最低専有面積</label></th>
                <td><input type="number" name="lowest_occupation_area">㎡</td>
                <th><label>最高専有面積</label></th>
                <td><input type="number" name="highest_occupation_area">㎡</td>
                <th><label>築年数</label></th>
                <td><input type="number" name="old">年以内</td>
            </tr>
            <tr>
                <th>最寄り駅</th>
                <td>
                    <p>エリア</p>
                    <select name="area" id="area">
                        <option value="">選択してください。</option>
                    </select>
                    <p>都道府県</p>
                    <select name="prefecture" id="prefecture">
                        <option value="">エリアを選択してください。</option>
                    </select>
                    <p>路線</p>
                    <select name="line" id="line">
                        <option value="">都道府県を選択してください。</option>
                    </select>
                    <p>駅</p>
                        <select name="station" id="station">
                            <option value="">路線を選択してください。</option>
                        </select>
                    <input type="number" name="walking_distance_station">分以内</td>
            </tr>
        </tbody>
    </table>

    <input type="submit" id="mansionSearch" value="検索">

</form>

<form action="{{ route('admin.mansion.csv') }}">
    @csrf
    <input type="submit" value="CSV Download">
</form>

<table class="list">
    <thead>
        <colgroup>
            <col style="width: 28%;">
            <col style="width: 7%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 15%;">
            <col style="width: 10%;">
        </colgroup>
        <tr>
            <th>建物名</th>
            <th>号室</th>
            <th>間取り</th>
            <th>専有面積</th>
            <th>価格</th>
            <th>住所</th>
            <th colspan="3"></th>
        </tr>
    </thead>
    <tbody id="mansionList">
    </tbody>
</table>


@endsection
