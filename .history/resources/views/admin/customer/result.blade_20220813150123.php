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
            @if(!empty(request()->address))
                【住所】{{ $request->address }}
            @endif
            @if(!empty(request()->lowest_price) && empty(request()->highest_price))
                【最低価格】{{ $request->lowest_price }}万円
            @endif
            @if(empty(request()->lowest_price) && !empty(request()->highest_price))
                【最高価格】{{ $request->highest_price }}万円
            @endif
            @if(!empty(request()->lowest_price) && !empty(request()->highest_price))
                【最低価格〜最高価格】{{ $request->lowest_price }}万円〜{{ $request->highest_price }}万円
            @endif
            @if(!empty(request()->lowest_occupation_area) && empty(request()->highest_occupation_area))
                【最低専有面積】{{ $request->lowest_occupation_area }}㎡
            @endif
            @if(empty(request()->lowest_occupation_area) && !empty(request()->highest_occupation_area))
                【最高専有面積】{{ $request->highest_occupation_area }}㎡
            @endif
            @if(!empty(request()->lowest_occupation_area) && !empty(request()->highest_occupation_area))
                【最低専有面積〜最高専有面積】{{ $request->lowest_occupation_area }}㎡〜{{ $request->highest_occupation_area }}㎡
            @endif
            @if(!empty(request()->plan))
                【間取り】
                @foreach($request->plan as $plan)
                    {{ $plan }}K/DK/LDK
                @endforeach
            @endif
            @if(!empty(request()->old))
                【築年数】{{ $request->old }}年以内
            @endif
            @if(!empty(request()->station))
                【最寄り駅】{{ $request->station }}
            @endif
            @if(!empty(request()->walking_distance_station))
                【駅徒歩】{{ $request->walking_distance_station }}分
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
