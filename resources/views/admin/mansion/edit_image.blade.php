@extends('layouts.admin')
@section('title', '物件画像：編集画面')
@section('body')
<h3>編集画面</h3>

<table class="edit_menu">
    <tbody>
        <td><a href="{{ route('admin.mansion.edit', ['id' => $mansion->id]) }}" class="edit_menu_link">物件概要</a></td>
        <td><a href="{{ route('admin.mansion.editImage', ['id' => $mansion->id]) }}" class="edit_menu_link">物件画像</a></td>
    </tbody>
</table><br>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif

<table class="photo_edit_table">
    <thead>
        <tr>
            <th class="table_top">物件画像</th>
        </tr>
    </thead>
    <tbody>
        <tr class="property_images">
            @while ($image_counter < 21)
                @foreach($mansion_images as $mansion_image)
                    <td class="property_images_block">
                        <form method="post" action="{{ route('admin.mansion.updateImage', ['id' => $mansion_image->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <img src="{{ asset('/storage/mansion_images/' . $mansion_image->path) }}" width="150px" hehight="150px">
                            <input type="text" value="" name="catogory">
                            <textarea name="comment" cols="150" rows="5"></textarea>
                        </form>
                        <form method="post" action="{{ route('admin.mansion.deleteImage', ['id' => $mansion_image->id]) }}">
                            @csrf
                            <input type="submit" id="mansionImageDelete" value="削除">
                        </form>
                    </td>
                    {{ $image_counter++ }}
                @endforeach

                @while($image_counter < 21)
                    <td class="property_images_block">
                        <form method="post" action="{{ route('admin.mansion.updateImage', ['id' => $image_counter]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <p>画像{{ $image_counter }}</p>
                            <input type="hidden" name="mansion_id" value="{{ $mansion->id }}">
                            <img src="{{ asset('/storage/mansion_images/no_image.jpeg') }}" id="noImage{{ $image_counter }}" class="no_image">
                            <div id="{{ $image_counter }}"></div>
                            <input type="file" onchange="previewPropertyImage(event, {{ $image_counter }})"><br>
                            <input type="button" onclick="resetPropertyImage({{ $image_counter }})" value="削除"><br>

                            <p>分類</p>
                            <select name="category{{ $image_counter }}">
                                <option disabled selected>未選択</option>
                                @foreach (PropertyInformationConsts::MANSION_IMAGES_CATEGORY_LIST as $key => $category)
                                <option value="{{ $key }}" @if(old('category') === $category) selected @endif>{{ $category }}</option>
                                @endforeach
                            </select>
                            <p>コメント</p>
                            <textarea name="comment{{ $image_counter }}" cols="150" rows="5"></textarea><br>
                            <input type="submit" value="登録">
                        </form>
                    </td>
                    {{ $image_counter++ }}
                @endwhile
            @endwhile
        </tr>
    </tbody>
</table>

@endsection
