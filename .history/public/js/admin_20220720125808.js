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

// 新築分譲住宅
// 詳細
function newDetachedHouseGroupDetail() {
    $(document).on('click', '#newDetachedHouseGroupDetail', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/new_detached_house_group/detail/" + id;
    })
}
// 編集
function newDetachedHouseGroupEdit() {
    $(document).on('click', '#newDetachedHouseGroupEdit', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/new_detached_house_group/edit/" + id;
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
function customerEdit() {
    $(document).on('click', '#staffEdit', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/staff/edit/" + id;
    })
}
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
// 詳細
function customerDetail() {
    $(document).on('click', '#customerDetail', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/customer/detail/" + id;
    })
}
// 編集
function customerEdit() {
    $(document).on('click', '#customerEdit', function() {
        var id = $(this).closest('tr').children("td")[0].innerText;
        window.location.href = "/public/customer/edit/" + id;
    })
}
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

// 物件画像登録・編集
function resetPropertyImage(event, target) {
    document.getElementById(target).src = ''
}

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

    var no_image = document.getElementById("#noImage" + target);
    no_image.remove();
}
