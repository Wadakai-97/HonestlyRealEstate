@extends('layouts.admin')
@section('title', '新築戸建：新規登録')
@section('body')
<h3>新築戸建：新規登録</h3>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form method="post" action="{{ route('admin.newDetachedHouse.signUp') }}" enctype="multipart/form-data">
    @csrf
    <table>
        <thead>
            <th colspan=4 class="table_top">物件概要</th>
        </thead>
        <tbody>
            <tr>
                <th><label class="required">建物名</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
                        <input type="text" name="name" value="{{ old('name') }}">
                        <span class="help-block">{{$errors->first('name')}}</span>
                    </div>
                </td>
                <th><label class="required">販売価格</label></th>
                <td>
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
                <th><label class="required">土地面積</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('land_area'))) has-error @endif">
                        <input type="number" step="0.01" name="land_area" value="{{ old('land_area') }}">㎡
                    <span class="help-block">{{$errors->first('land_area')}}</span>
                </td>
                <th><label class="required">建物面積</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('building_area'))) has-error @endif">
                        <input type="number" step="0.01" name="building_area" value="{{ old('building_area') }}">㎡
                    <span class="help-block">{{$errors->first('building_area')}}</span>
                </td>
            </tr>
            <tr>
                <th><label class="required">容積率</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('floor_area_ratio'))) has-error @endif">
                        <input type="number" name="floor_area_ratio" value="{{ old('floor_area_ratio') }}">％
                    <span class="help-block">{{$errors->first('floor_area_ratio')}}</span>
                </td>
                <th><label class="required">建ぺい率</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('building_coverage_ratio'))) has-error @endif">
                        <input type="number" name="building_coverage_ratio" value="{{ old('building_coverage_ratio') }}">％
                    <span class="help-block">{{$errors->first('building_coverage_ratio')}}</span>
                </td>
            </tr>
            <tr>
                <th><label class="required">バルコニー</label></th>
                <td colspan=3>
                    <div class="form-group @if(!empty($errors->first('balcony'))) has-error @endif">
                        <div class="form-group @if(!empty($errors->first('balcony_area'))) has-error @endif">
                            <label for="noBalcony">なし
                            <input type="radio" name="balcony" id="noBalcony" value="{{ old('balcony', 'なし') }}" onclick="balconyClick()"></label>
                            <label for="haveBalcony">あり
                            <input type="radio" name="balcony" id="haveBalcony" value="{{ old('balcony', 'あり') }}" onclick="balconyClick()"></label>
                            <div id="balconyAreaForm">
                                <label for="balconyArea">バルコニー面積：
                                <input type="number" step="0.01" name="balcony_area" id="balconyArea" value="{{ old('balcony_area') }}">m</label>
                            </div>
                            <span class="help-block">{{$errors->first('balcony')}}</span>
                            <span class="help-block">{{$errors->first('balcony_area')}}</span>
                        </div>
                    </div>
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
                <th><label class="required">完成時期（築年月）</label></th>
                <td>
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
                        <input type="text" name="building_construction" value="{{ old('building_construction') }}">
                        <span class="help-block">{{$errors->first('building_construction')}}</span>
                    </div>
                </td>
                <th>駐車場</th>
                <td>
                    <div class="form-group @if(!empty($errors->first('parking'))) has-error @endif">
                        <div class="form-group @if(!empty($errors->first('parking_lot'))) has-error @endif">
                            <label for="noSetback">なし
                            <input type="radio" name="parking" id="noSetback" value="{{ old('parking', 'なし') }}" onclick="setbackClick()"></label>
                            <label for="yesSetback">あり
                            <input type="radio" name="parking" id="haveSetback" value="{{ old('parking', 'あり') }}" onclick="setbackClick()"></label>
                            <div id="setbackLengthForm">
                                <label for="setbackLength">セットバック幅：
                                <input type="number" name="parking_lot" id="setbackLength" value="{{ old('parking_lot') }}">m</label>
                            </div>
                            <span class="help-block">{{$errors->first('setback')}}</span>
                            <span class="help-block">{{$errors->first('parking_lot')}}</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">都市計画区域</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('urban_planning'))) has-error @endif">
                        <select name="urban_planning">
                            <option disabled selected>未選択</option>
                            @foreach (PropertyInformationConsts::URBAN_PLANNING_LIST as $key => $urban_planning )
                            <option value="{{ $key }}" @if(old('urban_planning') === $urban_planning) selected @endif>{{ $urban_planning }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('urban_planning')}}</span>
                    </div>
                </td>
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
            </tr>
            <tr>
                <th><label class="required">地目</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('land_classification'))) has-error @endif">
                        <input type="text" name="land_classification" value="{{ old('land_classification') }}">
                        <span class="help-block">{{$errors->first('land_classification')}}</span>
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
                            @foreach (PropertyInformationConsts::NEW_DETACHED_HOUSE_STATUS_LIST as $key => $status )
                            <option value="{{ $key }}" @if(old('status') === $status) selected @endif>{{ $status }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('status')}}</span>
                    </div>
                </td>
                <th>その他の費用</th>
                <td>
                    <div class="form-group @if(!empty($errors->first('other_fee'))) has-error @endif">
                        <input type="text" name="other_fee" value="{{ old('other_fee') }}">
                        <span class="help-block">{{$errors->first('other_fee')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>法令上の制限</th>
                <td>
                    <textarea maxlength="200" placeholder="最大200文字まで" name="restrictions_by_law">{{ old('restrictions_by_law') }}</textarea>
                </td>
                <th><label class="required">入居時期</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('delivery_date'))) has-error @endif">
                        <input type="text" name="delivery_date" value="{{ old('delivery_date') }}">
                        <span class="help-block">{{$errors->first('delivery_date')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>地勢</th>
                <td>
                    <div class="form-group @if(!empty($errors->first('terrain'))) has-error @endif">
                        <select name="terrain">
                            <option disabled selected>未選択</option>
                            @foreach (PropertyInformationConsts::TERRAIN_LIST as $key => $terrain)
                            <option value="{{ $key }}" @if(old('terrain') === $terrain) selected @endif>{{ $terrain }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('terrain')}}</span>
                    </div>
                </td>
                <th><label class="required">接道種類</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('adjacent_road'))) has-error @endif">
                        <select name="adjacent_road">
                            <option disabled selected>未選択</option>
                            @foreach (PropertyInformationConsts::ADJACENT_ROAD_LIST as $key => $adjacent_road)
                            <option value="{{ $key }}" @if(old('adjacent_road') === $adjacent_road) selected @endif>{{ $adjacent_road }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('adjacent_road')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">接道幅</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('adjacent_road_width'))) has-error @endif">
                        <input type="text" name="adjacent_road_width" value="{{ old('adjacent_road_width') }}">ｍ
                        <span class="help-block">{{$errors->first('adjacent_road_width')}}</span>
                    </div>
                </td>
                <th><label class="required">私道負担</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('private_road'))) has-error @endif">
                        <select name="private_road">
                            <option disabled selected>未選択</option>
                            <option value="あり" @if(old('private_road') === 'あり') selected @endif>あり</option>
                            <option value="なし" @if(old('private_road') === 'なし') selected @endif>なし</option>
                        </select>
                        <span class="help-block">{{$errors->first('private_road')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">セットバック</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('setback'))) has-error @endif">
                        <div class="form-group @if(!empty($errors->first('setback_length'))) has-error @endif">
                            <label for="noSetback">なし
                            <input type="radio" name="setback" id="noSetback" value="{{ old('setback', 'なし') }}" onclick="setbackClick()"></label>
                            <label for="yesSetback">あり
                            <input type="radio" name="setback" id="haveSetback" value="{{ old('setback', 'あり') }}" onclick="setbackClick()"></label>
                            <div id="setbackLengthForm">
                                <label for="setbackLength">セットバック幅：
                                <input type="number" name="setback_length" id="setbackLength" value="{{ old('setback_length') }}">m</label>
                            </div>
                            <span class="help-block">{{$errors->first('setback')}}</span>
                            <span class="help-block">{{$errors->first('setback_length')}}</span>
                        </div>
                    </div>
                </td>
                <th><label class="required">上水道</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('water_supply'))) has-error @endif">
                        <select name="water_supply">
                            <option disabled selected>未選択</option>
                            @foreach (PropertyInformationConsts::WATER_SUPPLY_LIST as $key => $water_supply)
                            <option value="{{ $key }}" @if(old('water_supply') === $water_supply) selected @endif>{{ $water_supply }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('water_supply')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">下水道</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('sewage_line'))) has-error @endif">
                        <select name="sewage_line">
                            <option disabled selected>未選択</option>
                            @foreach (PropertyInformationConsts::SEWAGE_LINE_LIST as $key => $sewage_line)
                            <option value="{{ $key }}" @if(old('sewage_line') === $sewage_line) selected @endif>{{ $sewage_line }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('sewage_line')}}</span>
                    </div>
                </td>
                <th><label class="required">ガス</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('gas'))) has-error @endif">
                        <select name="gas">
                            <option disabled selected>未選択</option>
                            @foreach (PropertyInformationConsts::GAS_LIST as $key => $gas)
                            <option value="{{ $key }}" @if(old('gas') === $gas) selected @endif>{{ $gas }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('gas')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">建築確認番号</label></th>
                <td colspan=3>
                    <div class="form-group @if(!empty($errors->first('building_certification_number'))) has-error @endif">
                        <input type="text" name="building_certification_number" value="{{ old('building_certification_number') }}">
                        <span class="help-block">{{$errors->first('building_certification_number')}}</span>
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
                <th><label class="required">最寄り駅までのアクセス</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('access_method'))) has-error @endif">
                        <select name="access_method">
                            <option disabled selected>未選択</option>
                            @foreach (PropertyInformationConsts::ACCESS_METHOD_LIST as $key => $access_method)
                            <option value="{{ $key }}" @if(old('access_method') === $access_method) selected @endif>{{ $access_method }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('access_method')}}</span>
                    </div>
                    <div class="form-group @if(!empty($errors->first('distance_station'))) has-error @endif">
                        <input type="number" name="distance_station" value="{{ old('distance_station') }}">分
                        <span class="help-block">{{$errors->first('distance_station')}}</span>
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
        <thead>
            <th colspan=2 class="table_top">物件紹介</th>
        </thead>
        <tbody>
            <tr>
                <th><p>セールスコメント</p></th>
                <td>
                    <textarea maxlength="200" placeholder="最大200文字まで" name="sales_comment" id="countSalesComment">{{ old('sales_comment') }}</textarea>
                    <label id="maxLengthLabel">入力可能文字数：<span id="countDownSalesComment">200</span></label>
                </td>
            </tr>
            <tr>
                <th><p>物件紹介コメント</p></th>
                <td>
                    <textarea maxlength="800" placeholder="最大800文字まで" name="property_introduction" id="countIntroComment">{{ old('property_introduction') }}</textarea>
                    <label id="maxLengthLabel">入力可能文字数：<span id="countDownIntroComment">800</span></label>
                </td>
            </tr>
            <tr>
                <th><p>設備条件</p></th>
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
                        <img src="{{ asset('/storage/no_image.jpeg') }}" id="noImage{{ $i }}" class="no_image" alt="プレビュー画像{{ $i }}">
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
                                @foreach (PropertyInformationConsts::DETACHED_HOUSE_IMAGES_CATEGORY_LIST as $key => $category)
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


    <input type="submit" value="登録する" class="sign_up_btn" >
</form>
@endsection
