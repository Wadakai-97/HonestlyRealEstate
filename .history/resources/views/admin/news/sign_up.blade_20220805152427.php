@extends('layouts.admin')
@section('title', 'ニュース：新規登録')
@section('body')
<h2>ニュース：新規登録</h2>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form method="post" action="{{ route('admin.news.signUp') }}"  enctype="multipart/form-data">
    @csrf
    <table>
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
                        <input type="text" maxlength="32" placeholder="最大32文字まで" name="title" id="countTitle" value="{{ old('title') }}">
                        <label id="maxLengthLabel">入力可能文字数：<span id="countDownTitle">32</span></label>
                        <span class="help-block">{{$errors->first('title')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>画像</th>
                <td>
                    <div class="form-group @if(!empty($errors->first('images'))) has-error @endif">
                        <p>画像</p>
                        <img src="{{ asset('/storage/no_image.jpeg') }}" id="noImage" class="no_image" alt="プレビュー画像">
                        <div id="preview"></div>
                        <div class="form-group @if(!empty($errors->first("image"))) has-error @endif">
                            <input type="file" name="image" id="inputImage" onchange="previewImage(event)">
                            <span class="help-block">{{$errors->first("image")}}</span>
                        </div><br>
                        <input type="button" onclick="resetImage()" value="削除"><br>
                        <span class="help-block">{{$errors->first('images')}}</span>
                    </div>
                    
                    <div class="form-group @if(!empty($errors->first('images'))) has-error @endif">
                        <input type="file" name="images">
                        <span class="help-block">{{$errors->first('images')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">ニュース内容</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('body'))) has-error @endif">
                        <textarea maxlength="800" placeholder="最大800文字まで" name="body" id="countNews">{{ old('body') }}</textarea>
                        <label id="maxLengthLabel">入力可能文字数：<span id="countDownNews">800</span></label>
                    <span class="help-block">{{$errors->first('body')}}</span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="登録する" class="sign_up_btn">
</form>
@endsection
