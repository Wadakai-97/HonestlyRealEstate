@extends('layouts.admin')
@section('title', '顧客情報：検索結果')
@section('body')
<h3>顧客情報：検索結果</h3>

<form action="{{ route('admin.customer.search')}}" method="post" class="filtering_form">
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
                <th>顧客名</th>
                <td>
                    <input type="text" name="customer_name">
                </td>
                <th>種類</th>
                <td>
                    <select name="type">
                        <option disabled selected>-- 未選択 --</option>
                        @foreach (FilteringConsts::TYPE_LIST as $key => $type)
                        <option value="{{ $key }}" @if(old('type') === $type) selected @endif>{{ $type }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>
                    <input type="number" name="phone">
                </td>
                <th>メールアドレス</th>
                <td>
                    <input type="text" name="email">
                </td>
            </tr>
            <tr>
                <th>住所</th>
                <td>
                    <input type="text" name="address">
                </td>
                <th>キーワード検索</th>
                <td>
                    <input type="text" name="keyword">
                </td>
            </tr>
            <tr>
                <th>お問い合わせ日</th>
                <td>
                    <input type="number" name="contact">年以内
                </td>
                <th>情報更新日</th>
                <td>
                    <input type="number" name="update">日以内
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="検索">
</form>

@if(!empty(request()))
    <div class="search_condition">
        <h4>現在の検索条件</h4>
        <p>
            @if(!empty(request()->customer_name))
                【顧客名】{{ $request->customer_name }}
            @endif
            @if(!empty(request()->type))
                【種類】{{ $request->type }}
            @endif
            @if(!empty(request()->phone))
                【電話番号】{{ $request->phone }}
            @endif
            @if(!empty(request()->email))
                【メールアドレス】{{ $request->email }}
            @endif
            @if(!empty(request()->address))
                【住所】{{ $request->address }}
            @endif
            @if(!empty(request()->keyword))
                【キーワード検索】{{ $request->keyword }}
            @endif
            @if(!empty(request()->contact))
                【お問い合わせ日】{{ $request->contact }}年以内
            @endif
            @if(!empty(request()->update))
                【】{{ $request->update }}
            @endif
            @if(!empty(request()->customer_name))
                【】{{ $request->customer_name }}
            @endif
        </p>
    </div>
@endif

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
