@extends('layouts.user')
@section('title', 'HRE')
@section('body')
<video width="100%" height="80%" src="/storage/company/video.mp4" loop autoplay muted class="video"></video>

<h3 class="body_title">Staffs</h3>
<a href="{{ route('staff') }}">スタッフ紹介はこちら</a>

<h3 class="body_title">News</h3>
<a href="{{ route('news') }}">ニュース一覧はこちら</a>

<h3 class="body_title">New Arrivals</h3>
<a href="">新着物件はこちら</a>

<h3 class="body_title">Customer Review</h3>
<a href="{{ route('review') }}">お客様の声はこちら</a>

<h3 class="body_title">Appointment</h3>
<div class="contact_form">
    <form method="POST" action="{{ route('contact.confirm') }}"` class="contact_form">
        @csrf
        <table class="single_table">
            <tr>
                <th>
                    <label class="required">お名前</label>
                </th>
                <td>
                    <div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
                        <input name="name" type="text" old="{{ old('name') }}" placeholder="正直 太郎">
                        <span class="help-block">{{$errors->first('name')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label class="required">メールアドレス</label>
                </th>
                <td>
                    <div class="form-group @if(!empty($errors->first('email'))) has-error @endif">
                        <input name="email" type="email" value="{{ old('email') }}" placeholder="HRE@gmail.com">
                        <span class="help-block">{{$errors->first('email')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label class="required">電話番号</label>
                </th>
                <td>
                    <div class="form-group @if(!empty($errors->first('phone'))) has-error @endif">
                        <input name="phone" type="text" value="{{ old('phone') }}" placeholder="000-0000-0000">
                        <span class="help-block">{{$errors->first('phone')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label class="required">住所</label>
                </th>
                <td>
                    <div class="form-group @if(!empty($errors->first('address'))) has-error @endif">
                        <input name="address" type="text" value="{{ old('address') }}">
                        <span class="help-block">{{$errors->first('address')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label class="required">お問い合わせ詳細</label>
                </th>
                <td>
                    <div class="multiple_answers">
                        <label name="contents"><input type="checkbox" value="購入相談したい" name="contents[]"> 購入相談したい</label>
                        <label name="contents"><input type="checkbox" value="売却相談したい" name="contents[]"> 売却相談したい</label>
                        <label name="contents"><input type="checkbox" value="賃貸相談したい" name="contents[]"> 賃貸相談したい</label>
                        <label name="contents"><input type="checkbox" value="その他の相談をしたい" name="contents[]"> その他の相談をしたい</label>
                    </div>
                </td>
            </tr>
            <tr class="small_textarea">
                <th>
                    <label class="required">お問い合わせ内容</label>
                </th>
                <td>
                    <div class="form-group @if(!empty($errors->first('messages'))) has-error @endif">
                        <textarea value="{{ old('messages') }}" placeholder="今週の土曜日１０時に５名で購入相談と物件見学を希望します。"></textarea>
                        <span class="help-block">{{$errors->first('messages')}}</span>
                    </div>
                </td>
            </tr>
        </table>

        <button class="submit_button" type="submit">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front text">お問い合わせ(無料)</span>
        </button>
    </form>
</div>

<h3 class="body_title">会員登録</h3>
<a href="{{ route('home') }}">無料会員登録はこちら</a>

<h3 class="body_title">FAQ</h3>
<div class="faq">
    <ul class="faq_list">
        <li><div class="faq_list_menu">Q.よくあるご質問１<span class="icon"></span></div>
        <ul class="subMenu">
            <li>A.回答１</li>
        </ul>
        </li>
        <li><div class="faq_list_menu">Q.よくあるご質問２<span class="icon"></span></div>
        <ul class="subMenu">
            <li>A.回答２</li>
        </ul>
        </li>
        <li><div class="faq_list_menu">Q.よくあるご質問３<span class="icon"></span></div>
        <ul class="subMenu">
            <li>A.回答３</li>
        </ul>
        </li>
        <li><div class="faq_list_menu">Q.よくあるご質問４<span class="icon"></span></div>
        <ul class="subMenu">
            <li>A.回答４</li>
        </ul>
        </li>
    </ul>
</div>
@endsection
