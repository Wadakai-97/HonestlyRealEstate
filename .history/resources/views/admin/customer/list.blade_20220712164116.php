@extends('layouts.admin')
@section('title', 'お客様一覧')
@section('body')
<h2>お客様一覧</h2>

@csrf
<input type="submit" value="物件情報一覧をダウンロードする">
</form>

<table class="list">
    <thead>
        <tr>
            <th>建物名</th>
            <th>間取り</th>
            <th>価格</th>
            <th>住所</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody id="mansionList">
    </tbody>
</table>
@endsection
