@extends('layouts.user')
@section('title', 'お問い合わせ確認')
@section('body')
<form method="POST" action="{{ route('contact.confirm') }}">
    @csrf
    <label>お名前</label><input name="name" type="text" value="{{ $name }}">
    <label>メールアドレス</label><input name="email" type="text" value="{{ $mail }}">
    <label>電話番号</label><input name="phone" type="text" value="{{ $phone }}">
    <label>お問い合わせ内容</label>
    @foreach ($contents as $content)
        <input type="checkbox" checked="checked" value="{{ $content }}">
    @endforeach
    <textarea name="content_detail" value={{ $content_detail }}></textarea>

    <a href=""><p>個人情報の取扱について</p></a>

    <button type="submit" name="action" value="back">入力内容を修正する</button>
    <button type="submit" name="action" value="submit">内容を確認して送信する</button>
</form>
@endsection
