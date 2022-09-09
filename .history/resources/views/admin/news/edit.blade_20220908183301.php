@extends('layouts.admin')
@section('title', 'ニュース：編集画面')
@section('body')
<h3>ニュース：編集画面</h3>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form method="post" action="{{ route('admin.news.update', ['id' => $news->id]) }}" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <table>
        <colgroup>
            <col style="width: 30%;">
            <col style="width: 70%;">
        </colgroup>
        <thead>
            <tr>
                <th colspan=2 class="table_top">登録内容</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><label class="required">タイトル</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('title'))) has-error @endif">
                        <input type="text" name="title" value="{{ old('title', $news->title) }}">
                        <span class="help-block">{{$errors->first('title')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>画像</th>
                <td class="hidden">{{ $news->id }}</td>
                <td>
                    <div class="form-group @if(!empty($errors->first('images'))) has-error @endif">
                        <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                        <img id="exImage" src="{{ asset('/storage/news_images/' . $news->images) }}" onerror="this.onerror=null;this.src='{{ asset('/storage/no_image.jpeg') }}'" class="image">
                        <div class="inputForm">
                            @if (empty($news->images))
                            <input type="file" name="images" id="image" onchange="changeImage(this);">
                            @elseif (!empty($news->images))
                            <input type="file" name="images" id="image" onchange="changeImage(this);">
                            <input type="button" id="newsImageDelete" value="削除">
                            @endif
                        </div>
                        <span class="help-block">{{$errors->first('images')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">内容</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('content'))) has-error @endif">
                        <textarea maxlength="800" placeholder="最大800文字まで" name="content" id="countNews">{{ old('content', $news->content) }}</textarea>
                        <label id="maxLengthLabel">入力可能文字数：<span id="countDownNews">800</span></label>
                    <span class="help-block">{{$errors->first('content')}}</span>
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="登録する" class="sign_up_btn">
</form>
@endsection
