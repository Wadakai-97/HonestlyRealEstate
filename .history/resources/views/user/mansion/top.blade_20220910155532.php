@extends('layouts.user')
@section('title', 'マンション：トップ')
@section('body')
<li><a href="{{ route('mansion.tokyo') }}">中古戸建</a></li>
<li><a href="{{ route('mansion.kanagawa') }}">新築戸建</a></li>
@endsection
