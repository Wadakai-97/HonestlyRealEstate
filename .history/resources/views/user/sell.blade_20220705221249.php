@extends('layouts.user')
@section('title', '売却')
@section('body')
<h3 class="part_title">売りたい</h3>

<form method="POST" action="{{ route('contact.sellSend') }}" class="contact_form">
    @csrf
    <table>
        <tr><th><label class="required">お名前</label></th><td colspan="4"><input name="name" type="text" placeholder="正直 太郎"></td></tr>
        <tr><th><label class="required">メールアドレス</label></th><td colspan="4"><input name="email" type="text" placeholder="HRE@gmail.com"></td></tr>
        <tr><th><label>電話番号</label></th><td  colspan="4"><input name="phone" type="text" placeholder="000-0000-0000"></td></tr>
        <tr><th rowspan="3"><label class="required">お問い合わせ内容</label></th>
            <td><label name="contents"><input type="checkbox" value="実際に物件を見たい" name="contents[]">実際に物件を見たい</label></td>
            <td><label name="contents"><input type="checkbox" value="詳細な資料が欲しい" name="contents[]">詳細な資料がほしい</label></td>
            <td><label name="contents"><input type="checkbox" value="住宅購入に関して相談したい" name="contents[]">住宅購入に関して相談したい</label></td>
            <td><label name="contentz"><input type="checkbox" value="希望条件に沿う物件を見学したい" name="contents[]">類似物件も見たい</label></td>
            <tr><td colspan="4"><input name="date" type="date" ></td></tr>
            <tr><td colspan="4"><textarea placeholder="今週の土曜日１０時に５名で購入相談と物件見学を希望します。希望条件は〇〇のため、事前にご用意いただけますと幸いです。"></textarea></td></tr>
    </table>

    <a href=""><p>個人情報の取扱について</p></a><br>

    <button type="submit">同意して次へ進む</button>
</form>

@endsection
