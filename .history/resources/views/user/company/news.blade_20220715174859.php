@extends('layouts.user')
@section('title', 'ニュース')
@section('body')
<a href="{{ route('hre') }}">TOPページ</a><br>
<h3  class="part_title">ニュース一覧</h1>

@foreach($articles as $article)
<table>
    <tbody>
        <tr>
            <th colspan=2><a href="{{ route('news.detail', ['id' => $article->id]) }}">「{{ $article->title }}」</a></th>
        </tr>
        <tr>
            <td>No.{{ $article->id }}</td>
            <td><>作成者：{{ $article->staff->staff_name }}</a></td>
        </tr>
    </tbody>
</table><br>
@endforeach

{{ $articles->links('pagination::default') }}

@endsection
