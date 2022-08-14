@extends('layouts.admin')
@section('title', 'お客様：新規登録')
@section('body')
<h2>お客様情報：新規登録</h2>

@if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif

<form method="post" action="{{ route('admin.customer.signUp') }}"  enctype="multipart/form-data">
    @csrf
    <table>
        <colgroup>
            <col style="width: 10%;">
            <col style="width: 90%;">
        </colgroup>
        <thead>
            <tr>
                <th colspan=2 class="table_top">登録内容</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><label class="required">お客様名</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('customer_name'))) has-error @endif">
                        <input type="text" name="customer_name" value="{{ old('customer_name') }}">
                        <span class="help-block">{{$errors->first('customer_name')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">メールアドレス</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('email'))) has-error @endif">
                        <input type="number" name="email" value="{{ old('email') }}" step="1">
                        <span class="help-block">{{$errors->first('email')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">電話番号</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('phone'))) has-error @endif">
                        <input type="number" name="phone" value="{{ old('phone') }}" step="1">
                        <span class="help-block">{{$errors->first('phone')}}</span>
                    </div>
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
                <th><label class="required">ご住所</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('address'))) has-error @endif">
                        <input type="text" name="address" value="{{ old('address') }}">
                        <span class="help-block">{{$errors->first('address')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">メモ</label></th>
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
