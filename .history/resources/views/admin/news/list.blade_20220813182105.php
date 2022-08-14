@extends('layouts.admin')
@section('title', 'ニュース：一覧表示')
@section('body')
<h3>ニュース：一覧表示</h3>
<table class="list">
    <colgroup>
        <col style="width: 20%;">
        <col style="width: 60%;">
        <col style="width: 10%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>タイトル</th>
            <th>本文</th>
            <th>作成日</th>
            <th></th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($newses as $news)
            <tr>
                <td class="hidden">{{ $news->id }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->body }}</td>
                <td>{{ $news->staff_id->staff_name }}</td>
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
