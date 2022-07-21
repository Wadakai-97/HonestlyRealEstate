@extends('layouts.user')
@section('title', '購入検索')
@section('body')
<h3  class="part_title">購入する</h3>
<table>
    <tbody>
        <tr>
            <td class="button_design"><a href="{{ route('newDetachedHouse') }}">新築戸建</a></td>
            <td class="button_design"><a href="{{ route('oldDetachedHouse') }}">中古戸建</a></td>
        </tr>
        <tr>
            <td class="button_design"><a href="{{ route('mansion') }}">マンション</a></td>
            <td class="button_design"><a href="{{ route('land') }}">土地</a></td>
        </tr>
    </tbody>
</table>
@endsection
