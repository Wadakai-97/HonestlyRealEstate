@extends('layouts.user')
@section('title', 'マンション：トップ')
@section('body')
    <li><a href="{{ route('newDetachedHouse') }}">新築戸建</a></li>
    <li><a href="{{ route('oldDetachedHouse') }}">中古戸建</a></li>
@endsection
