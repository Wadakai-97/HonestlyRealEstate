@extends('layouts.admin')
@section('title', 'ブログ編集画面')
@section('body')
<h2>ブログ：編集画面</h2>

@if (Session::has('message'))
<div class="alert alert-primary">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form method="post" action="{{ route('admin.blog.save', ['id' => $blog->id]) }}"  enctype="multipart/form-data">
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
                        <input type="text" name="title" value="{{ old('title', $blog->title) }}">
                        <span class="help-block">{{$errors->first('title')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>画像</th>
                <td>
                    <div class="form-group @if(!empty($errors->first('image'))) has-error @endif">
                        <input type="file" name="image">
                        <span class="help-block">{{$errors->first('image')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">記事内容</label></th>
                <td>
                    <textarea maxlength="800" placeholder="最大800文字まで" name="content">{{ old('content', $blog->content) }}</textarea>
                </td>
            </tr>
            <tr>
                <th><label class="required">担当スタッフ</label></th>
                <td>
                    <select name="staff_id">
                        <option disabled selected>未選択</option>
                        @foreach($staffs->unique('id') as $staff)
                        <option name="staff_id" value="{{ $staff->id }}"  @if(old('staff_id', $blog->staff_id) === $staff->id) selected @endif>{{ $staff->staff_name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="登録する" class="sign_up_btn">
</form>
@endsection
