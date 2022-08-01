<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/user.js') }}"></script>
    <script>
        $(function() {
    $.getJSON("{{ asset('/json/pref_municipalities.json')}}", function(data) {
        for(var i=1; i<48; i++) {
        var code = ('00'+code).slice(-2); // ゼロパディング
        $('#select-pref').append('<option value="'+code+'">'+data[i-1][code].pref+'</option>');
        }
    });
});

// 都道府県メニューに連動した市区町村フォーム生成
    $('#select-pref').on('change', function() {
    $('#select-city option:nth-child(n+2)').remove(); // ※1 市区町村フォームクリア
        var select_pref = ('00'+$('#select-pref option:selected').val()).slice(-2);
        var key = Number(select_pref)-1;
        $.getJSON("{{ asset('/json/pref_municipalities.json')}}", function(data) {
        for(var i=0; i<data[key][select_pref].city.length; i++){
            $('#select-city').append('<option value="'+data[key][select_pref].city[i].id+'">'+data[key][select_pref].city[i].name+'</option>');
        }
    });
    });
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/user.css') }}">
</head>
<body>
    <div class="content">
        <div id="topBtn">TOP</div>
    </div>
    <header>
        <div class="header_top">
            <a href="{{ route('hre')}}"><img src="/storage/company/logo.png" alt="企業ロゴ" class="header_top_logo"></a>
        </div>
        <ul class="header_nav_list">
            <li><a href="{{ route('buy') }}">買いたい</a></li>
            <li><a href="{{ route('sell') }}">売りたい</a></li>
            <li><a href="{{ route('rent') }}">借りたい</a></li>
            <li><a href="{{ route('other') }}">その他</a></li>
        </ul>
    </header>

    @yield('body')

    <h2 class="footer_title">Contact</h2>
    <div class="footer_top">
        <img src="/storage/company/exterior.jpeg" alt="会社外観" class="footer_top_company_image">
        <div class="footer_top_about_company">
            <h3>正直不動産株式会社</h3>
            <p>〒231-0824</p>
            <p>神奈川横浜市中区本牧三之谷９−３</p>
            <a class="company_tel" href="tel:000-000-0000"><h2>TEL : 000-000-0000</h2></a>
            <p>営業時間 9:30〜21:00</p>
            <p>定休日 毎週水曜日</p>
        </div>
    </div>
</body>

<footer>
    <div class="footer_list">
        <div class="footer_menu">
            <a href="{{ route('buy') }}"><h2>買いたい</h2></a>
            <ul>
                <a href=""><li>新築戸建を探す</li></a>
                <a href=""><li>中古戸建を探す</li></a>
                <a href="{{ route('mansion') }}"><li>マンションを探す</li></a>
                <a href=""><li>土地を探す</li></a>
                <a href=""><li>学区から探す</li></a>
            </ul>
        </div>
        <div class="footer_menu">
            <a href=""><h2>売りたい</h2></a>
            <ul>
                <a href=""><li>無料査定</li></a>
                <a href=""><li>売却方法について</li></a>
                <a href=""><li>よくある質問</li></a>
                <a href=""><li>売却サポートについて</li></a>
                <a href=""><li>WEB査定依頼はこちら</li></a>
            </ul>
        </div>
        <div class="footer_menu">
            <a href=""><h2>HREについて</h2></a>
            <ul>
                <a href="{{ route('staff') }}"><li>スタッフ紹介</li></a>
                <a href=""><li>スタッフブログ</li></a>
                <a href="{{ route('company') }}"><li>会社概要</li></a>
                <a href="{{ route('review') }}"><li>お客様の声</li></a>
                <a href="{{ route('news') }}"><li>ニュース</li></a>
            </ul>
        </div>

        <p class="copyright">©2022 HRE Corporation.</p>
    </div>
</footer>
</html>
