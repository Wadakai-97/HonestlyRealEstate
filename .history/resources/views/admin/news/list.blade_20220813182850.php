@extends('layouts.admin')
@section('title', 'ニュース：一覧表示')
@section('body')
<h3>ニュース：一覧表示</h3>

<form action="{{ route('admin.mansion.search')}}" method="post" class="filtering_form">
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
                        @foreach($staffs->unique('staff_id') as $staff)
                        <option value="{{ $staffs"></option>
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

<table class="list">
    <colgroup>
        <col style="width: 20%;">
        <col style="width: 50%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>タイトル</th>
            <th>本文</th>
            <th>担当者</th>
            <th>作成日</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($newses as $news)
            <tr>
                <td class="hidden">{{ $news->id }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->body }}</td>
                <td>{{ $news->staff->staff_name }}</td>
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
