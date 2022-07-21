@extends('layouts.admin')
@section('title', 'お客様情報（編集）')
@section('body')
<h2>お客様情報（編集）</h2>

<form method="post" action="{{ route('admin.customer.edit') }}"  enctype="multipart/form-data">
    @csrf
    <table class="single_table">
        <tbody>
            <tr>
                <th colspan=2 class="table_top">登録内容</th>
            </tr>
            <tr>
                <th><label class="required">お客様名</label></th>
                <td>
                </td>
            </tr>
            <tr>
                <th><label class="required">メールアドレス</label></th>
                <td>
                </td>
            </tr>
            <tr>
                <th><label class="required">電話番号</label></th>
                <td>
                </td>
            </tr>
            <tr>
                <th><label class="required">ご住所</label></th>
                <td>
                </td>
            </tr>
            <tr>
                <th><label class="required">種類</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('type'))) has-error @endif">
                        <input type="text" name="type" value="{{ old('type') }}">
                        <span class="help-block">{{$errors->first('type')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">メッセージ</label></th>
                <td>
                    <textarea maxlength="200" placeholder="最大200文字まで" name="contents" id="countTerms">{{ old('contents') }}</textarea>
                    <label id="maxLengthLabel">入力可能文字数：<span id="countDownTerms">200</span></label>
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="登録する" class="sign_up_btn">
</form>
@endsection
