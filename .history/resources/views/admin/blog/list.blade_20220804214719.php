@extends('layouts.admin')
@section('title', 'ブログ一覧')
@section('body')
<h2>ブログ一覧</h2>

<table class="list">
    <colgroup>
        <col style="width: 25%;">
        <col style="width: 10%;">
        <col style="width: 55%;">
        <col style="width: 5%;">
    </colgroup>
    <thead>
        <tr>
            <th>タイトル</th>
            <th>スタッフ</th>
            <th>内容</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($blos as $blo)
            <tr>
                <td class="hidden">{{ $blo->id }}</td>
                <td>{{ $blo->name }}</td>
                <td>{{ $blo->blo_area }}</td>
                <td>{{ $blo->price }}</td>
                <td>{{ $blo->pref }}{{ $blo->municipalities }}{{ $blo->block }}</td>
                <td>
                    <form methid="POST" action="{{ route('admin.bloRecommend.signUp', ['id' => $blo->id]) }}">
                        @csrf
                        <input type="submit" id="bloRecommend" value="おすすめ登録">
                    </form>
                </td>
                <td><button onclick="location.href='{{ route('admin.blo.detail', ['id' => $blo->id]) }}'">詳細</button></td>
                <td><button id="bloDelete">削除</button></td>
            </tr>
        @empty
            <p>現在登録されている土地はありません。</p>
        @endforelse
    </tbody>
</table>
@endsection
