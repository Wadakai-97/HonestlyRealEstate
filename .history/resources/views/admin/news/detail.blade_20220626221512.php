@extends('layouts.admin')
@section('title', 'ニュース：新規登録')
@section('body')
<h2>ニュース：新規登録</h2>
<form action="{{ route('admin.news.edit', ['id' => $news->id]) }}">
    @csrf
    <table>
        <tbody>
            <tr>
                <th colspan=2 class="table_top">登録内容</th>
            </tr>
            <tr>
                <th>タイトル</th>
                <td>
                    {{ $news->title }}
                </td>
            </tr>
            <tr>
                <th>画像</th>
                <td>
                </td>
            </tr>
            <tr>
                <th>ニュース内容</th>
                <td>
                    {{ $news->body }}
                </td>
            </tr>
        </tbody>
    </table>
    <input type="submit" value="編集する" class="show_edit_btn">
</form>
@endsection
