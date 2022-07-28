@extends('layouts.admin')
@section('title', 'おすすめ物権：登録')
@section('body')
@if($property_count = 10)
<p>おすすめ物件の登録数が１０件のため、新規登録ができません。</p>
<p>新規登録するには登録数を１０件未満にしてください。</p>
@else
@endif
@endsection
