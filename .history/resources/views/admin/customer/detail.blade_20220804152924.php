@extends('layouts.admin')
@section('title', 'お客様情報（編集）')
@section('body')
<h2>お客様情報（詳細）</h2>

<form action="{{ route('admin.customer.edit',  ['id' => $customer->id]) }}"  enctype="multipart/form-data">
    @csrf
    <table class="single_table">
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

    <button onclick="location.href='{{ route('admin.newDetachedHouse.edit', ['id' => $new_detached_house->id]) }}'">編集</button>
@endsection
