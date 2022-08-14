@extends('layouts.admin')
@section('title', 'ニュース：一覧表示')
@section('body')
<h3>ニュース：一覧表示</h3>

<form action="{{ route('admin.mansion.search')}}" method="post" class="filtering_form">
    @csrf
    <table class="filtering_table">
        <colgroup>
            <col style="width: 8%;">
            <col style="width: 42%;">
            <col style="width: 8%;">
            <col style="width: 42%;">
        </colgroup>
        <thead>
            <h3>検索条件</h3>
        </thead>
        <tbody>
            <tr>
                <th>住所</th>
                <td>
                    <input type="text" name="address">
                </td>

                <th>物件名</th>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <th>販売価格</th>
                <td>
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
                </td>
                <th>専有面積</th>
                <td>
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
                        <label for="room5"><input type="checkbox" id="room5"  value="5" name="plan[]" > 5K/DK/LDK</label>
                    </div>
                </td>
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
                    <input type="text">
                </td>
                <th>駅徒歩</th>
                <td>
                    <div class="multiple_answers">
                        <label for="walk1"><input type="radio" id="walk1" value="5" name="walking_distance_station"> 5分以内</label>
                        <label for="walk2"><input type="radio" id="walk2" value="10" name="walking_distance_station"> 10分以内</label>
                        <label for="walk3"><input type="radio" id="walk3" value="15" name="walking_distance_station"> 15分以内</label>
                        <label for="walk4"><input type="radio" id="walk4" value="20" name="walking_distance_station"> 20分以内</label>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="検索">
</form>

<table class="list">
    <colgroup>
        <col style="width: 20%;">
        <col style="width: 50%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>タイトル</th>
            <th>本文</th>
            <th>担当者</th>
            <th>作成日</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($newses as $news)
            <tr>
                <td class="hidden">{{ $news->id }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->body }}</td>
                <td>{{ $news->staff->staff_name }}</td>
                <td>{{ $news->created_at->format('Y年m月d日') }}</td>
                <td><button onclick="location.href='{{ route('admin.news.detail', ['id' => $news->id]) }}'">詳細</button></td>
                <td><button id="newsDelete">削除</button></td>
            </tr>
        @empty
            <p>現在登録されているニュースニュースはありません。</p>
        @endforelse
    </tbody>
</table>

{{ $newses->links() }}

@endsection
