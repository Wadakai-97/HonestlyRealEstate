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
    <table class="photo_edit_table">
        <thead>
            <tr>
                <th class="table_top">物件画像</th>
            </tr>
        </thead>
        <tbody>
            <tr class="property_images">
            @forelse ($mansion_images as $mansion_image)
                <td class="property_images_block>
                    <form method="post" action="{{ route('admin.mansion.updatePhoto', ['id' => $mansion_image->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <img src="{{ asset('/storage/mansion_images/' . $mansion_image->path) }}" width="150px" hehight="150px">
                        <input type="text" value="" name="catogory">
                        <input type="text" value="" name="comment">
                        <input type="submit" value="削除">
                    </form>
                </td>
            @empty
                @for($i = 0; $i < 21; $i++)
                    <td>
                        <form action="post">
                            @csrf
                            @method('patch')
                            <img src="{{ asset('/storage/mansion_images/no_image.jpeg') }}" width="150px" height="150px"><br>
                            <label for="category">分類<input type="text" value="" name="catogory" id="category"></label><br>
                            <label for="category">コメント<input type="text" value="" name="comment"></label><br>
                            <input type="submit" value="削除">
                        </form>
                    </td>
                @endfor
            @endforelse
            </tr>
        </tbody>
    </table>
</form>

@endsection
