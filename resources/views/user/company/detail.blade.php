@extends('layouts.user')
@section('title', 'ニュース')
@section('body')

<a href="{{ route('hre') }}">TOPページ</a> > <a href="{{ route('news') }}">ニュース一覧</a><br>
<h3 class="part_title">{{ $article->title }}</h1>

<p>{{ $article->body }}</p>
<h4><a href="{{ route('staff.detail', ['id' => $article->staff->id]) }}">作成者：{{ $article->staff->staff_name }}</a></h4>
@endsection
