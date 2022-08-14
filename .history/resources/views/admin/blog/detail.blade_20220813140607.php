@extends('layouts.admin')
@section('title', '個人ブログ')
@section('body')
<h2>ブログ：詳細画面</h2>
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
                {{ $blog->title }}
            </td>
        </tr>
        <tr>
            <th>画像</th>
            <td>
                <img src="{{ asset('/storage/blog_images/' . $blog->images) }}" onerror="this.onerror=null;this.src='{{ asset('/storage/no_image.jpeg') }}'" class="image">
            </td>
        </tr>
        <tr>
            <th>記事内容</th>
            <td>
                {{ $blog->content }}
            </td>
        </tr>
        <tr>
            <th>担当スタッフ</th>
            <td>
                {{ $blog->staff->staff_name }}
            </td>
        </tr>
    </tbody>
</table>

<button onclick="location.href='{{ route('admin.blog.edit', ['id' => $blog->id]) }}'">編集</button>
@endsection
