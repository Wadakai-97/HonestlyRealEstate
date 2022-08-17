@extends('layouts.user')
@section('title', '土地：検索画面')
@section('body')
<h3 class="part_title">検索条件</h3>

<form action="{{ route('land.search') }}" method="post" class="form">
    @csrf
    <table class="single_table">
    
    </table>
    <input type="submit" value="この条件で検索する" class="btn"><br>
    <input type="reset" value="条件をクリアする" class="btn">
</form>
@endsection
