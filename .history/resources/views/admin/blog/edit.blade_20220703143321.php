@extends('layouts.admin')
@section('title', 'ブログ編集画面')
@section('body')
<h2>ブログ：編集画面</h2>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form method="post" action="{{ route('admin.blog.update', ['id' => $blog->id]) }}"  enctype="multipart/form-data">
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
                <td class="hidden">{{ $blog->id }}</td>
                <td>
                    <div class="form-group @if(!empty($errors->first('images'))) has-error @endif">
                        <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                        <img id="exImage" src="{{ asset('/storage/blog_images/' . $blog->images) }}" onerror="this.onerror=null;this.src='{{ asset('/storage/blog_images/no_image.jpg') }}'" >
                        <div class="inputForm">
                            @if (empty($blog->image))
                            <input type="file" name="image" id="image" onchange="changeImage(this);">
                            @elseif (!empty($blog->image))
                            <input type="file" name="image" id="image" onchange="changeImage(this);">
                            <input type="button" id="blogImageDelete" value="削除">
                            @endif
                        </div>
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
