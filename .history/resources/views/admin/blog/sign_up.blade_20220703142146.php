@extends('layouts.admin')
@section('title', '新規登録')
@section('body')
<h2>ブログ：新規登録画面</h2>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form method="post" action="{{ route('admin.blog.signUp') }}"  enctype="multipart/form-data">
    @csrf
    <table>
        <tbody>
            <tr>
                <th colspan=2 class="table_top">登録内容</th>
            </tr>
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
                        <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                        <div class="inputForm">
                            <input type="file" name="head_shot" id="image" onchange="previewImage(this);">
                            <input type="button" onclick="resetImage()" value="削除">
                        </div>
                        <input type="file" name="images">
                        <span class="help-block">{{$errors->first('images')}}</span>
                    </div>
                </td>
                <th>顔写真</th>
                <td>
                    <div class="form-group @if(!empty($errors->first('head_shot'))) has-error @endif">
                        <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                        <div class="inputForm">
                            <input type="file" name="head_shot" id="image" onchange="previewImage(this);">
                            <input type="button" onclick="resetImage()" value="削除">
                        </div>
                        <span class="help-block">{{$errors->first('head_shot')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">記事内容</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('content'))) has-error @endif">
                        <textarea maxlength="800" placeholder="最大800文字まで" name="content" id="countContent">{{ old('content') }}</textarea>
                        <label id="maxLengthLabel">入力可能文字数：<span id="countDownContent">800</span></label>
                        <span class="help-block">{{$errors->first('content')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">担当スタッフ</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('staff_id'))) has-error @endif">
                        <select name="staff_id">
                            <option disabled selected>未選択</option>
                            @foreach($staffs->unique('id') as $staff)
                            <option name="staff_id" value="{{ $staff->id }}">{{ $staff->staff_name }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('staff_id')}}</span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="登録する" class="sign_up_btn">
</form>
@endsection
