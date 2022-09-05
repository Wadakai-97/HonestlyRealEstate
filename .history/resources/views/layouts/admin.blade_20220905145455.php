<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>管理画面</title>
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/address.js') }}"></script>
    <script src="//maps.googleapis.com/maps/api/js?key={AIzaSyDu-mYHHg2SF21ma5jqg5voMadT113Yzr8}&lang="></script>

    {{-- 物件削除 --}}
    {{-- おすすめ物件 --}}
    <script>
        $(function() {
            $(document).on('click', '#recommendDelete', function() {
                var delete_confirm = confirm('お気に入り物件から削除しますか？');
                if(delete_confirm == true) {
                    var id = $(this).closest('td').children('#propertyId').val();
                    var target = $(this).closest('tr');
                    console.log('これから削除を始めます');
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "delete/" + id,
                        data: {"id": id,
                                "methid": "delete"}
                    }).done(function() {
                        target.hide();
                        alert('削除に成功しました。')
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log("jqXHR      :" + jqXHR.status);
                        console.log("textStatus :" + textStatus);
                        console.log("errorThrown:" + errorThrown.message);
                        alert('削除に失敗しました。');
                    });
                } else {
                    (function(e) {
                        e.preventDefault()
                    });
                };
                return false;
            });
            }
        );
    </script>
    {{-- 新築戸建 --}}
    <script>
        $(function() {
            $(document).on('click', '#newDetachedHouseDelete', function() {
                var delete_confirm = confirm('物件情報を削除しますか？');
                if(delete_confirm == true) {
                    var id = $(this).closest('tr').children('td')[0].innerText;
                    var target = $(this).closest('tr');
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "/public/new_detached_house/delete/" + id,
                        data: {"id": id,
                                "_method": "delete",}
                    }).done(function() {
                        target.hide();
                        alert('削除に成功しました。');
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log("jqXHR      :" + jqXHR.status);
                        console.log("textStatus :" + textStatus);
                        console.log("errorThrown:" + errorThrown.message);
                        alert('削除に失敗しました。')
                    });
                } else {
                    (function(e) {
                        e.preventDefault()
                    });
                };
                return false;
            });
            }
        );
    </script>
    {{-- 新築分譲住宅 --}}
    <script>
        $(function() {
            $(document).on('click', '#newDetachedHouseGroupDelete', function() {
                var delete_confirm = confirm('物件情報を削除しますか？');
                if(delete_confirm == true) {
                    var id = $(this).closest('tr').children('td')[0].innerText;
                    var target = $(this).closest('tr');
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "/public/new_detached_house_group/delete/" + id,
                        data: {"id": id,
                                "_method": "delete",}
                    }).done(function() {
                        target.hide();
                        alert('削除に成功しました。');
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log("jqXHR      :" + jqXHR.status);
                        console.log("textStatus :" + textStatus);
                        console.log("errorThrown:" + errorThrown.message);
                        alert('削除に失敗しました。')
                    });
                } else {
                    (function(e) {
                        e.preventDefault()
                    });
                };
                return false;
            });
            }
        );
    </script>
    {{-- 中古戸建 --}}
    <script>
        $(function() {
            $(document).on('click', '#oldDetachedHouseDelete', function() {
                var delete_confirm = confirm('物件情報を削除しますか？');
                if(delete_confirm == true) {
                    var id = $(this).closest('tr').children('td')[0].innerText;
                    var target = $(this).closest('tr');
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "/public/old_detached_house/delete/" + id,
                        data: {"id": id,
                                "_method": "delete",}
                    }).done(function() {
                        target.hide();
                        alert('削除に成功しました。');
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log("jqXHR      :" + jqXHR.status);
                        console.log("textStatus :" + textStatus);
                        console.log("errorThrown:" + errorThrown.message);
                        alert('削除に失敗しました。')
                    });
                } else {
                    (function(e) {
                        e.preventDefault()
                    });
                };
                return false;
            });
            }
        );
    </script>
    {{-- マンション --}}
    <script>
        $(function() {
            $(document).on('click', '#mansionDelete', function() {
                var delete_confirm = confirm('物件情報を削除しますか？');
                if(delete_confirm == true) {
                    var id = $(this).closest('tr').children('td')[0].innerText;
                    var target = $(this).closest('tr');
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "/public/mansion/delete/" + id,
                        data: {"id": id,
                                "_method": "delete",}
                    }).done(function() {
                        target.hide();
                        alert('削除に成功しました。');
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log("jqXHR      :" + jqXHR.status);
                        console.log("textStatus :" + textStatus);
                        console.log("errorThrown:" + errorThrown.message);
                        alert('削除に失敗しました。')
                    });
                } else {
                    (function(e) {
                        e.preventDefault()
                    });
                };
                return false;
            });
            }
        );
    </script>
    {{-- 土地 --}}
    <script>
        $(function() {
            $(document).on('click', '#landDelete', function() {
                var delete_confirm = confirm('物件情報を削除しますか？');
                if(delete_confirm == true) {
                    var id = $(this).closest('tr').children('td')[0].innerText;
                    var target = $(this).closest('tr');
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "/public/land/delete/" + id,
                        data: {"id": id,
                                "_method": "delete",}
                    }).done(function() {
                        target.hide();
                        alert('削除に成功しました。');
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log("jqXHR      :" + jqXHR.status);
                        console.log("textStatus :" + textStatus);
                        console.log("errorThrown:" + errorThrown.message);
                        alert('削除に失敗しました。')
                    });
                } else {
                    (function(e) {
                        e.preventDefault()
                    });
                };
                return false;
            });
            }
        );
    </script>
    {{-- 顧客 --}}
    <script>
        $(function() {
            $(document).on('click', '#customerDelete', function() {
                var delete_confirm = confirm('お客様情報を削除しますか？');
                if(delete_confirm == true) {
                    var id = $(this).closest('tr').children('td')[0].innerText;
                    var target = $(this).closest('tr');
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "/public/customer/delete/" + id,
                        data: {"id": id,
                                "_method": "delete",}
                    }).done(function() {
                        target.hide();
                        alert('削除に成功しました。');
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log("jqXHR      :" + jqXHR.status);
                        console.log("textStatus :" + textStatus);
                        console.log("errorThrown:" + errorThrown.message);
                        alert('削除に失敗しました。')
                    });
                } else {
                    (function(e) {
                        e.preventDefault()
                    });
                };
                return false;
            });
            }
        );
    </script>


    {{-- スタッフ --}}
    {{-- 削除 --}}
    <script>
        $(function() {
            $(document).on('click', '#staffDelete', function() {
                var delete_confirm = confirm('このスタッフを削除しますか？');
                if(delete_confirm == true) {
                    var id = $(this).closest('tr').children('td')[0].innerText;
                    var target = $(this).closest('tr');
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "/public/staff/delete/" + id,
                        data: {"id": id,
                                "_method": "delete",}
                    }).done(function() {
                        target.hide();
                        alert('削除に成功しました。');
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log("jqXHR      :" + jqXHR.status);
                        console.log("textStatus :" + textStatus);
                        console.log("errorThrown:" + errorThrown.message);
                        alert('削除に失敗しました。')
                    });
                } else {
                    (function(e) {
                        e.preventDefault()
                    });
                };
                return false;
            });
            }
        );
    </script>
    {{-- 画像削除 --}}
    <script>
        $(function() {
            $(document).on('click', '#headShotDelete', function() {
                var id =  $(this).closest('tr').children('td')[0].innerText;
                var delete_confirm = confirm('この画像を削除しますか？');
                if(delete_confirm == true) {
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "/public/staff/image_delete/" + id,
                        data: {"id": id,
                                "_method": "delete",}
                    }).done(function() {
                        $('#exImage').attr('src', '');
                        alert('削除に成功しました。');
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log("jqXHR      :" + jqXHR.status);
                        console.log("textStatus :" + textStatus);
                        console.log("errorThrown:" + errorThrown.message);
                        alert('削除に失敗しました。')
                    });
                } else {
                    (function(e) {
                        e.preventDefault()
                    });
                };
                return false;
            });
            }
        );
    </script>

    {{-- ブログ --}}
    {{-- 削除 --}}
    <script>
        $(function() {
            $(document).on('click', '#blogDelete', function() {
                var delete_confirm = confirm('このブログを削除しますか？');
                if(delete_confirm == true) {
                    var id = $(this).closest('tr').children('td')[0].innerText;
                    var target = $(this).closest('tr');
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "/public/blog/delete/" + id,
                        data: {"id": id,
                                "_method": "delete",}
                    }).done(function() {
                        target.hide();
                        alert('削除に成功しました。');
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log("jqXHR      :" + jqXHR.status);
                        console.log("textStatus :" + textStatus);
                        console.log("errorThrown:" + errorThrown.message);
                        alert('削除に失敗しました。')
                    });
                } else {
                    (function(e) {
                        e.preventDefault()
                    });
                };
                return false;
            });
            }
        );
    </script>
    {{-- 画像削除 --}}
    <script>
        $(function() {
            $(document).on('click', '#blogImageDelete', function() {
                var id =  $(this).closest('tr').children('td')[0].innerText;
                var delete_confirm = confirm('この画像を削除しますか？');
                if(delete_confirm == true) {
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "/public/blog/image_delete/" + id,
                        data: {"id": id,
                                "_method": "delete",}
                    }).done(function() {
                        $('#exImage').attr('src', '');
                        alert('削除に成功しました。');
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log("jqXHR      :" + jqXHR.status);
                        console.log("textStatus :" + textStatus);
                        console.log("errorThrown:" + errorThrown.message);
                        alert('削除に失敗しました。')
                    });
                } else {
                    (function(e) {
                        e.preventDefault()
                    });
                };
                return false;
            });
            }
        );
    </script>

    {{-- ニュース --}}
    {{-- 削除 --}}
    <script>
        $(function() {
            $(document).on('click', '#newsDelete', function() {
                var delete_confirm = confirm('この記事を削除しますか？');
                if(delete_confirm == true) {
                    var id = $(this).closest('tr').children('td')[0].innerText;
                    var target = $(this).closest('tr');
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "/public/news/delete/" + id,
                        data: {"id": id,
                                "_method": "delete",}
                    }).done(function() {
                        target.hide();
                        alert('削除に成功しました。');
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log("jqXHR      :" + jqXHR.status);
                        console.log("textStatus :" + textStatus);
                        console.log("errorThrown:" + errorThrown.message);
                        alert('削除に失敗しました。')
                    });
                } else {
                    (function(e) {
                        e.preventDefault()
                    });
                };
                return false;
            });
            }
        );
    </script>
    {{-- 画像削除 --}}
    <script>
        $(function() {
            $(document).on('click', '#newsImageDelete', function() {
                var id =  $(this).closest('tr').children('td')[0].innerText;
                var delete_confirm = confirm('この画像を削除しますか？');
                if(delete_confirm == true) {
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "/public/news/image_delete/" + id,
                        data: {"id": id,
                                "_method": "delete",}
                    }).done(function() {
                        $('#exImage').attr('src', '');
                        alert('削除に成功しました。');
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        console.log("jqXHR      :" + jqXHR.status);
                        console.log("textStatus :" + textStatus);
                        console.log("errorThrown:" + errorThrown.message);
                        alert('削除に失敗しました。')
                    });
                } else {
                    (function(e) {
                        e.preventDefault()
                    });
                };
                return false;
            });
            }
        );
    </script>
</head>
<body>
    <header>
        <h5><a href="{{ route('admin.top')}}">Honestly Real Estate.Inc</a></h5>
    </header>
    @yield('body')
</body>
</html>
