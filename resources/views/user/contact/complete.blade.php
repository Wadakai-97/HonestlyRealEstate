@extends('layouts.user')
@section('title', '送信完了')
@section('body')
<h1>{{ $name }}様、この度はお問い合わせいただき誠にありがとうございます。</h1>
<h3>スタッフからの連絡を少々お待ち下さいませ。</h3>
<p>営業時間 9:30〜21:00</p>
<p>定休日 毎週水曜日</p>

<h2><a href="{{ route('buy') }}">他の物件も探してみる</a></h2>
@endsection
