@extends('layouts.admin')
@section('title', '管理画面')
@section('body')
<ul class="menu">
    <li class="top_property_management">物件管理</li>
    <ul class="top_property_management_menu">
        <li class="top_sign_up">新規登録</li>
        <ul>
            <li class="top_list"><a href="{{ route('admin.newDetachedHouse.form') }}">新築戸建</a></li>
            <li class="top_list"><a href="{{ route('admin.newDetachedHouse.groupForm') }}">新築分譲住宅</a></li>
            <li class="top_list"><a href="{{ route('admin.oldDetachedHouse.form') }}">中古戸建</a></li>
            <li class="top_list"><a href="{{ route('admin.mansion.form') }}">マンション</a></li>
            <li class="top_list"><a href="{{ route('admin.land.form') }}">土地</a></li>
        </ul>
        <li class="top_show_all">一覧表示</li>
        <ul>
            <li class="top_list"><a href="{{ route('admin.newDetachedHouse.list') }}">新築戸建</a></li>
            <li class="top_list"><a href="{{ route('admin.newDetachedHouse.ist') }}">新築分譲住宅</a></li>
            <li class="top_list"><a href="{{ route('admin.oldDetachedHouse.list') }}">中古戸建</a></li>
            <li class="top_list"><a href="{{ route('admin.mansion.list') }}">マンション</a></li>
            <li class="top_list"><a href="{{ route('admin.land.list') }}">土地</a></li>
        </ul>
    </ul>
</ul>
<ul class="menu">
    <li class="top_staff">スタッフ</li>
    <ul>
        <li class="top_list"><a href="{{ route('admin.staff.form') }}">新規登録</a></li>
        <li class="top_list"><a href="{{ route('admin.staff.list') }}">一覧表示</a></li>
    </ul>
</ul>
<ul class="menu">
    <li class="top_blog">ブログ</li>
    <ul>
        <li class="top_list"><a href="{{ route('admin.blog.form') }}">新規登録</a></li>
        <li class="top_list"><a href="{{ route('admin.blog.list') }}">一覧表示</a></li>
    </ul>
</ul>
<ul class="menu">
    <li class="top_news">ニュース</li>
    <ul>
        <li class="top_list"><a href="{{ route('admin.news.form') }}">新規登録</a></li>
        <li class="top_list"><a href="{{ route('admin.news.list') }}">一覧表示</a></li>
    </ul>
</ul>
@endsection
