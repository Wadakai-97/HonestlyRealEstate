@extends('layouts.admin')
@section('title', 'スタッフ：一覧表示')
@section('body')
<h2>スタッフ:一覧表示</h2>
<table class="list">
    <colgroup>
        <col style="width: 60%;">
        <col style="width: 30%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>スタッフ名</th>
            <th>役職</th>
            <th colspan=2></th>
        </tr>
    </thead>
    <tbody>
        @forelse($news as $news)
            <tr>
                <td class="hidden">{{ $news->id }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->content }}</td>
                <td>{{ $news->created_at }}</td>
                <td><button onclick="location.href='{{ route('admin.news.detail', ['id' => $news->id]) }}'">詳細</button></td>
                <td><button id="newsDelete">削除</button></td>
            </tr>
        @empty
            <p>現在登録されているニュースニュースはありません。</p>
        @endforelse
    </tbody>
</table>
@endsection
