@extends('layouts.admin')
@section('title', 'ニュース：新規登録')
@section('body')
<h2>ニュース：新規登録</h2>

    <table>
        <thead>
            <tr>
                <th colspan=2 class="table_top">登録内容</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>タイトル</th>
                <td>
                    {{ $news->title }}
                </td>
            </tr>
            <tr>
                <th>画像</th>
                <td>
                    <img src="{{ asset('/storage/news_images/' . $news->images) }}" onerror="this.onerror=null;this.src='{{ asset('/storage/new_images/no_image.jpg') }}'" >
                </td>
            </tr>
            <tr>
                <th>ニュース内容</th>
                <td>
                    {{ $news->body }}
                </td>
            </tr>
        </tbody>
    </table>

    <form action="{{ route('admin.news.edit', ['id' => $news->id]) }}">
        @csrf

    <button onclick="location.href='{{ route('admin.news.edit', ['id' => $news->id]) }}'">編集</button>
@endsection