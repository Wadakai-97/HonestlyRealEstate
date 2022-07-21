'use strict'

// 新規登録画面
// 築年月（最高年）
$(function(){
    $(document).on('mousedown keyup', '#year', function(e) {
        var month = parseInt($(this).val());
        var monthMax = parseInt($(this).attr('max'));
        if(month > monthMax){ $(this).val(monthMax); }
        if(isNaN(month)){ $(this).val('1'); }
    });
});
// 築年月（最低月）
$(function(){
    $(document).on('mousedown keyup', '#month', function(e) {
        var month = parseInt($(this).val());
        var monthMax = parseInt($(this).attr('max'));
        var monthMin = parseInt($(this).attr('min'));
        if(month > monthMax){ $(this).val(monthMax); }
        if(month < monthMin){ $(this).val(monthMin); }
        if(isNaN(month)){ $(this).val('1'); }
    });
});
// 築年月（最低日）
$(function(){
    $(document).on('mousedown keyup', '#day', function(e) {
        var day = parseInt($(this).val());
        var dayMax = parseInt($(this).attr('max'));
        var dayMin = parseInt($(this).attr('min'));
        if(day > dayMax){ $(this).val(dayMax); }
        if(day < dayMin){ $(this).val(dayMin); }
        if(isNaN(day)){ $(this).val('1'); }
    });
});

// 路線
$(function(){
    const api = '//express.heartrails.com/api/json';
    //エリアデータ取得
    $.ajax({
        dataType : 'jsonp',
        url: api + '?method=getAreas',
        success: function( result ){
            if( result.response.area ){
                let area = '<option value="">選択してください。</option>';
                $.each(result.response.area, function(index, value){
                    area += '<option value="' + value + '">' + value + '</option>';
                    $('#area').html(area);
                })
                return false;
            }else{
                alert('エラーが発生しました。');
            }
        }
    });
    //都道府県データ取得
    $('#area').change(function(){
        if( $(this).val() != '' ){
            $.ajax({
            dataType : 'jsonp',
                url: api + '?method=getPrefectures&area=' + $(this).val(),
                success: function( result ){
                    if( result.response.prefecture ){
                        let prefecture = '<option value="">選択してください。</option>';
                        $.each(result.response.prefecture, function(index, value){
                            prefecture += '<option value="' + value + '">' + value + '</option>';
                            $('#prefecture').html(prefecture);
                        })
                        return false;
                    }else{
                        alert('エラーが発生しました。');
                    }
                }
            });
        }
    });
    //路線データ取得
    $('#prefecture').change(function(){
        if( $(this).val() != '' ){
            $.ajax({
            dataType : 'jsonp',
                url: api + '?method=getLines&prefecture=' + $(this).val(),
                success: function( result ){
                    if( result.response.line ){
                        let line = '<option value="">選択してください。</option>';
                        $.each(result.response.line, function(index, value){
                            line += '<option value="' + value + '">' + value + '</option>';
                            $('#line').html(line);
                        })
                        return false;
                    }else{
                        alert('エラーが発生しました。');
                    }
                }
            });
        }
    });
    //駅データ取得
    $('#line').change(function(){
        if( $(this).val() != '' ){
            $.ajax({
            dataType : 'jsonp',
                url: api + '?method=getStations&line=' + $(this).val(),
                success: function( result ){
                    if( result.response.station ){
                        let station = '<option value="">選択してください。</option>';
                        $.each(result.response.station, function(index, value){
                            station += '<option value="' + value.name + '" data-line="' + value.line + '" data-next="' + value.next + '" data-postal="' + value.postal + '" data-prefecture="' + value.prefecture + '" data-prev="' + value.prev + '" data-x="' + value.x + '" data-y="' + value.y + '">' + value.name + '</option>';
                            $('#station').html(station);
                        })
                        return false;
                    }else{
                        alert('エラーが発生しました。');
                    }
                }
            });
        }
    });
    //駅選択時
    $('#station').change(function(){
        if( $(this).val() != '' ){
            let msg = '';
            const selected = '#station option:selected';
            msg += '<p>エリア:' + $('#area option:selected').val() + '</p>';
            msg += '<p>都道府県:' + $(selected).data('prefecture') + '</p>';
            msg += '<p>駅:' + $(this).val() + '</p>';
            msg += '<p>路線:' + $(selected).data('line') + '</p>';
            console.log($(selected).data('next'));
            if( $(selected).data('next') ){
                msg += '<p>次の駅:' + $(selected).data('next') + '</p>';
            }
            if( $(selected).data('prev') ){
                msg += '<p>前の駅:' + $(selected).data('prev') + '</p>';
            }
            msg += '<p>郵便番号:' + $(selected).data('postal') + '</p>';
            msg += '<p>経度:' + $(selected).data('x') + '</p>';
            msg += '<p>緯度:' + $(selected).data('y') + '</p>';
            $('#msg').html(msg);
        }
    });
});

// セールスコメント：入力文字数制限
$(function(){
    $('#countSalesComment').keyup(function(){
        var remain = 200 - $(this).val().length;
        $('#showSalesComment').text(remain);
    });
});
// 物件紹介コメント：入力文字数制限
$(function(){
    $('#countIntro').keyup(function(){
        var remain = 200 - $(this).val().length;
        $('#showSalesComment').text(remain);
    });
});
// 設備条件：入力文字数制限
$(function() {
    $('#countTerms').keyup();
        var remain = 200 - $(this).val().length;

        $('#showTerms').text(remain);
            if (remain = 0) {
                $('#showTerms').css('color', 'red');
            } else {
                $('#showTerms').css('color', 'green');
            }
});

// マンション
// 詳細
function mansionDetail() {
    $(document).on('click', '#mansionDetail', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/mansion/detail/" + id;
    })
}
// 編集
function mansionEdit() {
    $(document).on('click', '#mansionEdit', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/mansion/edit/" + id;
    })
}
// 新築戸建
// 詳細
function newDetachedHouseDetail() {
    $(document).on('click', '#newDetachedHouseDetail', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/new_detached_house/detail/" + id;
    })
}
// 編集
function newDetachedHouseEdit() {
    $(document).on('click', '#newDetachedHouseEdit', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/new_detached_house/edit/" + id;
    })
}

// 中古戸建
// 詳細
function oldDetachedHouseDetail() {
    $(document).on('click', '#oldDetachedHouseDetail', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/old_detached_house/detail/" + id;
    })
}
// 編集
function oldDetachedHouseEdit() {
    $(document).on('click', '#oldDetachedHouseEdit', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/old_detached_house/edit/" + id;
    })
}

// 土地
// 詳細
function landDetail() {
    $(document).on('click', '#landDetail', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/land/detail/" + id;
    })
}
// 編集
function landEdit() {
    $(document).on('click', '#landEdit', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/land/edit/" + id;
    })
}

// スタッフ
// 詳細
function staffDetail() {
    $(document).on('click', '#staffDetail', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/staff/detail/" + id;
    })
}
// 編集
function staffEdit() {
    $(document).on('click', '#staffEdit', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/staff/edit/" + id;
    })
}

// ブログ
// 詳細
function blogDetail() {
    $(document).on('click', '#blogDetail', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/blog/detail/" + id;
    })
}
// 編集
function blogEdit() {
    $(document).on('click', '#blogEdit', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/blog/edit/" + id;
    })
}

// ニュース
// 詳細
function newsDetail() {
    $(document).on('click', '#newsDetail', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/news/detail/" + id;
    })
}
// 編集
function newsEdit() {
    $(document).on('click', '#newsEdit', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/news/edit/" + id;
    })
}
