@extends('layouts.admin')
@section('title', '中古戸建：詳細画面')
@section('body')
<form action="{{ route('admin.oldDetachedHouse.edit', ['id' => $old_detached_house->id]) }}">
    @csrf
    <input type="submit" value="編集する" class="show_edit_btn">
</form>
@endsection
