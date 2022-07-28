@extends('layouts.admin')
@section('title', 'おすすめ物権：登録')
@section('body')
@if($property_count = 10)
<p>おすすめ物件の登録数が１０件のため、新規登録ができません。</p>
<p>登録物件数を１０件未満に</p>
@else
@endif
@endsection
