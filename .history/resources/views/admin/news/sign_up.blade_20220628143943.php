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
        <tbody>
            <tr>
                <th colspan=2 class="table_top">登録内容</th>
            </tr>
            <tr>
                <th><label class="required">タイトル</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('title'))) has-error @endif">
                        <input type="text" name="title" value="{{ old('title') }}">
                        <label id="maxLengthLabel">入力可能文字数：<span id="countDownContent">800</span></label>
                        <span class="help-block">{{$errors->first('title')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>画像</th>
                <td>
                    <div class="form-group @if(!empty($errors->first('images'))) has-error @endif">
                        <input type="file" name="images">
                        <span class="help-block">{{$errors->first('images')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">ニュース内容</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first(''))) has-error @endif">
                        <textarea maxlength="800" placeholder="最大800文字まで" name="body" id="countNews">{{ old('body') }}</textarea>
                        <label id="maxLengthLabel">入力可能文字数：<span id="countDownNews">800</span></label>
                    <span class="help-block">{{$errors->first('')}}</span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="登録する" class="sign_up_btn">
</form>
@endsection
