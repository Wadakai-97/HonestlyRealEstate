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
        down_payment = document.getElementById('otherDownPayment').value;
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

    console.log('借入金額', borrowings);
    console.log('年利',annual_interest);
    console.log('月利', monthly_interest);
    console.log('頭金', down_payment);
    console.log('借入年数', borrowing_period);
    console.log('借入期間', number_of_payments);
    console.log('調整金額', adjacent_number);
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
