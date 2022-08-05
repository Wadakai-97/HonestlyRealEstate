@extends('layouts.admin')
@section('title', 'スタッフ：一覧表示')
@section('body')
<h2>スタッフ:一覧表示</h2>
<table class="list">
    <colgroup>
        <col style="width: 60%;">
        <col style="width: 30%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>スタッフ名</th>
            <th>役職</th>
            <th colspan=2></th>
        </tr>
    </thead>
    <tbody>
        @forelse($staffs as $staff)
            <tr>
                <td class="hidden">{{ $staff->id }}</td>
                <td>{{ $staff->staff_name }}</td>
                <td>{{ $staff->position }}</td>
                <td><button onclick="location.href='{{ route('admin.staff.detail', ['id' => $staff->id]) }}'">詳細</button></td>
                <td><button id="staffDelete">削除</button></td>
            </tr>
        @empty
            <p>現在登録されているニュースニュースはありません。</p>
        @endforelse
    </tbody>
</table>

{{ $staffs->links() }}

@endsection
