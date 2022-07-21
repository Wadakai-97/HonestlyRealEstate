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


// 詳細画面における地図表示
var addressStr = "{!! $address !!}";

$(document).ready(function(){

    var map = new GMaps({
        div: '#map',
        lat: -12.043333,
        lng: -77.028333
    });
    GMaps.geocode({
        address: addressStr.trim(),
        callback: function(results, status) {
            if (status == 'OK') {
                var latlng = results[0].geometry.location;
                map.setCenter(latlng.lat(), latlng.lng());
                map.addMarker({
                    lat: latlng.lat(),
                    lng: latlng.lng()
                });
            }
        }
    });
});

// 地図表示
var addressStr = "{!! $address !!}";

$(document).ready(function(){
    var map = new GMaps({
        div: '#map',
        lat: -12.043333,
        lng: -77.028333
    });

    GMaps.geocode({
        address: addressStr.trim(),
        callback: function(results, status) {
            if (status == 'OK') {
                var latlng = results[0].geometry.location;
                map.setCenter(latlng.lat(), latlng.lng());
                map.addMarker({
                    lat: latlng.lat(),
                    lng: latlng.lng()
                });
            }
        }
    });
});

// お支払いシミュレーション（自動計算）
function calculation() {
    $price = document.getElementsById('price').value;
    $down_payment = document.getElementsById('down_payment');
    $annual_interest = document.getElmentsById('annual_interest');

    // 借入金額
    $borrowings = $price - $down_payment;
    // 借入期間
    $number_of_payments = $borrowing_period * 12;
    // 月利
    $monthly_interest = $annual_interes * $borrowing_period / 12;
    // 調整金額
    $adjacent_number = pow(1+$montly_interest, $number_of_payments);

    // 月々のお支払金額
    $monthly_payment = $borrowings * $montly_interest * $adjacent_number / ($adjacent_number - 1 );

    document.getElementsById(result').innerText = $monthly_payment;
}
