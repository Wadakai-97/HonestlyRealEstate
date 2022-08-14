@extends('layouts.admin')
@section('title', 'ブログ：検索結果')
@section('body')
<h3>ブログ：検索結果</h3>

<form action="{{ route('admin.blog.search')}}" method="post" class="filtering_form">
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
                <th>タイトル</th>
                <td>
                    <input type="text" name="title">
                </td>
                <th>キーワード</th>
                <td>
                    <input type="text" name="content">
                </td>
            </tr>
            <tr>
                <th>担当者</th>
                <td>
                    <select name="staff">
                        <option disabled selected>未選択</option>
                        @foreach($staffs as $staff)
                        <option value="{{ $staff->id }}">{{ $staff->staff_name }}</option>
                        @endforeach
                    </select>
                </td>
                <th>作成日</th>
                <td>
                    <input type="date" name="created">
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="検索">
</form>

@if(!empty(request()))
    <div class="search_condition">
        <h4>現在の検索条件</h4>
        <p>
            @if(!empty(request()->title))
                【タイトル】{{ $request->title }}
            @endif
            @if(!empty(request()->keyword))
                【タイトル】{{ $request->keyword }}
            @endif
        </p>
    </div>
@endif

<table class="list">
    <colgroup>
        <col style="width: 25%;">
        <col style="width: 10%;">
        <col style="width: 45%;">
        <col style="width: 10%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>タイトル</th>
            <th>スタッフ</th>
            <th>内容</th>
            <th>作成日</th>
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
                <td>{{ $blog->created_at->format('Y年m月d日') }}</td>
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
