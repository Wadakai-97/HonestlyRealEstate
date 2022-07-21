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
                <td>{{ $customer->name }}</td>
            </tr>
            <tr>
                <th><label class="required">メールアドレス</label></th>
                <td>{{ $customer->email }}</td>
            </tr>
            <tr>
                <th><label class="required">電話番号</label></th>
                <td>{{ $customer->phone }}</td>
            </tr>
            <tr>
                <th><label class="required">ご住所</label></th>
                <td>
                </td>
            </tr>
            <tr>
                <th><label class="required">種類</label></th>
                <td>
                </td>
            </tr>
            <tr>
                <th><label class="required">メッセージ</label></th>
                <td>
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="登録する" class="sign_up_btn">
</form>
@endsection
