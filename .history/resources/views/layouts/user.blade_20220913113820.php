<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/user.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/user.js') }}"></script>

{{-- おすすめ登録 --}}
    <script>
        $(function() {
            $(document).on('click', '#favoriteMansion', function() {
                var id = $(this).closest('tr').children('td')[0].innerText;
                var id = $(this).closest('tr').children('td')[1].innerText;;
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    url: "hre/favorite/" + id,
                    data: {"id": id,
                            "methid": "post"}
                }).done(function() {
                    target.hide();
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    console.log("jqXHR      :" + jqXHR.status);
                    console.log("textStatus :" + textStatus);
                    console.log("errorThrown:" + errorThrown.message);
                });
            });
            }
        );
    </script>
</head>
<body>
    <div class="content">
        <div id="topBtn">TOP</div>
    </div>
    <header>
        <div class="header">
            <div class="header_top">
                <a href="{{ route('hre')}}"><img src="/storage/company/logo.png" alt="企業ロゴ" class="header_top_logo"></a>
                <div class="header_keyword">
                    <form method="get" action="#" class="search_container">
                        <input type="text" size="30" placeholder="例）横浜　南向き">
                        <input type="submit" value="&#xf002">
                    </form>
                </div>
                @auth
                <form method="post" action="{{ route('member.favorite')}}">
                    @csrf
                        <input type="submit" value="お気に入り物件一覧">
                    </form>
                @endauth
                @guest
                <form method="post" action="{{ route('guest.favorite')}}">
                    @csrf
                        <input type="submit" value="お気に入り物件一覧">
                </form>
                @endguest
            </div>
            @auth
                <div class="header_customer">
                    <div class="header_login">
                        <a href="{{ route('logout') }}" class="btn btn--orange btn--cubic btn--shadow">ログアウト</a>
                    </div>
                </div>
            @endauth
            @guest
                <div class="header_customer">
                    <div class="btn-wrap">
                        <a href="{{ route('register') }}" class="btn btn-c"><span>簡単!<br><em>30秒</em></span>会員登録</small></a>
                    </div>
                    <div class="header_login">
                        <a href="{{ route('login') }}" class="btn btn--orange btn--cubic btn--shadow">ログイン</a>
                    </div>
                </div>
            @endguest
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
