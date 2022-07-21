@extends('layouts.admin')
@section('title', '中古戸建：詳細')
@section('body')
<form action="{{ route('admin.old_detached_house.edit', ['id' => $house->id]) }}">
    @csrf
    <input type="submit" value="編集する" class="show_edit_btn">
</form>
@endsection
