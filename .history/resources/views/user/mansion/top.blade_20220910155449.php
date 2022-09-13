@extends('layouts.user')
@section('title', 'マンション：トップ')
@section('body')
    <li><a href="{{ route('user.mansion.') }}">新築戸建</a></li>
    <li><a href="{{ route('') }}">中古戸建</a></li>
@endsection
