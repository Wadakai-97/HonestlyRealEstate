'use strict'

// アコーディオンメニュー
$(function() {
    $('.faq_list li').click(function() {
    $(this).children('.subMenu').slideToggle();

    if ($(this).children('.faq_list_menu').hasClass('is-active')) {
        $(this).children('.faq_list_menu').removeClass('is-active');
    } else {
        $(this).children('.faq_list_menu').addClass('is-active');
    }
    return false;
    });
});

// TOPまで戻るボタン
$(function() {
    $('#topBtn').hide();
    $(window).scroll(function() {
        if($(this).scrollTop() > 100) {
            $('#topBtn').fadeIn();
        } else {
            $('#topBtn').fadeOut();
        }
    });
    $('#topBtn').click(function(){
    $('html, body').animate({scrollTop: 0}, 500);
    });
});

// お支払いシミュレーション（自動計算）
function calculation() {
    // 借入金額
    var price = document.getElementById('price').value + "0000";
    var down_payment = document.querySelector('[name="down_payment"]:checked').value;
    if (down_payment == "other") {
        down_payment = document.getElementById('otherDownPayment').value + "0000";
    }
    var borrowings = price - down_payment;

    // 月利
    var annual_interest = document.querySelector('[name="annual_interest"]:checked').value;
    if (annual_interest == "other") {
        annual_interest = document.getElementById('otherAnnualInterest').value;
    }
    var monthly_interest = annual_interest / 100 / 12;

    // 調整金額
    var borrowing_period = document.querySelector('[name="borrowing_period"]:checked').value;
    if (borrowing_period == "other") {
        borrowing_period = document.getElementById('otherBorrowingPeriod').value;
    }
    var number_of_payments = borrowing_period * 12;
    var adjacent_number = Math.pow(1 + monthly_interest, number_of_payments);

    // 月々の住宅ローンお支払い金額
    var monthly_payment = borrowings * monthly_interest * adjacent_number / (adjacent_number - 1 );

    document.getElementById('result').innerText = Math.floor(monthly_payment).toLocaleString() + '円';
}
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

// 都道府県セレクトボックス
$(function() {
    $.getJSON("/address.json", function(data) {
    for(var i=1; i<48; i++) {
    var code = ('00'+code).slice(-2);
    $('#pref').append('<option value="'+code+'">'+data[i-1][code].pref+'</option>');
    }
});
});

// 市区町村セレクトボックス
$('#pref').on('change', function() {
$('#city option:nth-child(n+2)').remove();
    var pref = ('00'+$('#pref option:selected').val()).slice(-2);
    var key = Number(pref)-1;
    $.getJSON("address.json", function(data) {
    for(var i=0; i<data[key][pref].municipalities.length; i++){
        $('#city').append('<option value="'+data[key][pref].municipalities[i].id+'">'+data[key][pref].municipalities[i].name+'</option>');
    }
});
});
