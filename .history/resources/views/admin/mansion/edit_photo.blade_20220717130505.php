@extends('layouts.admin')
@section('title', '物件画像：編集画面')
@section('body')
<h3>編集画面</h3>

<table class="edit_menu">
    <tbody>
        <td><a href="{{ route('admin.mansion.edit', ['id' => $mansion->id]) }}" class="edit_menu_link">物件概要</a></td>
        <td><a href="{{ route('admin.mansion.edit_photo', ['id' => $mansion->id]) }}" class="edit_menu_link">物件画像</a></td>
    </tbody>
</table><br>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form method="post" action="{{ route('admin.mansion.update', ['id' => $mansion->id]) }}" enctype="multipart/form-data">
    <table>
        <thead>
            <tr>
                <th colspan=2 class="table_top">物件画像</th>
            </tr>
            <input type="file" name="files[][image]" multiple>
        </thead>
        <tbody>
            <tr>
                @foreach ($mansion_images as $mansion_image)
                <td>
                    <img src="{{ asset('/storage/mansion_images/' . $mansion_image->path) }}">
                    <input type="submit" value="削除">
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</form>

@endsection
