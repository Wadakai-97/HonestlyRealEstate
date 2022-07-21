@extends('layouts.user')
@section('title', 'スタッフ紹介')
@section('body')

<a href="{{ route('hre') }}">TOPページ</a><br>

<h3 class="body_title">スタッフ一覧</h3>
    <div class="staff_list">
        @foreach ($staffs as $staff)
        <ul class="staff_list_item">
            <a href="{{ route('staff.detail', ['id' => $staff->id]) }}">
            <li><img src="{{ asset('/storage/head_shot/' . $staff->id) }}" this.onerror = null; this.src=></li>
            <li>{{ $staff->staff_name }}</li>
            </a>
        </ul>
        @endforeach
    </div>

@endsection
