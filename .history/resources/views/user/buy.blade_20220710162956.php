@extends('layouts.user')
@section('title', '購入検索')
@section('body')
<h3  class="part_title">購入する</h3>
<table class="primary_item">
    <tbody>
        <tr>
            <td class="building_type">
                <a href="{{ route('newDetachedHouse') }}">新築戸建</a>
                <a href="{{ route('oldDetachedHouse') }}">中古戸建</a>
                <a href="{{ route('mansion') }}">マンション</a>
                <a href="{{ route('land') }}">土地</a>
            </td>
        </tr>
    </tbody>
</table>
@endsection
