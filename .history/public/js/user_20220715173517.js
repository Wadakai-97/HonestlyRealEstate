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
    // 借入金額
    var price = document.getElementById('price').value + "0000";
    var down_payment = document.getElementById('down_payment').value;
    var borrowings = price - down_payment;

    // 月利
    if(document.getElementById('annual_interest').checked) {
        for (let i = 0; i < annual_interest.length; i++) {
            if (annual_interest[i].checked) {
                var annual_interest = annual_interest[i].value;
                break;
            }
        }
        // var annual_interest = document.getElementById('annual_interest').value;
        var monthly_interest = annual_interest / 100 / 12;
    }

    // 調整金額
    var number_of_payments = document.getElementById('borrowing_period').value * 12;
    var adjacent_number = Math.pow(1 + monthly_interest, number_of_payments);

    // 月々の住宅ローンお支払い金額
    var monthly_payment = borrowings * monthly_interest * adjacent_number / (adjacent_number - 1 );

    console.log(borrowings);
    console.log(annual_interest);
    console.log(monthly_interest);
    console.log(number_of_payments);
    console.log(adjacent_number);
    console.log(monthly_payment);

    document.getElementById('result').innerText = Math.floor(monthly_payment).toLocaleString() + '円';
}

// 住宅ローンシミュレーション
// テキストボックス連動(ラジオボタン)
function interestText() {
    let otherInterest = doucment.getElementsByClassName("other_interest");
    let interestTextForm = document.getElementsByClassName("interest_text_form");

    if(otherInterest.checked) {
        for(var i = 0; i < interestTextForm.length; i++) {
            interestTextForm[i].style.visibility = "visible";
        }
    } else {
        for(var i = 0; i < interestTextForm.length; i++) {
            interestTextForm[i].style.visibility = "hidden";
        }
    }
}
