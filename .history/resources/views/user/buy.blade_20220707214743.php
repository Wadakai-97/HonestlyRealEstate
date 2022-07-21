@extends('layouts.user')
@section('title', '購入検索')
@section('body')
<h3  class="part_title">購入する</h3>
<table class="">
    <tbody>
        <tr>
            <td><a class="button_design" href="{{ route('newDetachedHouse') }}">新築戸建</a></td>
            <td><a class="button_design" href="{{ route('oldDetachedHouse') }}">中古戸建</a></td>
        </tr>
        <tr>
            <td><a class="button_design" href="{{ route('mansion') }}">マンション</a></td>
            <td><a class="button_design" href="{{ route('land') }}">土地</a></td>
        </tr>
    </tbody>
</table>
@endsection
