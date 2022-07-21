@extends('layouts.user')
@section('title', '購入検索')
@section('body')
<h3  class="part_title">購入する</h3>
<table class="primary_item">
    <tbody>
        <tr>
            <td>
                <a class="button_design" href="{{ route('newDetachedHouse') }}">
                    <button type="submit">
                        <span class="shadow"></span><span class="edge"></span><span class="front text">同意して次へ進む</span>
                    </button>
                </a>
            </td>
            <td>
                <a class="button_design" href="{{ route('oldDetachedHouse') }}">中古戸建</a>
            </td>
        </tr>
        <tr>
            <td>
                <a class="button_design" href="{{ route('mansion') }}">マンション</a>
            </td>
            <td>
                <a class="button_design" href="{{ route('land') }}">土地</a>
            </td>
        </tr>
    </tbody>
</table>
@endsection
