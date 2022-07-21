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
                <th><label class="required">お問い合わせ種類</label></th>
                <td><label name="contents"><input type="checkbox" value="購入相談したい" name="contents[]">購入相談したい</label></td>
                <td><label name="contents"><input type="checkbox" value="売却相談したい" name="contents[]">売却相談したい</label></td>
                <td><label name="contents"><input type="checkbox" value="賃貸相談したい" name="contents[]">賃貸相談したい</label></td>
                <td><label name="contentz"><input type="checkbox" value="その他の相談をしたい" name="contents[]">その他の相談をしたい</label></td>
            </tr>
            <tr>
                <th><label class="required">お問い合わせ内容</label></th>
                <td colspan="4"><textarea placeholder="今週の土曜日１０時に５名で購入相談と物件見学を希望します。希望条件は〇〇のため、事前にご用意いただけますと幸いです。"></textarea></td>
            </tr>
        </table>

        <label for="personal_informations"><input type="checkbox" class="personal_informations"><a href="">個人情報の取り扱いについて</a></label><br>

        <button type="submit">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front text">同意して次へ進む</span>
        </button>
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
