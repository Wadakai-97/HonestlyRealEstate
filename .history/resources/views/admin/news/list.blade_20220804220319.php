@extends('layouts.admin')
@section('title', 'ニュース：一覧表示')
@section('body')
<h2>ニュース：一覧表示</h2>
<table class="list">
    <colgroup>
        <col style="width: 20%;">
        <col style="width: 55%;">
        <col style="width: 15%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>タイトル</th>
            <th>本文</th>
            <th>作成日</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody id="newsList">
        @forelse($customers as $customer)
            <tr>
                <td class="hidden">{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->type }}</td>
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