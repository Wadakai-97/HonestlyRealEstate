@extends('layouts.user')
@section('title', 'お問い合わせ確認')
@section('body')
<form method="POST" action="{{ route('contact.send') }}">
    @csrf
<table>
    t
</table>
    <label>お名前</label>
    {{ $inputs['name'] }}
    <input name="name" value="{{ $inputs['name'] }}" type="hidden">

    <label>メールアドレス</label>
    {{ $inputs['email'] }}
    <input name="email" value="{{ $inputs['email'] }}" type="hidden">

    <label>電話番号</label>
    {!! nl2br(e($inputs['phone'])) !!}
    <input name="phone" value="{{ $inputs['phone'] }}" type="hidden">

    <label>住所</label>
    {{ $inputs['address'] }}
    <input name="address" value="{{ $inputs['address'] }}" type="hidden">

    <label>お問い合わせ種類</label>
    {{ $inputs['type'] }}
    <input name="type" value="{{ $inputs['type'] }}" type="hidden">

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
