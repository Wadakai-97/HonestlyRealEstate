@extends('layouts.admin')
@section('title', 'おすすめ物権：登録')
@section('body')
@if($property_count = 10)
<p>おすすめ物件の登録数が１０件のため、新規登録ができません。</p>
<p>しんき登録物件数を１０件未満に変更してください。</p>
@else
@endif
@endsection
