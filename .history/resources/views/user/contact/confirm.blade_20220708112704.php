@extends('layouts.user')
@section('title', 'お問い合わせ確認')
@section('body')
<form method="POST" action="{{ route('contact.send') }}">
    @csrf
<table>
    <thead></thead>
    <tbody>
        <tr>
            <th>お名前</th>
            <td>
                {{ $inputs['name'] }}
                <input name="name" value="{{ $inputs['name'] }}" type="hidden">
            </td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>
                {{ $inputs['email'] }}
                <input name="email" value="{{ $inputs['email'] }}" type="hidden">
            </td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td>
                {!! nl2br(e($inputs['phone'])) !!}
                <input name="phone" value="{{ $inputs['phone'] }}" type="hidden">
            </td>
        </tr>
        <tr>
            <th>住所</th>
            <td>
                {{ $inputs['address'] }}
                <input name="address" value="{{ $inputs['address'] }}" type="hidden">
            </td>
        </tr>
        <tr>
            <th>お問い合わせ資料</th>
            <td>
                {{ $inputs['type'] }}
                <input name="type" value="{{ $inputs['type'] }}" type="hidden">
            </td>
        </tr>
        <tr>
            <th></th>
            <td>

            </td>
        </tr>
        <tr>
            <th></th>
            <td>

            </td>
        </tr>
    </tbody>
</table>
    <label>お問い合わせ種類</label>


    <label>希望内容</label>
    {{ $inputs['contents'] }}
    <input name="contents" value="{{ $inputs['contents'] }}" type="hidden">

    <label>メッセージ</label>
    {{ $inputs['customer_request'] }}
    <input name="customer_request" value="{{ $inputs['customer_request'] }}" type="hidden">

    <button type="submit" name="action" value="back">
        入力内容修正
    </button>
    <button type="submit" name="action" value="submit">
        送信する
    </button>
</form>
@endsection
