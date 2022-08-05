@extends('layouts.admin')
@section('title', '新規登録')
@section('body')
<h2>マンション：新規登録</h2>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form method="post" action="{{ route('admin.mansion.signUp') }}" enctype="multipart/form-data">
    @csrf
    <table>
        <tbody>
            <tr>
                <th colspan=4 class="table_top">物件概要</th>
            </tr>
            <tr>
                <th><label class="required">建物名</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('apartment_name'))) has-error @endif">
                        <input type="text" name="apartment_name" value="{{ old('apartment_name') }}">
                        <span class="help-block">{{$errors->first('apartment_name')}}</span>
                    </div>
                </td>
                <th><label class="required">号室</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('room'))) has-error @endif">
                        <input type="text" name="room" value="{{ old('room') }}">
                        <span class="help-block">{{$errors->first('room')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">販売価格</label></th>
                <td colspan=3>
                    <div class="form-group @if(!empty($errors->first('price'))) has-error @endif">
                        <div class="form-group @if(!empty($errors->first('tax'))) has-error @endif">
                            <input type="number" name="price" value="{{ old('price') }}">万円
                            <select name="tax">
                                <option disabled selected>未選択</option>
                                <option type="text" value="税込" @if(old('tax') === '税込') selected @endif>税込</option>
                                <option type="text" value="非課税" @if(old('tax') === '非課税') selected @endif>非課税</option>
                            </select>
                            <span class="help-block">{{$errors->first('price')}}</span>
                            <span class="help-block">{{$errors->first('tax')}}</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>郵便番号</th>
                <td colspan=3>
                    <input type="text" id="郵便番号" placeholder="0000000" onKeyUp="$('#郵便番号').zip2addr({pref:'#都道府県',addr:'#住所'});" >
                </td>
            </tr>
            <tr>
                <th><label class="required">住所１（都道府県）</label></th>
                <td colspan=3>
                    <div class="form-group @if(!empty($errors->first('pref'))) has-error @endif">
                        <input type="text" id="都道府県" name="pref" placeholder="〇〇県" value="{{ old('pref') }}">
                        <span class="help-block">{{$errors->first('pref')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">住所２（市区町村）</label></th>
                <td colspan=3>
                    <div class="form-group @if(!empty($errors->first('municipalities'))) has-error @endif">
                        <input type="text" id="住所" name="municipalities" placeholder="〇〇市〇〇区〇〇町" value="{{ old('municipalities') }}">
                        <span class="help-block">{{$errors->first('municipalities')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>住所３（丁目番地）</th>
                <td colspan=3>
                    <input type="text" name="block" placeholder="〇〇-〇" value="{{ old('block') }}">
                </td>
            </tr>
            <tr>
                <th>土地面積</th>
                <td>
                    <input type="number" name="land_area" value="{{ old('land_area') }}">㎡
                </td>
                <th>建物面積</th>
                <td>
                    <input type="number" name="building_area" value="{{ old('building_area') }}">㎡
                </td>
            </tr>
            <tr>
                <th><label class="required">間取り</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('number_of_rooms'))) has-error @endif">
                        <div class="form-group @if(!empty($errors->first('type_of_room'))) has-error @endif">
                            <input type="number" name="number_of_rooms" value="{{ old('number_of_rooms') }}">
                            <select name="type_of_room">
                                <option disabled selected>未選択</option>
                                @foreach (PropertyInformationConsts::TYPE_OF_ROOM_LIST as $key => $type_of_room)
                                <option value="{{ $key }}" @if(old('type_of_room') === $type_of_room) selected @endif>{{ $type_of_room }}</option>
                                @endforeach
                            </select>
                            <span class="help-block">{{$errors->first('number_of_rooms')}}</span>
                            <span class="help-block">{{$errors->first('type_of_room')}}</span>
                        </div>
                    </div>
                </td>
                <th><label class="required">専有面積</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('measuring_method'))) has-error @endif">
                        <div class="form-group @if(!empty($errors->first('occupation_area'))) has-error @endif">
                            <select name="measuring_method">
                                <option disabled selected>未選択</option>
                                @foreach (PropertyInformationConsts::MEASURING_METHOD_LIST as $key => $measuring_method)
                                <option value="{{ $key }}" @if(old('measuring_method') === $measuring_method) selected @endif>{{ $measuring_method }}</option>
                                @endforeach
                            </select>
                            <input type="number" name="occupation_area" value="{{ old('occupation_area') }}">㎡
                            <span class="help-block">{{$errors->first('measuring_method')}}</span>
                            <span class="help-block">{{$errors->first('occupation_area')}}</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">方角</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('direction'))) has-error @endif">
                        <select name="direction">
                            <option disabled selected>未選択</option>
                            @foreach (PropertyInformationConsts::DIRECTION_LIST as $key => $direction)
                            <option value="{{ $key }}" @if(old('direction') === $direction) selected @endif>{{ $direction }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('direction')}}</span>
                    </div>
                </td>
                <th><label class="required">バルコニー</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('balcony'))) has-error @endif">
                        <div class="form-group @if(!empty($errors->first('balcony_area'))) has-error @endif">
                            <label for="noBalcony">
                            <input type="radio" name="balcony" id="noBalcony" value="なし" {{ old('balcony') == 'なし' ? 'checked' : '' }} onclick="balconyClick()">なし</label>
                            <label for="haveBalcony">
                            <input type="radio" name="balcony" id="haveBalcony" value="あり" {{ old('balcony') == 'あり' ? 'checked' : '' }} onclick="balconyClick()">あり</label>
                            <div id="balconyAreaForm">
                                <label for="balconyArea">バルコニー面積：
                                <input type="number" name="balcony_area" id="balconyArea" value="{{ old('balcony_area') }}">m</label>
                            </div>
                            <span class="help-block">{{$errors->first('balcony')}}</span>
                            <span class="help-block">{{$errors->first('balcony_area')}}</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">所在階</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('floor'))) has-error @endif">
                        <input type="number" name="floor" value="{{ old('floor') }}">階
                        <span class="help-block">{{$errors->first('floor')}}</span>
                    </div>
                </td>
                <th><label class="required">階建</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('story'))) has-error @endif">
                        <input type="text"  placeholder="地上○階地下○階建" name="story" value="{{ old('story') }}">
                        <span class="help-block">{{$errors->first('story')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">完成時期（築年月）</label></th>
                <td colspan=3>
                    <div class="form-group @if(!empty($errors->first('year'))) has-error @endif">
                        <div class="form-group @if(!empty($errors->first('month'))) has-error @endif">
                            <div class="form-group @if(!empty($errors->first('day'))) has-error @endif">
                                <input type="number" name="year" id="year" value="{{ old('year') }}" min="1" max="2100" step="1">年
                                <input type="number" name="month" id="month" value="{{ old('month') }}" min="1" max="12" step="1">月
                                <input type="number" name="day" id="day" value="{{ old('day') }}" min="1" max="31" step="1">日
                                <span class="help-block">{{$errors->first('year')}}</span>
                                <span class="help-block">{{$errors->first('month')}}</span>
                                <span class="help-block">{{$errors->first('day')}}</span>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">建物構造</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('building_construction'))) has-error @endif">
                        <select name="building_construction">
                            <option disabled selected>未選択</option>
                            @foreach (PropertyInformationConsts::BUILDING_CONSTRUCTION_LIST as $key => $building_construction)
                            <option value="{{ $key }}" @if(old('building_construction') === $building_construction) selected @endif>{{ $building_construction }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('building_construction')}}</span>
                    </div>
                </td>
                <th><label class="required">総戸数</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('total_number_of_households'))) has-error @endif">
                        <input type="number" name="total_number_of_households" value="{{ old('total_number_of_households') }}">戸
                        <span class="help-block">{{$errors->first('total_number_of_households')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">管理会社</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('management_company'))) has-error @endif">
                        <input type="text" name="management_company" value="{{ old('management_company') }}">
                        <span class="help-block">{{$errors->first('management_company')}}</span>
                    </div>
                </td>
                <th><label class="required">管理形態</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('management_system'))) has-error @endif">
                        <select name="management_system">
                            <option disabled selected>未選択</option>
                            @foreach (PropertyInformationConsts::MANAGEMENT_SYSTEM_LIST as $key => $management_system)
                            <option value="{{ $key }}" @if(old('management_system') === $management_system) selected @endif>{{ $management_system }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('management_system')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">管理費</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('maintenance_fee'))) has-error @endif">
                        <input type="number" name="maintenance_fee" value="{{ old('maintenance_fee') }}">円
                        <span class="help-block">{{$errors->first('maintenance_fee')}}</span>
                    </div>
                </td>
                <th><label class="required">修繕積立金</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('reserve_fund_for_repair'))) has-error @endif">
                        <input type="number" name="reserve_fund_for_repair" value="{{ old('reserve_fund_for_repair') }}">円
                        <span class="help-block">{{$errors->first('reserve_fund_for_repair')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>その他費用</th>
                <td>
                    <input type="text" name="other_fee" value="{{ old('other_fee') }}">
                </td>
                <th>駐車場</th>
                <td>
                    <select name="parking_lot">
                        <option disabled selected>未選択</option>
                        @foreach (PropertyInformationConsts::PARKING_LOT_LIST as $key => $parking_lot)
                        <option value="{{ $key }}" @if(old('parking_lot') === $parking_lot) selected @endif>{{ $parking_lot }}</option>
                        @endforeach
                    </select>
                    <span class="help-block">{{$errors->first('parking_lot')}}</span>
                </td>
            </tr>
            <tr>
                <th><label class="required">用途地域</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('land_use_zones'))) has-error @endif">
                        <select name="land_use_zones">
                            <option disabled selected>未選択</option>
                            @foreach (PropertyInformationConsts::LAND_USE_ZONES_LIST as $key => $land_use_zones)
                            <option value="{{ $key }}" @if(old('land_use_zones') === $land_use_zones) selected @endif>{{ $land_use_zones }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('land_use_zones')}}</span>
                    </div>
                </td>
                <th><label class="required">土地権利</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('land_right'))) has-error @endif">
                        <select name="land_right">
                            <option disabled selected>未選択</option>
                            @foreach (PropertyInformationConsts::LAND_RIGHT_LIST as $key => $land_right )
                            <option value="{{ $key }}" @if(old('land_right') === $land_right) selected @endif>{{ $land_right }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('land_right')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">現況</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('status'))) has-error @endif">
                        <select name="status">
                            <option disabled selected>未選択</option>
                            <option value="居住中" @if(old('status') === '居住中') selected @endif>居住中</option>
                            <option value="空室" @if(old('status') === '空室') selected @endif>空室</option>
                        </select>
                        <span class="help-block">{{$errors->first('status')}}</span>
                    </div>
                </td>
                <th><label class="required">入居時期</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('delivery_date'))) has-error @endif">
                        <input type="text" name="delivery_date" placeholder="即入居可" value="{{ old('delivery_date') }}">
                        <span class="help-block">{{$errors->first('delivery_date')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">最寄り駅</label></th>
                <td>
                    <div>
                        <p>エリア</p>
                        <select name="area" id="area">
                            <option value="">選択してください。</option>
                        </select>
                    </div>
                    <div>
                        <p>都道府県</p>
                        <select name="prefecture" id="prefecture">
                            <option value="">エリアを選択してください。</option>
                        </select>
                    </div>
                    <div>
                        <p>路線</p>
                        <select name="line" id="line">
                            <option value="">都道府県を選択してください。</option>
                        </select>
                    </div>
                    <div>
                        <p>駅</p>
                        <div class="form-group @if(!empty($errors->first('station'))) has-error @endif">
                            <select name="station" id="station">
                                <option value="">路線を選択してください。</option>
                            </select>
                            <span class="help-block">{{$errors->first('station')}}</span>
                        </div>
                    </div>
                </td>
                <th><label class="required">最寄り駅までの徒歩距離（分）</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('walking_distance_station'))) has-error @endif">
                        <input type="number" name="walking_distance_station" value="{{ old('walking_distance_station') }}">分
                        <span class="help-block">{{$errors->first('walking_distance_station')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">取引態様</label></th>
                <td colspan=3>
                    <div class="form-group @if(!empty($errors->first('conditions_of_transactions'))) has-error @endif">
                        <select name="conditions_of_transactions">
                            <option disabled selected>未選択</option>
                            @foreach (TerminologyConsts::CONDITIONS_OF_TRANSACTIONS_LIST as $key => $conditions_of_transactions)
                            <option value="{{ $key }}" @if(old('conditions_of_transactions') === $conditions_of_transactions) selected @endif>{{ $conditions_of_transactions }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('conditions_of_transactions')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>小学校</th>
                <td colspan=3>
                    <input type="text" placeholder="〇〇小学校" name="elementary_school_name" value="{{ old('elementary_school_name') }}">まで徒歩</th><input type="number" name="elementary_school_district" value="{{ old('elementary_school_district') }}">分
                </td>
            </tr>
            <tr>
                <th>中学校</th>
                <td colspan=3>
                    <input type="text" placeholder="〇〇中学校" name="junior_high_school_name" value="{{ old('junior_high_school_name') }}">まで徒歩</th><input type="number" name="junior_high_school_district" value="{{ old('junior_high_school_district') }}">分
                </td>
            </tr>
        </tbody>
    </table><br>

    <table>
        <colgroup>
            <col style="width: 20%;">
            <col style="width: 80%;">
        </colgroup>
        <tbody>
            <tr>
                <th colspan=2 class="table_top">物件紹介</th>
            </tr>
            <tr>
                <th>セールスコメント</th>
                <td>
                    <textarea maxlength="200" placeholder="最大200文字まで" name="sales_comment" id="countSalesComment">{{ old('sales_comment') }}</textarea>
                    <label id="maxLengthLabel">入力可能文字数：<span id="countDownSalesComment">200</span></label>
                </td>
            </tr>
            <tr>
                <th>物件紹介コメント</th>
                <td>
                    <textarea maxlength="800" placeholder="最大800文字まで" name="property_introduction" id="countIntroComment">{{ old('property_introduction') }}</textarea>
                    <label id="maxLengthLabel">入力可能文字数：<span id="countDownIntroComment">800</span></label>
                </td>
            </tr>
            <tr>
                <th>設備条件</th>
                <td>
                    <textarea maxlength="200" placeholder="最大200文字まで" name="terms_and_conditions" id="countTerms">{{ old('terms_and_conditions') }}</textarea>
                    <label id="maxLengthLabel">入力可能文字数：<span id="countDownTerms">200</span></label>
                </td>
            </tr>
        </tbody>
    </table><br>

    <table class="photo_edit_table">
        <thead>
            <tr>
                <th class="table_top">物件画像</th>
            </tr>
        </thead>
        <tbody>
            <tr class="property_images">
                @for($i = 1; $i < 21; $i++)
                    <td class="property_images_block">
                        <p>画像{{ $i }}</p>
                        <input type="hidden" name="mansion_id" value="">
                        <img src="{{ asset('/storage/property_images/mansionno_image.jpeg') }}" id="noImage{{ $i }}" class="no_image" alt="プレビュー画像{{ $i }}">
                        <div id="{{ $i }}"></div>
                        <div class="form-group @if(!empty($errors->first("image" . $i))) has-error @endif">
                            <input type="file" name="image{{ $i }}" id="inputImage{{ $i }}" onchange="previewPropertyImage(event, {{ $i }})">
                            <span class="help-block">{{$errors->first("image" . $i )}}</span>
                        </div><br>
                        <input type="button" onclick="resetPropertyImage({{ $i }})" value="削除"><br>

                        <p>分類</p>
                        <div class="form-group @if(!empty($errors->first( "category" . $i))) has-error @endif">
                            <select name="category{{ $i }}">
                                <option disabled selected>未選択</option>
                                @foreach (PropertyInformationConsts::MANSION_IMAGES_CATEGORY_LIST as $key => $category)
                                <option value="{{ $key }}" @if(old('category') === $category) selected @endif>{{ $category }}</option>
                                @endforeach
                            </select>
                            <span class="help-block">{{$errors->first("category" . $i)}}</span>
                        </div>

                        <p>コメント</p>
                        <div class="form-group @if(!empty($errors->first( "comment" . $i ))) has-error @endif">
                            <textarea name="comment{{ $i }}" cols="150" rows="5">{{ old('comment' . $i) }}</textarea>
                            <span class="help-block">{{$errors->first( "comment" . $i )}}</span>
                        </div><br>
                    </td>
                @endfor
            </tr>
        </tbody>
    </table>

    <input type="submit" value="登録する" class="sign_up_btn">
</form>
@endsection
