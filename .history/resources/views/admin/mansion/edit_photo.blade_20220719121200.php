@extends('layouts.admin')
@section('title', '物件画像：編集画面')
@section('body')
<h3>編集画面</h3>

<table class="edit_menu">
    <tbody>
        <td><a href="{{ route('admin.mansion.edit', ['id' => $mansion->id]) }}" class="edit_menu_link">物件概要</a></td>
        <td><a href="{{ route('admin.mansion.editPhoto', ['id' => $mansion->id]) }}" class="edit_menu_link">物件画像</a></td>
    </tbody>
</table><br>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form method="post" action="{{ route('admin.mansion.update', ['id' => $mansion->id]) }}" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <table>
        <thead>
            <tr>
                <th class="table_top">物件画像</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="file" name="files[][image]" multiple></td>
            </tr>
            @foreach ($mansion_images as $mansion_image)
            <tr>
                <form method="post" action="{{ route('admin.mansion.updatePhoto', ['id' => $mansion_image->id]) }}" enctype="multipart/form-data">
                    <td>
                        @if ($mansion_image->path !== '')
                            <img src="{{ asset('/storage/mansion_images/' . $mansion_image->path) }}" width="300px" hehight="300px">
                            <input type="text" value="">
                            <input type="submit" value="削除">
                        @else
                            <img src="{{ asset('/storage/mansion_images/no_image.jpeg') }}">
                            <p>画像はまだ登録されていません。</p>
                        @endif
                    </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</form>

@endsection
