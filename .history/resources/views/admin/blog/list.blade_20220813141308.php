@extends('layouts.admin')
@section('title', 'ブログ一覧')
@section('body')
<h3>ブログ一覧</h3>

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
    <tbody>
        @forelse($blogs as $blog)
            <tr>
                <td class="hidden">{{ $blog->id }}</td>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->staff->staff_name }}</td>
                <td>{{ $blog->content }}</td>
                <td><button onclick="location.href='{{ route('admin.blog.detail', ['id' => $blog->id]) }}'">詳細</button></td>
                <td><button id="blogDelete">削除</button></td>
            </tr>
        @empty
            <p>現在登録されているブログはありません。</p>
        @endforelse
    </tbody>
</table>

{{ $blogs->links() }}

@endsection
