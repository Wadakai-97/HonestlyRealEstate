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
    {{-- 新築戸建 --}}
    {{-- 一覧 --}}
    <script>
        $(function() {
            $(document).ready(function(data) {
                $.ajax({
                    type: "get",
                    url: "/resources/php/new_detached_house_list.php",
                    datatype: "json",
                }).done(function(data) {
                    $.each(data, function(key, val) {
                        html = `
                            <tr>
                                <td class="hidden">${val.id}</td>
                                <td width="20%">${val.name}</td>
                                <td width="10%">${val.number_of_rooms}${val.type_of_room}</td>
                                <td width="15%">${val.price}万円</td>
                                <td width="20%">${val.municipalities}</td>
                                <td width="10%"><button id="newDetachedHouseDetail" type="button" onclick="newDetachedHouseDetail()">詳細</button></td>
                                <td width="10%"><form method="POST" action="/public/new_detached_house/delete/${val.id}">@csrf<input type="submit" id="newDetachedHouseDelete" value="削除"></form></td>
                            </tr>`
                        $("#newDetachedHouseList").append(html);
                    });
                }).fail(function(jqXHR, textStatus, errorThrown, data) {
                    console.log("jqXHR      :" + jqXHR.status);
                    console.log("textStatus :" + textStatus);
                    console.log("errorThrown:" + errorThrown.message);
                });
                return false;
            });
        });
    </script>
    {{-- 削除 --}}
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

    {{-- 中古戸建 --}}
    {{-- 一覧 --}}
    <script>
        $(function() {
            $(document).ready(function(data) {
                $.ajax({
                    type: "get",
                    url: "/resources/php/old_detached_house_list.php",
                    datatype: "json",
                }).done(function(data) {
                    $.each(data, function(key, val) {
                        html = `
                            <tr>
                                <td class="hidden">${val.id}</td>
                                <td width="20%">${val.name}</td>
                                <td width="10%">${val.number_of_rooms}${val.type_of_room}</td>
                                <td width="15%">${val.price}万円</td>
                                <td width="20%">${val.municipalities}</td>
                                <td width="10%"><button id="oldDetachedHouseDetail" type="button" onclick="oldDetachedHouseDetail()">詳細</button></td>
                                <td width="10%"><form method="POST" action="/public/old_detached_house/delete/${val.id}">@csrf<input type="submit" id="oldDetachedHouseDelete" value="削除"></form></td>
                            </tr>`
                        $("#oldDetachedHouseList").append(html);
                    });
                }).fail(function(jqXHR, textStatus, errorThrown, data) {
                    console.log("jqXHR      :" + jqXHR.status);
                    console.log("textStatus :" + textStatus);
                    console.log("errorThrown:" + errorThrown.message);
                });
                return false;
            });
        });
    </script>
    {{-- 削除 --}}
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
    {{-- 一覧表示 --}}
    <script>
        $(function() {
            $(document).ready(function(data) {
                $.ajax({
                    type: "get",
                    url: "/resources/php/mansion_list.php",
                    datatype: "json",
                }).done(function(data) {
                    $.each(data, function(key, val) {
                        html = `
                            <tr>
                                <td class="hidden">${val.id}</td>
                                <td width="20%">${val.apartment_name}</td>
                                <td width="10%">${val.number_of_rooms}${val.type_of_room}</td>
                                <td width="15%">${val.price}万円</td>
                                <td width="20%">${val.municipalities}</td>
                                <td width="10%"><button id="mansionDetail" type="button" onclick="mansionDetail()">詳細</button></td>
                                <td width="10%"><form method="POST" action="/public/mansion/delete/${val.id}">@csrf<input type="submit" id="mansionDelete" value="削除"></form></td>
                            </tr>`
                        $("#mansionList").append(html);
                    });
                }).fail(function(jqXHR, textStatus, errorThrown, data) {
                    console.log("jqXHR      :" + jqXHR.status);
                    console.log("textStatus :" + textStatus);
                    console.log("errorThrown:" + errorThrown.message);
                });
                return false;
            });
        });
    </script>
    {{-- 削除 --}}
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
    {{-- 一覧 --}}
    <script>
        $(function() {
            $(document).ready(function(data) {
                $.ajax({
                    type: "get",
                    url: "/resources/php/land_list.php",
                    datatype: "json",
                }).done(function(data) {
                    $.each(data, function(key, val) {
                        html = `
                            <tr>
                                <td class="hidden">${val.id}</td>
                                <td width="20%">${val.name}</td>
                                <td width="10%">${val.land_area}㎡</td>
                                <td width="15%">${val.price}万円</td>
                                <td width="20%">${val.municipalities}</td>
                                <td width="10%"><button id="landDetail" type="button" onclick="landDetail()">詳細</button></td>
                                <td width="10%"><form method="POST" action="/public/land/delete/${val.id}">@csrf<input type="submit" id="landDelete" value="削除"></form></td>
                            </tr>`
                        $("#landList").append(html);
                    });
                }).fail(function(jqXHR, textStatus, errorThrown, data) {
                    console.log("jqXHR      :" + jqXHR.status);
                    console.log("textStatus :" + textStatus);
                    console.log("errorThrown:" + errorThrown.message);
                });
                return false;
            });
        });
    </script>
    {{-- 削除 --}}
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

    {{-- スタッフ --}}
    {{-- 一覧表示 --}}
    <script>
        $(function() {
            $(document).ready(function(data) {
                $.ajax({
                    type: "get",
                    url: "/resources/php/staff_list.php",
                    datatype: "json",
                }).done(function(data) {
                    $.each(data, function(key, val) {
                        html = `
                            <tr>
                                <td class="hidden">${val.id}</td>
                                <td width="50%">${val.staff_name}</td>
                                <td width="20%"><button id="staffDetail" type="button" onclick="staffDetail()">詳細</button></td>
                                <td width="20%"><form method="POST" action="/public/staff/delete/${val.id}">@csrf<input type="submit" id="staffDelete" value="削除"></form></td>
                            </tr>`
                        $("#staffList").append(html);
                    });
                }).fail(function(jqXHR, textStatus, errorThrown, data) {
                    console.log("jqXHR      :" + jqXHR.status);
                    console.log("textStatus :" + textStatus);
                    console.log("errorThrown:" + errorThrown.message);
                });
                return false;
            });
        });
    </script>
    {{-- スタッフ削除 --}}
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

    {{-- ブログ --}}
    {{-- 一覧 --}}
    <script>
        $(function() {
            $(document).ready(function(data) {
                $.ajax({
                    type: "get",
                    url: "/resources/php/blog_list.php",
                    datatype: "json",
                }).done(function(data) {
                    $.each(data, function(key, val) {
                        html = `
                            <tr>
                                <td class="hidden">${val.id}</td>
                                <td width="20%">${val.title}</td>
                                <td width="20%">${val.staff_name}</td>
                                <td width="30%">${val.content}</td>
                                <td width="20%"><button id="blogDetail" type="button" onclick="blogDetail()">詳細</button></td>
                                <td width="20%"><form method="POST" action="/public/blog/delete/${val.id}">@csrf<input type="submit" id="blogDelete" value="削除"></form></td>
                            </tr>`
                        $("#blogList").append(html);
                    });
                }).fail(function(jqXHR, textStatus, errorThrown, data) {
                    console.log("jqXHR      :" + jqXHR.status);
                    console.log("textStatus :" + textStatus);
                    console.log("errorThrown:" + errorThrown.message);
                });
                return false;
            });
        });
    </script>
    {{-- ブ削除 --}}
    <script>
        $(function() {
            $(document).on('click', '#blogDelete', function() {
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

    {{-- ニュース --}}
    {{-- 一覧 --}}
    <script>
        $(function() {
            $(document).ready(function(data) {
                $.ajax({
                    type: "get",
                    url: "/resources/php/news_list.php",
                    datatype: "json",
                }).done(function(data) {
                    $.each(data, function(key, val) {
                        html = `
                            <tr>
                                <td class="hidden">${val.id}</td>
                                <td width="20%">${val.title}</td>
                                <td width="30%">${val.body}</td>
                                <td width="20%"><button id="newsDetail" type="button" onclick="newsDetail()">詳細</button></td>
                                <td width="20%"><form method="POST" action="/public/news/delete/${val.id}">@csrf<input type="submit" id="newsDelete" value="削除"></form></td>
                            </tr>`
                        $("#newsList").append(html);
                    });
                }).fail(function(jqXHR, textStatus, errorThrown, data) {
                    console.log("jqXHR      :" + jqXHR.status);
                    console.log("textStatus :" + textStatus);
                    console.log("errorThrown:" + errorThrown.message);
                });
                return false;
            });
        });
    </script>
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
</head>
<body>
    <header>
        <h5><a href="{{ route('admin.top')}}">正直不動産㈱：ホームページ管理画面</a></h5>
    </header>
    @yield('body')
</body>
</html>
