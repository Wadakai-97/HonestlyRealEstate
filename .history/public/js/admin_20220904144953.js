'use strict'

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

// セットバック（あるorない）
function setbackClick() {
    let noSetback = document.getElementById("noSetback");
    let setbackLength = document.getElementById("setbackLength");
    let setbackLengthForm = document.getElementById("setbackLengthForm");

    if (noSetback.checked) {
        setbackLength.value = "";
        setbackLengthForm.style.visibility = "hidden";
    } else {
        setbackLengthForm.style.visibility = "visible";
    }
}
// バルコニー（あるorない）
function balconyClick() {
    let noBalcony = document.getElementById("noBalcony");
    let balconyArea = document.getElementById("balconyArea");
    let balconyAreaForm = document.getElementById("balconyAreaForm");

    if (noBalcony.checked) {
        balconyArea.value = "";
        balconyAreaForm.style.visibility = "hidden";
    } else {
        balconyAreaForm.style.visibility = "visible";
    }
}
// バルコニー（あるorない）
function parkinglotClick() {
    let noParkinglot = document.getElementById("noParkinglot");
    let parkingLot = document.getElementById("parkingLot");
    let parkinglotForm = document.getElementById("parkingLotForm");

    if (noParkinglot.checked) {
        parkingLot.value = "";
        parkingLotForm.style.visibility = "hidden";
    } else {
        parkingLotForm.style.visibility = "visible";
    }
}

// 文字数制限
// セールスコメント
$(function() {
    $('#countSalesComment').keyup( function() {
        var remain = 200 - $(this).val().length;

        $('#countDownSalesComment').text(remain);
            if (remain === 0) {
                $('#countDownSalesComment').css('color', 'red');
            } else if (remain < 200) {
                $('#countDownSalesComment').css('color', 'green');
            }
    });
});
// 物件紹介コメント
$(function() {
    $('#countIntroComment').keyup(function() {
        var remain = 800 - $(this).val().length;

        $('#countDownIntroComment').text(remain);
            if (remain === 0) {
                $('#countDownIntroComment').css('color', 'red');
            } else if (remain < 800) {
                $('#countDownIntroComment').css('color', 'green');
            }
    });
});

// 設備条件
$(function() {
    $('#countTerms').keyup(function() {
        var remain = 200 - $(this).val().length;

        $('#countDownTerms').text(remain);
            if (remain === 0) {
                $('#countDownTerms').css('color', 'red');
            } else if (remain < 200) {
                $('#countDownTerms').css('color', 'green');
            }
    });
});

// スタッフ
// コメント：入力文字数制限
$(function() {
    $('#countComment').keyup(function() {
        var remain = 800 - $(this).val().length;

        $('#countDownComment').text(remain);
            if (remain === 0) {
                $('#countDownComment').css('color', 'red');
            } else if (remain < 800) {
                $('#countDownComment').css('color', 'green');
            }
    });
});

// ブログ
// 記事内容：入力文字制限
$(function() {
    $('#countContent').keyup(function() {
        var remain = 800 - $(this).val().length;

        $('#countDownContent').text(remain);
            if (remain === 0) {
                $('#countDownContent').css('color', 'red');
            } else if (remain < 800) {
                $('#countDownContent').css('color', 'green');
            }
    });
});


// お客様情報一覧
// コメント：入力文字数制限
$(function() {
    $('#countComment').keyup(function() {
        var remain = 200 - $(this).val().length;

        $('#countDownComment').text(remain);
            if (remain === 0) {
                $('#countDownComment').css('color', 'red');
            } else if (remain < 200) {
                $('#countDownComment').css('color', 'green');
            }
    });
});


// ニュース
// タイトル：文字数制限
$(function() {
    $('#countTitle').keyup(function() {
        var remain = 32 - $(this).val().length;

        $('#countDownTitle').text(remain);
            if (remain === 0) {
                $('#countDownTitle').css('color', 'red');
            } else if (remain < 32) {
                $('#countDownTitle').css('color', 'green');
            }
    });
});
// ニュース内容：文字数制限
$(function() {
    $('#countNews').keyup(function() {
        var remain = 800 - $(this).val().length;

        $('#countDownNews').text(remain);
            if (remain === 0) {
                $('#countDownNews').css('color', 'red');
            } else if (remain < 800) {
                $('#countDownNews').css('color', 'green');
            }
    });
});

// スタッフ
// 画像プレビュー
function previewImage(obj) {
	var fileReader = new FileReader();
	fileReader.onload = (function() {
		document.getElementById('preview').src = fileReader.result;
	});
	fileReader.readAsDataURL(obj.files[0]);
}
function changeImage(obj) {
    var fileReader = new FileReader();
	fileReader.onload = (function() {
		document.getElementById('preview').src = fileReader.result;
	});
	fileReader.readAsDataURL(obj.files[0]);
    document.getElementById('exImage').css('display','none');
}
// 画像削除
function resetImage() {
    document.getElementById('image').value = ''
    document.getElementById('preview').src = ''
}


// 画像リセット
// 物件画像
// 新規登録
function resetPropertyImage(target) {
    var reset_image = document.getElementById("preview_property_image-" + target);
    var input_image = document.getElementById("inputImage" + target);
    reset_image.setAttribute("src", "/public/storage/no_image.jpeg");
    input_image.value = "";
}
//アップデート
function deletePropertyImage(target) {
    var sign_up_form = document.getElementById("signUpForm" + target);
    while (sign_up_form.firstChild) {
        sign_up_form.removeChild(sign_up_form.firstChild);
    };

    sign_up_form.insertAdjacentHTML('afterbegin', '<img src="/public/storage/mansion_images/no_image.jpeg" id="noImage'+target+'"class="no_image" alt="物件画像'+target+'"><div id="'+target+'"></div><div class="form-group @if(!empty($errors->first("image" . $image_counter))) has-error @endif"><input type="file" name="image" id="inputImage'+target+'" onchange="previewPropertyImage(event, '+target+')" value="{{ $mansion_image->path }}"></div><input type="button" onclick="resetPropertyImage('+target+')" value="画像削除">');
}
// スタッフ・ブログ・ニュース
function resetImage() {
    var reset_image = document.getElementById("preview_image");
    var input_image = document.getElementById("inputImage");
    reset_image.setAttribute("src", "/public/storage/no_image.jpeg");
    input_image.value = "";
}

// 入力画像プレビュー
// 物件登録
function previewPropertyImage(event, target) {
    var file = event.target.files[0];
    var reader = new FileReader();
    var preview = document.getElementById(target);
    var preview_property_image = document.getElementById("preview_property_image-"+target);

    if(preview_property_image != null) {
        preview.removeChild(preview_property_image);
    }

    reader.onload = function(event) {
        var img = document.createElement("img");
        img.setAttribute("src", reader.result);
        img.setAttribute("id", "preview_property_image-"+target);
        img.classList.add('preview_property_image');
        preview.appendChild(img);
    };

    reader.readAsDataURL(file);

    var no_image = document.getElementById("noImage" + target);
    no_image.remove();
}
// スタッフ・ブログ・ニュース
function previewImage(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    var preview = document.getElementById('preview');
    var preview_image = document.getElementById("preview_image");

    if(preview_image != null) {
        preview.removeChild(preview_image);
    }

    reader.onload = function(event) {
        var img = document.createElement("img");
        img.setAttribute("src", reader.result);
        img.setAttribute("id", "preview_image");
        img.classList.add('preview_image');
        preview.appendChild(img);
    };

    reader.readAsDataURL(file);

    var no_image = document.getElementById("noImage");
    no_image.remove();
}
