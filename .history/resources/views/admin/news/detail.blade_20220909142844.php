@extends('layouts.admin')
@section('title', 'ニュース：新規登録')
@section('body')
<h3>ニュース：詳細画面</h3>

    <table>
        <colgroup>
            <col style="width: 30%;">
            <col style="width: 70%;">
        </colgroup>
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
                    <img src="{{ asset('/storage/news_images/' . $news->images) }}" onerror="this.onerror=null;this.src='{{ asset('/storage/no_image.jpeg') }}'" class="image">
                </td>
            </tr>
            <tr>
                <th>ニュース内容</th>
                <td>
                    {{ $news->content }}
                </td>
            </tr>
            <tr>
                <th>担当スタッフ</th>
                <td>
                    {{ $news->staff->staff_name }}
                </td>
            </tr>
        </tbody>
    </table>

    <button onclick="location.href='{{ route('admin.news.edit', ['id' => $news->id]) }}'" class="show_edit_btn">編集</button>
@endsection
