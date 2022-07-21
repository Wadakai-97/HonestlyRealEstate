@extends('layouts.admin')
@section('title', 'お客様情報（編集）')
@section('body')
<h2>お客様情報（編集）</h2>
@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif
@endsection
