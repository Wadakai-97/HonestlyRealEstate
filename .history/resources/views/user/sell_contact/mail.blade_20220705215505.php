{!! $name !!}様<br>

この度は正直不動産株式会社へお問い合わせいただき誠にありがとうございます。

----------------------------------------------------------<br>
お 問 い 合 わ せ 内 容<br>

お名前：{!! $name !!}様<br>
メールアドレス：{!! $email !!}<br>
電話番号：{!! $phone !!}<br>
相談内容：
{{ $inputs['address'] }}
<input name="address" value="{{ $inputs['address'] }}" type="hidden">

<label>住所</label>
{{ $inputs['type'] }}
<input name="type" value="{{ $inputs['type'] }}" type="hidden">

<label>お問い合わせ内容</label>
{{ $inputs['contents'] }}
<input name="contents" value="{{ $inputs['contents'] }}" type="hidden">

----------------------------------------------------------<br>

不動産を通じて{!! $name !!}様のお力になることをお約束します。<br>

折返しの連絡まで少々お待ちくださいませ。<br>


正直不動産株式会社<br>
〒231-0824<br>
神奈川県横浜市中区本牧三之谷9-3<br>
TEL : 000-000-0000<br>
営業時間 9:30〜21:00<br>
定休日 毎週水曜日<br>
