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
    <tbody>
        @forelse($blogs as $blog)
            <tr>
                <td class="hidden">{{ $blog->id }}</td>
                <td>{{ $blog->name }}</td>
                <td>{{ $blog->blog_area }}</td>
                <td>{{ $blog->price }}</td>
                <td>{{ $blog->pref }}{{ $blog->municipalities }}{{ $blog->block }}</td>
                <td>
                    <form methid="POST" action="{{ route('admin.blogRecommend.signUp', ['id' => $blog->id]) }}">
                        @csrf
                        <input type="submit" id="blogRecommend" value="おすすめ登録">
                    </form>
                </td>
                <td><button onclick="location.href='{{ route('admin.blog.detail', ['id' => $blog->id]) }}'">詳細</button></td>
                <td><button id="blogDelete">削除</button></td>
            </tr>
        @empty
            <p>現在登録されている土地はありません。</p>
        @endforelse
    </tbody>
</table>
@endsection
