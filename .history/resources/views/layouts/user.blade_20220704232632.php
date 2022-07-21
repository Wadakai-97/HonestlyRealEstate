<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('/js/user.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
    <script src="https://rawgit.com/HPNeo/gmaps/master/gmaps.js"></script>
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
    <footer>
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

        <div class="footer_list">
            <div class="footer_menu">
                <a href="{{ route('buy') }}"><h2>買いたい</h2>
                <ul>
                    <a href=""><li>新築戸建を探す</li></a>
                    <a href=""><li>中古戸建を探す</li></a>
                    <a href="{{ route('mansion') }}"><li>マンションを探す</li></a>
                    <a href=""><li>土地を探す</li></a>
                    <a href=""><li>学区から探す</li></a>
                </ul>
            </div>
            <div class="footer_menu">
                <a href=""><h2>売りたい</h2>
                <ul>
                    <a href=""><li>無料査定</li></a>
                    <a href=""><li>売却方法について</li></a>
                    <a href=""><li>よくある質問</li></a>
                    <a href=""><li>売却サポートについて</li></a>
                    <a href=""><li>WEB査定依頼はこちら</li></a>
                </ul>
            </div>
            <div class="footer_menu">
                <h2>HREについて</h2>
                <ul>
                    <a href="{{ route('staffs') }}"><li>スタッフ紹介</li></a>
                    <a href=""><li>スタッフブログ</li></a>
                    <a href="{{ route('company') }}"><li>会社概要</li></a>
                    <a href="{{ route('review') }}"><li>お客様の声</li></a>
                    <li>個人情報の取り扱いについて</li>
                </ul>
            </div>

            <p class="copyright">©2022 HRE Corporation.</p>
        </div>
    </footer>
</body>
</html>
