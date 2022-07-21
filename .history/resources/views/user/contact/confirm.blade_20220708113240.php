@extends('layouts.user')
@section('title', 'お問い合わせ確認')
@section('body')
<form method="POST" action="{{ route('contact.send') }}">
    @csrf
<table>
    <thead>
        <tr colspan=2><th>お問い合わせ内容</th></tr>
        <tr><td>{{ $inputs['name'] }}様のご入力された内容にお間違いがないかご確認いただき、間違いがなければ下記送信ボタンよりお問い合わせくださいませ。</td></tr>
    </thead>
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
            <th>お問い合わせ種類</th>
            <td>
                {{ $inputs['type'] }}
                <input name="type" value="{{ $inputs['type'] }}" type="hidden">
            </td>
        </tr>
        <tr>
            <th>希望内容</th>
            <td>
                {{ $inputs['contents'] }}
                <input name="contents" value="{{ $inputs['contents'] }}" type="hidden">
            </td>
        </tr>
        <tr>
            <th>メッセージ</th>
            <td>
                {{ $inputs['customer_request'] }}
                <input name="customer_request" value="{{ $inputs['customer_request'] }}" type="hidden">
            </td>
        </tr>
    </tbody>
</table>

    <button type="submit" name="action" value="back">入力内容修正</button>
    <button type="submit" name="action" value="submit">送信</button>

</form>
@endsection
