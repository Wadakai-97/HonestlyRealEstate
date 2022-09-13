@extends('layouts.user')
@section('title', 'マンション：トップ')
@section('body')
<li><a href="{{ route('mansion.tokyo') }}">東京都</a>($tokyo)</li>
<li><a href="{{ route('mansion.kanagawa') }}">神奈川県</a>($kanagawa)</li>
@endsection
