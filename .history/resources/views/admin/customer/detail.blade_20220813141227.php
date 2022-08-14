@extends('layouts.admin')
@section('title', '顧客情報：編集画面')
@section('body')
<h3>顧客情報：編集画面</h3>

<table class="single_table">
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
            <th><label>お客様名</label></th>
            <td>{{ $customer->name }}</td>
        </tr>
        <tr>
            <th><label>メールアドレス</label></th>
            <td>{{ $customer->email }}</td>
        </tr>
        <tr>
            <th><label>電話番号</label></th>
            <td>{{ $customer->phone }}</td>
        </tr>
        <tr>
            <th><label>ご住所</label></th>
            <td>{{ $customer->address }}</td>
        </tr>
        <tr>
            <th><label>種類</label></th>
            <td>{{ $customer->type }}</td>
        </tr>
        <tr>
            <th><label>メッセージ</label></th>
            <td>{{ $customer->contents }}</td>
        </tr>
    </tbody>
</table>

<button onclick="location.href='{{ route('admin.customer.edit', ['id' => $customer->id]) }}'" class="sign_up_btn">編集</button>
@endsection
