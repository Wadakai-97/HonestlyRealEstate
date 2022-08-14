@extends('layouts.admin')
@section('title', '顧客情報：一覧画面')
@section('body')
<h3>顧客情報：一覧画面</h3>

<form action="{{ route('admin.land.search')}}" method="post" class="filtering_form">
    @csrf
    <table class="filtering_table">
        <colgroup>
            <col style="width: 15%;">
            <col style="width: 35%;">
            <col style="width: 15%;">
            <col style="width: 35%;">
        </colgroup>
        <thead>
            <h3>検索条件</h3>
        </thead>
        <tbody>
            <tr>
                <th>顧客氏名</th>
                <td>
                    <input type="text">
                </td>
                <th>種類</th>
                <td>
                    <select name="type"></select>
                </td>
            </tr>
            <tr>
                <th>お問い合わせ日</th>
                <td>

                </td>
                <th>キーワード検索</th>
                <td>
                    <input type="text">
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="検索">
</form>

<table class="list">
    <colgroup>
        <col style="width: 20%;">
        <col style="width: 10%;">
        <col style="width: 45%;">
        <col style="width: 15%;">
        <col style="width: 5%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>お客様名</th>
            <th>種類</th>
            <th>お問い合わせ内容</th>
            <th>お問い合わせ日</th>
            <th colspan=2></th>
        </tr>
    </thead>
    <tbody>
        @forelse($customers as $customer)
            <tr>
                <td class="hidden">{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->type }}</td>
                <td>{{ $customer->content }}</td>
                <td>{{ $customer->created_at->format('Y年m月d日') }}</td>
                <td><button onclick="location.href='{{ route('admin.customer.detail', ['id' => $customer->id]) }}'">詳細</button></td>
                <td><button id="customerDelete">削除</button></td>
            </tr>
        @empty
            <p>現在登録されているブログはありません。</p>
        @endforelse
    </tbody>
</table>

{{ $customers->links() }}

@endsection
