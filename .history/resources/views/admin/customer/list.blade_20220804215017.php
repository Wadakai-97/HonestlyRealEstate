@extends('layouts.admin')
@section('title', 'お客様一覧')
@section('body')
<h2>お客様一覧</h2>

<table class="list">
    <colgroup>
        <col style="width: 20%;">
        <col style="width: 20%;">
        <col style="width: 10%;">
        <col style="width: 20%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>お客様名</th>
            <th>住所</th>
            <th>種類</th>
            <th>内容</th>
            <th>お問い合わせ日</th>
            <th>情報更新日</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody id="customerList">
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
@endsection
