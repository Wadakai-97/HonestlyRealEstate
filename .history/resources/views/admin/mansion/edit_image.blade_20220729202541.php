@extends('layouts.admin')
@section('title', '物件画像：編集画面')
@section('body')
<h3>編集画面</h3>

<table class="edit_menu">
    <tbody>
        <td><a href="{{ route('admin.mansion.edit', ['id' => $mansion->id]) }}" class="edit_menu_link">物件概要</a></td>
        <td><a href="{{ route('admin.mansionImage.edit', ['id' => $mansion->id]) }}" class="edit_menu_link">物件画像</a></td>
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
                        <form method="post" action="{{ route('admin.mansionImage.update', ['id' => $mansion_image->id]) }}" enctype="multipart/form-data">
                            @csrf

                            <p>画像{{ $image_counter++ }}</p>
                            <div id="signUpForm{{ $image_counter }}">
                                <img src="{{ asset('/storage/mansion_images/' . $mansion_image->path) }}" id="showImage{{ $image_counter }}" class="show_image" alt="物件画像{{ $image_counter }}"><br>
                                <input type="hidden" id="imageCounter" value="{{ $image_counter }}">
                                <input type="button" id="mansionImageDelete" onclick="deletePropertyImage({{ $image_counter }})" value="画像削除">
                            </div>

                            <p>分類</p>
                            <div class="form-group @if(!empty($errors->first( "category" . $image_counter))) has-error @endif">
                                <select name="category">
                                    <option disabled selected>未選択</option>
                                    @foreach (PropertyInformationConsts::MANSION_IMAGES_CATEGORY_LIST as $key => $category)
                                    <option value="{{ $key }}" @if(old('category', $mansion_image->category) === $category) selected @endif>{{ $category }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block">{{$errors->first("category" . $image_counter)}}</span>
                            </div>

                            <p>コメント</p>
                            <div class="form-group @if(!empty($errors->first( "comment" . $image_counter ))) has-error @endif">
                                <textarea name="comment" cols="150" rows="5">{{ old('comment' . $image_counter, $mansion_image->comment) }}</textarea>
                                <span class="help-block">{{$errors->first( "comment" . $image_counter )}}</span>
                            </div>

                            <input type="submit" id="mansionImageUpdate" value="登録">
                        </form>
                        <form action="{{ route('admin.mansionImage.delete', ['id' => $mansion_image->id]) }}">
                            <input type="submit" value="すべて削除">
                        </form>
                    </td>
                @endforeach

                @while($image_counter < 21)
                    <td class="property_images_block">
                        <form method="post" action="{{ route('admin.mansionImage.signUp', ['id' => $mansion->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <p>画像{{ $image_counter++ }}</p>
                            <img src="{{ asset('/storage/mansion_images/no_image.jpeg') }}" id="noImage{{ $image_counter }}" class="no_image" alt="プレビュー画像{{ $image_counter }}">
                            <div id="{{ $image_counter }}"></div>
                            <div class="form-group @if(!empty($errors->first("image" . $image_counter))) has-error @endif">
                                <input type="file" name="image" id="inputImage{{ $image_counter }}" onchange="previewPropertyImage(event, {{ $image_counter }})">
                                <span class="help-block">{{$errors->first("image")}}</span>
                            </div>
                            <input type="button" onclick="resetPropertyImage({{ $image_counter }})" value="画像削除">

                            <p>分類</p>
                            <div class="form-group @if(!empty($errors->first( "category" . $image_counter))) has-error @endif">
                                <select name="category">
                                    <option disabled selected>未選択</option>
                                    @foreach (PropertyInformationConsts::MANSION_IMAGES_CATEGORY_LIST as $key => $category)
                                    <option value="{{ $key }}" @if(old('category') === $category) selected @endif>{{ $category }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block">{{$errors->first("category")}}</span>
                            </div>

                            <p>コメント</p>
                            <div class="form-group @if(!empty($errors->first( "comment" . $image_counter ))) has-error @endif">
                                <textarea name="comment" cols="150" rows="5">{{ old('comment' . $image_counter) }}</textarea>
                                <span class="help-block">{{$errors->first("comment")}}</span>
                            </div>

                            <input type="submit" value="登録">
                        </form>
                    </td>
                @endwhile
            @endwhile
        </tr>
    </tbody>
</table>

@endsection
