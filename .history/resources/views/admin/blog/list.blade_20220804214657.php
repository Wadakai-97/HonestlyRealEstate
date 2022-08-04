@extends('layouts.admin')
@section('title', 'ブログ一覧')
@section('body')
<h2>ブログ一覧</h2>

<table class="list">
    <colgroup>
        <col style="width: 25%;">
        <col style="width: 10%;">
        <col style="width: 55%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>タイトル</th>
            <th>スタッフ</th>
            <th>内容</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody id="blogList">
            @forelse($lands as $land)
            <tr>
                <td class="hidden">{{ $land->id }}</td>
                <td>{{ $land->name }}</td>
                <td>{{ $land->land_area }}</td>
                <td>{{ $land->price }}</td>
                <td>{{ $land->pref }}{{ $land->municipalities }}{{ $land->block }}</td>
                <td>
                    <form methid="POST" action="{{ route('admin.landRecommend.signUp', ['id' => $land->id]) }}">
                        @csrf
                        <input type="submit" id="landRecommend" value="おすすめ登録">
                    </form>
                </td>
                <td><button onclick="location.href='{{ route('admin.land.detail', ['id' => $land->id]) }}'">詳細</button></td>
                <td><button id="landDelete">削除</button></td>
            </tr>
        @empty
            <p>現在登録されている土地はありません。</p>
        @endforelse
    </tbody>
</table>
@endsection
