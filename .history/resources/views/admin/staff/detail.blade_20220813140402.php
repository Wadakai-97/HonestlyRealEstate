@extends('layouts.admin')
@section('title', 'スタッフ：詳細画面')
@section('body')
<h2>スタッフ：詳細画面</h2>
<table>
    <colgroup>
        <col style="width: 30%;">
        <col style="width: 70%;">
    </colgroup>
    <thead>
        <tr>
            <th colspan=2 class="table_top">登録内容</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>スタッフ名</th>
            <td>
                {{ $staff->staff_name }}
            </td>
        </tr>
        <tr>
            <th>顔写真</th>
            <td>
                <img src="{{ asset('/storage/head_shots/' . $staff->head_shot) }}" onerror="this.onerror=null;this.src='{{ asset('/storage/no_image.jpg') }}'" class="image">
            </td>
        </tr>
        <tr>
            <th>役職</th>
            <td>
                {{ $staff->position }}
            </td>
        </tr>
        <tr>
            <th>契約数</th>
            <td>
                {{ $staff->number_of_contracts }}件
            </td>
        </tr>
        <tr>
            <th>出生地</th>
            <td>
                {{ $staff->birthplace }}
            </td>
        </tr>
        <tr>
            <th>趣味</th>
            <td>
                {{ $staff->hobby }}
            </td>
        </tr>
        <tr>
            <th>コメント</th>
            <td>
                {{ $staff->comment }}
            </td>
        </tr>
    </tbody>
</table>

<button onclick="location.href='{{ route('admin.staff.edit', ['id' => $staff->id]) }}'">編集</button>
@endsection
