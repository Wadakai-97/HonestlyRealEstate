@extends('layouts.user')
@section('title', 'HRE')
@section('body')
<video width="100%" height="80%" src="/storage/company/video.mp4" loop autoplay muted class="video"></video>

<h3 class="body_title">Staffs</h1>
<a href="{{ route('staff') }}">スタッフ紹介はこちら</a>

<h3 class="body_title">News</h1>
<a href="{{ route('news') }}">ニュース一覧はこちら</a>
<h3 class="body_title">New Arrivals</h1>
<a href="">新着物件はこちら</a>
<h3 class="body_title">Customer Review</h1>
<a href="{{ route('review') }}">お客様の声はこちら</a>

<h3 class="body_title">Appointment</h1>
<div class="contact_form">
    <form method="POST" action="{{ route('contact.confirm') }}"` class="contact_form">
        @csrf
        <table>
            <tr>
                <th><label>お名前</label></th><td colspan="4"><input name="name" type="text" placeholder="正直 太郎"></td>
            </tr>
            <tr>
                <th><label>メールアドレス</label></th><td colspan="4"><input name="mail" type="text" placeholder="HRE@gmail.com"></td>
            </tr>
            <tr>
                <th><label>電話番号</label></th><td  colspan="4"><input name="phone" type="text" placeholder="000-0000-0000"></td>
            </tr>


            <tr>
                <th><label class="required">お名前</label></th>
                <td colspan="4"><input name="name" type="text" placeholder="正直 太郎"></td>
            </tr>
            <tr>
                <th><label class="required">メールアドレス</label></th>
                <td colspan="4"><input name="email" type="email" placeholder="HRE@gmail.com"></td>
            </tr>
            <tr>
                <th><label>電話番号</label></th>
                <td colspan="4"><input name="phone" type="text" placeholder="000-0000-0000"></td>
            </tr>
            <tr>
                <th><label>住所</label></th>
                <td colspan="4"><input name="phone" type="text"></td>
            </tr>
            <tr>
                <th rowspan="3"><label class="required">お問い合わせ種類</label></th>
                <td><label name="contents"><input type="checkbox" value="実際に物件を見たい" name="contents[]">実際に物件を見たい</label></td>
                <td><label name="contents"><input type="checkbox" value="詳細な資料が欲しい" name="contents[]">詳細な資料がほしい</label></td>
                <td><label name="contents"><input type="checkbox" value="住宅購入に関して相談したい" name="contents[]">住宅購入に関して相談したい</label></td>
                <td><label name="contents"><input type="checkbox" value="希望条件に沿う物件を見学したい" name="contents[]">類似物件も見たい</label></td>
            </tr>
            <tr>
                <th><label class="required">お問い合わせ内容</label></th>
                <td colspan="4"><textarea name="detail" placeholder="今週の土曜日１０時に５名で購入相談と物件見学を希望します。希望条件は〇〇のため、事前にご用意いただけますと幸いです。"></textarea></td>
            </tr>

            <tr>
                <th rowspan="3"><label>お問い合わせ内容</label></th>
                <td><label name="contents"><input type="checkbox" value="購入相談したい" name="contents[]">購入相談したい</label></td>
                <td><label name="contents"><input type="checkbox" value="売却相談したい" name="contents[]">売却相談したい</label></td>
                <td><label name="contents"><input type="checkbox" value="賃貸相談したい" name="contents[]">賃貸相談したい</label></td>
                <td><label name="contentz"><input type="checkbox" value="その他の相談をしたい" name="contents[]">その他の相談をしたい</label></td>
                <tr><td colspan="4"><input name="date" type="date" ></td></tr>
                <tr><td colspan="4"><textarea placeholder="今週の土曜日１０時に５名で購入相談と物件見学を希望します。希望条件は〇〇のため、事前にご用意いただけますと幸いです。"></textarea></td>
            </tr>
        </table>

        <a href=""><p>個人情報の取り扱いについて</p></a><br>

        <button type="submit">同意して次へ進む</button>
    </form>
</div>

<h3 class="body_title">よくあるご質問</h1>
<div class="faq">
    <ul class="faq_list">
        <li><div class="faq_list_menu">Q.よくある質問１<span class="icon"></span></div>
        <ul class="subMenu">
            <li>A.よくある回答１</li>
        </ul>
        </li>
        <li><div class="faq_list_menu">Q.よくある質問１<span class="icon"></span></div>
        <ul class="subMenu">
            <li>A.よくある回答１</li>
        </ul>
        </li>
        <li><div class="faq_list_menu">Q.よくある質問１<span class="icon"></span></div>
        <ul class="subMenu">
            <li>A.よくある回答１</li>
        </ul>
        </li>
        <li><div class="faq_list_menu">Q.よくある質問１<span class="icon"></span></div>
        <ul class="subMenu">
            <li>A.よくある回答１</li>
        </ul>
        </li>
    </ul>
</div>
@endsection
