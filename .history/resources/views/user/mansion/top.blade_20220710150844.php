@extends('layouts.user')
@section('title', 'マンション検索')
@section('body')
<h3 class="part_title">検索画面</h1>
<form action="{{ route('mansion.search') }}" method="post" class="form">
    @csrf
    <table>
        <tbody>
            <tr>
                <th>希望エリア</th>
                <td colspan=3>
                    <div class="multiple_answers">
                        <label for="pref1"><input type="checkbox" id="pref1" value="東京都" name="pref[]"> 東京都</label>
                        <label for="pref2"><input type="checkbox" id="pref2" value="神奈川県" name="pref[]"> 神奈川県</label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>販売価格</th>
                <td colspan=3>
                    <div class="multiple_answers">
                        最低価格 ：
                        <select name="lowest_price">
                            <option disabled selected>-- 下限なし --</option>
                            <option value="1000">1,000万円以上</option>
                            <option value="2000">2,000万円以上</option>
                            <option value="3000">3,000万円以上</option>
                            <option value="4000">4,000万円以上</option>
                            <option value="5000">5,000万円以上</option>
                            <option value="6000">6,000万円以上</option>
                            <option value="7000">7,000万円以上</option>
                            <option value="8000">8,000万円以上</option>
                            <option value="9000">9,000万円以上</option>
                            <option value="10000">1億円以上</option>
                        </select>
                        〜 最高価格：
                        <select name="highest_price">
                            <option disabled selected>-- 上限なし --</option>
                            <option value="1000">1,000万円未満</option>
                            <option value="2000">2,000万円未満</option>
                            <option value="3000">3,000万円未満</option>
                            <option value="4000">4,000万円未満</option>
                            <option value="5000">5,000万円未満</option>
                            <option value="6000">6,000万円未満</option>
                            <option value="7000">7,000万円未満</option>
                            <option value="8000">8,000万円未満</option>
                            <option value="9000">9,000万円未満</option>
                            <option value="10000">1億円未満</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <th>専有面積</th>
                <td colspan=3>
                    最低面積 ：
                    <select name="lowest_occupation_area">
                        <option disabled selected>-- 下限なし --</option>
                        <option value="30">30㎡以上</option>
                        <option value="40">40㎡以上</option>
                        <option value="50">50㎡以上</option>
                        <option value="60">60㎡以上</option>
                        <option value="70">70㎡以上</option>
                        <option value="80">80㎡以上</option>
                        <option value="90">90㎡以上</option>
                        <option value="100">100㎡以上</option>
                        <option value="110">110㎡以上</option>
                        <option value="120">120㎡以上</option>
                        <option value="130">130㎡以上</option>
                        <option value="140">140㎡以上</option>
                        <option value="150">150㎡以上</option>
                        <option value="160">160㎡以上</option>
                        <option value="170">170㎡以上</option>
                        <option value="180">180㎡以上</option>
                        <option value="190">190㎡以上</option>
                        <option value="200">200㎡以上</option>
                    </select>
                    〜 最高面積 ：
                    <select name="highest_occupation_area">
                        <option disabled selected>-- 上限なし --</option>
                        <option value="40">40㎡未満</option>
                        <option value="50">50㎡未満</option>
                        <option value="60">60㎡未満</option>
                        <option value="70">70㎡未満</option>
                        <option value="80">80㎡未満</option>
                        <option value="90">90㎡未満</option>
                        <option value="100">100㎡未満</option>
                        <option value="110">110㎡未満</option>
                        <option value="120">120㎡未満</option>
                        <option value="130">130㎡未満</option>
                        <option value="140">140㎡未満</option>
                        <option value="150">150㎡未満</option>
                        <option value="160">160㎡未満</option>
                        <option value="170">170㎡未満</option>
                        <option value="180">180㎡未満</option>
                        <option value="190">190㎡未満</option>
                        <option value="200">200㎡未満</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>間取り</th>
                <td colspan=3>
                    <input type="checkbox" id="room1" value="1" name="plan[]"><label for="room1">1K/DK/LDK/ワンルーム</label>
                    <input type="checkbox" id="room2" value="2" name="plan[]"><label for="room2">2K/DK/LDK</label>
                    <input type="checkbox" id="room3" value="3" name="plan[]"><label for="room3">3K/DK/LDK</label>
                    <input type="checkbox" id="room4" value="4" name="plan[]"><label for="room4">4K/DK/LDK</label>
                    <input type="checkbox" id="room5"  value="5" name="plan[]" ><label for="room5">5K/DK/LDK</label>
                </td>
            </tr>
            <tr>
                <th>築年数</th>
                <td colspan=3>
                    <input type="radio" id="old1" value="" name="old"><label for="old1">指定なし</label>
                    <input type="radio" id="old2" value="5" name="old"><label for="old2">5年以内</label>
                    <input type="radio" id="old3" value="10" name="old"><label for="old3">10年以内</label>
                    <input type="radio" id="old4" value="15" name="old"><label for="old4">15年以内</label>
                    <input type="radio" id="old5" value="20" name="old"><label for="old5">20年以内</label>
                    <input type="radio" id="old6" value="25" name="old"><label for="old6">25年以内</label>
                    <input type="radio" id="old7" value="30" name="old"><label for="old7">30年以内</label>
                </td>
            </tr>
            <tr>
                <th>駅徒歩</th>
                <td colspan=3>
                    <input type="radio" id="walk1" value="" name="walk"><label for="walk1">指定なし</label>
                    <input type="radio" id="walk2" value="5" name="walk"><label for="walk2">5分以内</label>
                    <input type="radio" id="walk3" value="10" name="walk"><label for="walk3">10分以内</label>
                    <input type="radio" id="walk4" value="15" name="walk"><label for="walk4">15分以内</label>
                    <input type="radio" id="walk5" value="20" name="walk"><label for="walk5">20分以内</label>
                </td>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="この条件で検索する" class="btn"><br>
    <button type="reset" class="btn">条件をクリアする</button>
</form>
@endsection
