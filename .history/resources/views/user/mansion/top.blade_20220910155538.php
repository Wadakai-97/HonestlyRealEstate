@extends('layouts.user')
@section('title', 'マンション：トップ')
@section('body')
<li><a href="{{ route('mansion.tokyo') }}">東京都</a></li>
<li><a href="{{ route('mansion.kanagawa') }}">新築戸建</a></li>
@endsection
