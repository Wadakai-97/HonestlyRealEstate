@extends('layouts.admin')
@section('title', 'お客様一覧')
@section('body')
<h2>お客様一覧</h2>

<table class="list">
    <colgroup>
        <col style="width: 20%;">
        <col style="width: 20%;">
        <col style="width: 10%;">
        <col style="width: 20%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>お客様名</th>
            <th>住所</th>
            <th>種類</th>
            <th>内容</th>
            <th>お問い合わせ日</th>
            <th>情報更新日</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($customers as $customer)
            <tr>
                <td class="hidden">{{ $customer->id }}</td>
                <td>{{ $customer->title }}</td>
                <td>{{ $customer->staff->staff_name }}</td>
                <td>{{ $customer->content }}</td>
                <td><button onclick="location.href='{{ route('admin.customer.detail', ['id' => $customer->id]) }}'">詳細</button></td>
                <td><button id="customerDelete">削除</button></td>
            </tr>
        @empty
            <p>現在登録されているブログはありません。</p>
        @endforelse
    </tbody>
</table>
@endsection
