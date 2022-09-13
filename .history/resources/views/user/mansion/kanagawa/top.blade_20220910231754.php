@extends('layouts.user')
@section('title', 'マンション検索：神奈川')
@section('body')
<h3 class="part_title">検索条件</h3>

<form action="{{ route('mansion.kanagawa.search') }}" method="post" class="form">
    @csrf
    <h3>神奈川県</h3>
    <table class="single_table">
        <tbody>
            <tr>
                <th rowspan="6">横浜市</th>
                <td>
                    <div class="multiple_answers">
                        <label for="city1"><input type="checkbox" id="city1" value="横浜市鶴見区" name="city[]"> 鶴見区（{{ $yoko01 }}）</label>
                        <label for="city2"><input type="checkbox" id="city2" value="横浜市神奈川区" name="city[]"> 神奈川区（{{ $yoko02 }}）</label>
                        <label for="city3"><input type="checkbox" id="city3" value="横浜市西区" name="city[]"> 西区（{{ $yoko03 }}）</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="multiple_answers">
                        <label for="city4"><input type="checkbox" id="city4" value="横浜市中区" name="city[]"> 中区（{{ $yoko04 }}）</label>
                        <label for="city5"><input type="checkbox" id="city5" value="横浜市南区" name="city[]"> 南区（{{ $yoko05 }}）</label>
                        <label for="city6"><input type="checkbox" id="city6" value="横浜市保土ケ谷区" name="city[]"> 保土ケ谷区（{{ $yoko06 }}）</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="multiple_answers">
                        <label for="city7"><input type="checkbox" id="city7" value="横浜市磯子区" name="city[]"> 磯子区（{{ $yoko07 }}）</label>
                        <label for="city8"><input type="checkbox" id="city8" value="横浜市金沢区" name="city[]"> 金沢区（{{ $yoko08 }}）</label>
                        <label for="city9"><input type="checkbox" id="city9" value="横浜市港北区" name="city[]"> 港北区（{{ $yoko09 }}）</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="multiple_answers">
                        <label for="city10"><input type="checkbox" id="city10" value="横浜市戸塚区" name="city[]"> 戸塚区（{{ $yoko10 }}）</label>
                        <label for="city11"><input type="checkbox" id="city11" value="横浜市港南区" name="city[]"> 港南区（{{ $yoko11 }}）</label>
                        <label for="city12"><input type="checkbox" id="city12" value="横浜市旭区" name="city[]"> 旭区（{{ $yoko12 }}）</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="multiple_answers">
                        <label for="city13"><input type="checkbox" id="city13" value="横浜市緑区" name="city[]"> 緑区（{{ $yoko13 }}）</label>
                        <label for="city14"><input type="checkbox" id="city14" value="横浜市瀬谷区" name="city[]"> 瀬谷区（{{ $yoko14 }}）</label>
                        <label for="city15"><input type="checkbox" id="city15" value="横浜市栄区" name="city[]"> 栄区（{{ $yoko15 }}）</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="multiple_answers">
                        <label for="city16"><input type="checkbox" id="city16" value="横浜市緑区" name="city[]"> 緑区（{{ $yoko16 }}）</label>
                        <label for="city17"><input type="checkbox" id="city17" value="横浜市瀬谷区" name="city[]"> 瀬谷区（{{ $yoko17 }}）</label>
                        <label for="city18"><input type="checkbox" id="city18" value="横浜市栄区" name="city[]"> 栄区（{{ $yoko18 }}）</label>
                    </div>
                </td>
            </tr>
            <tr>
                <th rowspan="3">川崎市</th>
                <td>
                    <div class="multiple_answers">
                        <label for="city19"><input type="checkbox" id="city19" value="川崎市川崎区" name="city[]"> 川崎区（{{ $kawa01 }}）</label>
                        <label for="city20"><input type="checkbox" id="city20" value="川崎市幸区" name="city[]"> 幸区（{{ $kawa02 }}）</label>
                        <label for="city21"><input type="checkbox" id="city21" value="川崎市中原区" name="city[]"> 中原区（{{ $kawa03 }}）</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="multiple_answers">
                        <label for="city22"><input type="checkbox" id="city22" value="川崎市高津区" name="city[]"> 高津区（{{ $kawa04 }}）</label>
                        <label for="city23"><input type="checkbox" id="city23" value="川崎市多摩区" name="city[]"> 多摩区（{{ $kawa05 }}）</label>
                        <label for="city24"><input type="checkbox" id="city24" value="川崎市宮前区" name="city[]"> 宮前区（{{ $kawa06 }}）</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="multiple_answers">
                        <label for="city25"><input type="checkbox" id="city25" value="川崎市麻生区" name="city[]"> 麻生区（{{ $kawa04 }}）</label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>相模原市</th>
                <td>
                    <div class="multiple_answers">
                        <label for="city26"><input type="checkbox" id="city26" value="相模原市緑区" name="city[]"> 緑区（{{ $saga01 }}）</label>
                        <label for="city27"><input type="checkbox" id="city27" value="相模原市中央区" name="city[]"> 中央区（{{ $saga02 }}）</label>
                        <label for="city28"><input type="checkbox" id="city28" value="相模原市南区" name="city[]"> 南区（{{ $saga03 }}）</label>
                    </div>
                </td>
            </tr>
            <tr>
                <th rowspan="8">その他の地域</th>
                <td>
                    <div class="multiple_answers">
                        <label for="city29"><input type="checkbox" id="city29" value="横須賀市" name="city[]"> 横須賀市（{{ $yokosuka }}）</label>
                        <label for="city30"><input type="checkbox" id="city30" value="平塚市" name="city[]"> 平塚市（{{ $hiratsuka }}）</label>
                        <label for="city31"><input type="checkbox" id="city31" value="鎌倉市" name="city[]"> 鎌倉市（{{ $kamakura }}）</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="multiple_answers">
                        <label for="city32"><input type="checkbox" id="city32" value="藤沢市" name="city[]"> 藤沢市（{{ $ }}）</label>
                        <label for="city33"><input type="checkbox" id="city33" value="小田原市" name="city[]"> 小田原市（{{ $ }}）</label>
                        <label for="city34"><input type="checkbox" id="city34" value="茅ヶ崎市" name="city[]"> 茅ヶ崎市（{{ $ }}）</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="multiple_answers">
                        <label for="city35"><input type="checkbox" id="city35" value="逗子市" name="city[]"> 逗子市（{{ $ }}）</label>
                        <label for="city36"><input type="checkbox" id="city36" value="三浦市" name="city[]"> 三浦市（{{ $ }}）</label>
                        <label for="city37"><input type="checkbox" id="city37" value="南区" name="city[]"> 南区（{{ $ }}）</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="multiple_answers">
                        <label for="city38"><input type="checkbox" id="city38" value="緑区" name="city[]"> 緑区（{{ $ }}）</label>
                        <label for="city39"><input type="checkbox" id="city39" value="中央区" name="city[]"> 中央区（{{ $ }}）</label>
                        <label for="city40"><input type="checkbox" id="city40" value="南区" name="city[]"> 南区（{{ $ }}）</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="multiple_answers">
                        <label for="city41"><input type="checkbox" id="city41" value="緑区" name="city[]"> 緑区（{{ $ }}）</label>
                        <label for="city42"><input type="checkbox" id="city42" value="中央区" name="city[]"> 中央区（{{ $ }}）</label>
                        <label for="city43"><input type="checkbox" id="city43" value="南区" name="city[]"> 南区（{{ $ }}）</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="multiple_answers">
                        <label for="city44"><input type="checkbox" id="city44" value="緑区" name="city[]"> 緑区（{{ $ }}）</label>
                        <label for="city45"><input type="checkbox" id="city45" value="中央区" name="city[]"> 中央区（{{ $ }}）</label>
                        <label for="city46"><input type="checkbox" id="city46" value="南区" name="city[]"> 南区（{{ $ }}）</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="multiple_answers">
                        <label for="city47"><input type="checkbox" id="city47" value="緑区" name="city[]"> 緑区（{{ $ }}）</label>
                        <label for="city48"><input type="checkbox" id="city48" value="中央区" name="city[]"> 中央区（{{ $ }}）</label>
                        <label for="city49"><input type="checkbox" id="city49" value="南区" name="city[]"> 南区（{{ $ }}）</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="multiple_answers">
                        <label for="city50"><input type="checkbox" id="city50" value="緑区" name="city[]"> 緑区（{{ $ }}）</label>
                        <label for="city51"><input type="checkbox" id="city51" value="中央区" name="city[]"> 中央区（{{ $ }}）</label>
                        <label for="city52"><input type="checkbox" id="city52" value="南区" name="city[]"> 南区（{{ $ }}）</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="single_table">
        <tbody>
            <tr>
                <th>販売価格</th>
                <td>
                    <div class="form-group @if(!empty($errors->first('highest_price'))) has-error @endif">
                        <label for="lowest_price">
                            最低価格 ：
                            <select name="lowest_price">
                                <option disabled selected>-- 下限なし --</option>
                                @foreach (FilteringConsts::PRICE_LIST as $key => $lowest_price)
                                <option value="{{ $key }}" @if(old('lowest_price') === $lowest_price) selected @endif>{{ $lowest_price }}万円以上</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="highest_price">
                            〜 最高価格：
                            <select name="highest_price">
                                <option disabled selected>-- 上限なし --</option>
                                @foreach (FilteringConsts::PRICE_LIST as $key => $highest_price)
                                <option value="{{ $key }}" @if(old('highest_price') === $highest_price) selected @endif>{{ $highest_price }}万円未満</option>
                                @endforeach
                            </select>
                        </label>
                    <span class="help-block">{{$errors->first('highest_price')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>専有面積</th>
                <td>
                    <div class="form-group @if(!empty($errors->first('highest_occupation_area'))) has-error @endif">
                        <label for="lowest_occupation_area">
                            最低面積 ：
                            <select name="lowest_occupation_area">
                                <option disabled selected>-- 下限なし --</option>
                                @foreach (FilteringConsts::OCCUPATION_AREA_LIST as $key => $lowest_occupation_area)
                                <option value="{{ $key }}" @if(old('lowest_occupation_area') === $lowest_occupation_area) selected @endif>{{ $lowest_occupation_area }}㎡以上</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="highest_occupation_area">
                            〜 最高面積 ：
                            <select name="highest_occupation_area">
                                <option disabled selected>-- 上限なし --</option>
                                @foreach (FilteringConsts::OCCUPATION_AREA_LIST as $key => $highest_occupation_area)
                                <option value="{{ $key }}" @if(old('highest_occupation_area') === $highest_occupation_area) selected @endif>{{ $highest_occupation_area }}㎡未満</option>
                                @endforeach
                            </select>
                        </label>
                    <span class="help-block">{{$errors->first('highest_occupation_area')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>間取り</th>
                <td>
                    <div class="multiple_answers">
                        <label for="room1"><input type="checkbox" id="room1" value="1" name="plan[]"> 1K/DK/LDK/ワンルーム</label>
                        <label for="room2"><input type="checkbox" id="room2" value="2" name="plan[]"> 2K/DK/LDK</label>
                        <label for="room3"><input type="checkbox" id="room3" value="3" name="plan[]"> 3K/DK/LDK</label>
                        <label for="room4"><input type="checkbox" id="room4" value="4" name="plan[]"> 4K/DK/LDK</label>
                        <label for="room5"><input type="checkbox" id="room5"  value="5" name="plan[]" > 5K/DK/LDK以上</label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>築年数</th>
                <td>
                    <div class="multiple_answers">
                        <label for="old1"><input type="radio" id="old1" value="5" name="old"> 5年以内</label>
                        <label for="old2"><input type="radio" id="old2" value="10" name="old"> 10年以内</label>
                        <label for="old3"><input type="radio" id="old3" value="15" name="old"> 15年以内</label>
                        <label for="old4"><input type="radio" id="old4" value="20" name="old"> 20年以内</label>
                        <label for="old5"><input type="radio" id="old5" value="25" name="old"> 25年以内</label>
                        <label for="old6"><input type="radio" id="old6" value="30" name="old"> 30年以内</label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>最寄り駅</th>
                <td>
                    <div>
                        <p>エリア</p>
                        <select name="area" id="area">
                            <option value="">選択してください。</option>
                        </select>
                    </div>
                    <div>
                        <p>都道府県</p>
                        <select name="prefecture" id="prefecture">
                            <option value="">エリアを選択してください。</option>
                        </select>
                    </div>
                    <div>
                        <p>路線</p>
                        <select name="line" id="line">
                            <option value="">都道府県を選択してください。</option>
                        </select>
                    </div>
                    <div>
                        <p>駅</p>
                        <div class="form-group @if(!empty($errors->first('station'))) has-error @endif">
                            <select name="station" id="station">
                                <option value="">路線を選択してください。</option>
                            </select>
                            <span class="help-block">{{$errors->first('station')}}</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>駅徒歩</th>
                <td>
                    <div class="multiple_answers">
                        <label for="walk1"><input type="radio" id="walk1" value="5" name="distance_station"> 5分以内</label>
                        <label for="walk2"><input type="radio" id="walk2" value="10" name="distance_station"> 10分以内</label>
                        <label for="walk3"><input type="radio" id="walk3" value="15" name="distance_station"> 15分以内</label>
                        <label for="walk4"><input type="radio" id="walk4" value="20" name="distance_station"> 20分以内</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="この条件で検索する" class="btn"><br>
    <input type="reset" value="条件をクリアする" class="btn">
</form>
@endsection
