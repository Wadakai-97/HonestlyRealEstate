@extends('layouts.admin')
@section('title', '編集画面')
@section('body')
<h2>ニュース：編集画面</h2>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form method="post" enctype="multipart/form-data">
    @method('patch')
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
                        <input type="text" name="title" value="{{ old('title', $news->title) }}">
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
                <th><label class="required">内容</label></th>
                <td>
                    <textarea maxlength="800" placeholder="最大800文字まで" name="body">{{ old('content', $news->body) }}</textarea>
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="登録する" class="sign_up_btn">
</form>
@endsection
