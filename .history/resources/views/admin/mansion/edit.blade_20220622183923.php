@extends('layouts.admin')
@section('title', '編集画面')
@section('body')
<h2>{{ $mansion->apartment_name }}{{ $mansion->room }}：編集画面</h2>

@if (Session::has('message'))
    <div class="alert alert-primary">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form method="post" action="{{ route('admin.mansion.save', ['id' => $mansion->id]) }}" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <table>
        <tbody>
            <tr>
                <th colspan=4 class="table_top">登録内容</th>
            </tr>
            <tr>
                <th><label class="required">マンション名</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('apartment_name'))) has-error @endif">
                        <input type="text" name="apartment_name" value="{{ old('apartment_name', $mansion->apartment_name) }}">
                        <span class="help-block">{{$errors->first('apartment_name')}}</span>
                    </div>
                </td>
                <th><label class="required">号室</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('room'))) has-error @endif">
                        <input type="text" name="room" value="{{ old('room', $mansion->room) }}">
                        <span class="help-block">{{$errors->first('room')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">販売価格</label></th>
                <td colspan=3>
                    <div class="form-group @if(!empty($errors->first('price'))) has-error @endif">
                        <div class="form-group @if(!empty($errors->first('tax'))) has-error @endif">
                            <input type="number" name="price" value="{{ old('price', $mansion->price) }}">万円
                            <select name="tax">
                                <option disabled selected>未選択</option>
                                <option type="text" value="税込" @if(old('tax', $mansion->tax) === '税込') selected @endif>税込</option>
                                <option type="text" value="非課税" @if(old('tax', $mansion->tax) === '非課税') selected @endif>非課税</option>
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
                        <input type="text" id="都道府県" name="pref" placeholder="〇〇県" value="{{ old('pref', $mansion->pref) }}">
                        <span class="help-block">{{$errors->first('pref')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">住所２（市区町村）</label></th>
                <td colspan=3>
                    <div class="form-group @if(!empty($errors->first('municipalities'))) has-error @endif">
                        <input type="text" id="市区町村" name="municipalities" placeholder="〇〇市〇〇区〇〇町" value="{{ old('municipalities', $mansion->municipalities) }}">
                        <span class="help-block">{{$errors->first('town')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>住所３（丁目番地）</th>
                <td colspan=3>
                    <input type="text" name="block" placeholder="〇〇-〇" value="{{ old('block', $mansion->block) }}">
                </td>
            </tr>
            <tr>
                <th>土地面積</th>
                <td>
                    <input type="number" name="land_area" value="{{ old('land_area', $mansion->land_area) }}">㎡
                </td>
                <th>建物面積</th>
                <td>
                    <input type="number" name="building_area" value="{{ old('building_area', $mansion->building_area) }}">㎡
                </td>
            </tr>
            <tr>
                <th><label class="required">間取り</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('number_of_rooms'))) has-error @endif">
                        <div class="form-group @if(!empty($errors->first('type_of_room'))) has-error @endif">
                            <input type="number" name="number_of_rooms" value="{{ old('number_of_rooms', $mansion->number_of_rooms) }}">
                            <select name="type_of_room">
                                <option disabled selected>未選択</option>
                                <option value="K" @if(old('type_of_room', $mansion->type_of_room) === 'K') selected @endif>K</option>
                                <option value="DK" @if(old('type_of_room', $mansion->type_of_room) === 'DK') selected @endif>DK</option>
                                <option value="LDK" @if(old('type_of_room', $mansion->type_of_room) === 'LDK') selected @endif>LDK</option>
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
                                <option value="壁芯" @if(old('measuring_method', $mansion->measuring_method) === '壁芯') selected @endif>壁芯</option>
                                <option value="内法" @if(old('measuring_method', $mansion->measuring_method) === '内法') selected @endif>内法</option>
                                <option value="不明" @if(old('measuring_method', $mansion->measuring_method) === '不明') selected @endif>不明</option>
                            </select>
                            <input type="number" name="occupation_area" value="{{ old('occupation_area', $mansion->occupation_area) }}">㎡
                            <span class="help-block">{{$errors->first('measuring_method')}}</span>
                            <span class="help-block">{{$errors->first('occupation_area')}}</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>方角</th>
                <td>
                    <div class="form-group @if(!empty($errors->first('direction'))) has-error @endif">
                        <select name="direction">
                            <option disabled selected>未選択</option>
                            <option value="東" @if(old('direction', $mansion->direction) === '東') selected @endif>東</option>
                            <option value="南東" @if(old('direction', $mansion->direction) === '南東') selected @endif>南東</option>
                            <option value="西" @if(old('direction', $mansion->direction) === '西') selected @endif>西</option>
                            <option value="北西" @if(old('direction', $mansion->direction) === '北西') selected @endif>北西</option>
                            <option value="南" @if(old('direction', $mansion->direction) === '南') selected @endif>南</option>
                            <option value="南西" @if(old('direction', $mansion->direction) === '南西') selected @endif>南西</option>
                            <option value="北" @if(old('direction', $mansion->direction) === '北') selected @endif>北</option>
                            <option value="北東" @if(old('direction', $mansion->direction) === '北東') selected @endif>北東</option>
                        </select>
                        <span class="help-block">{{$errors->first('direction')}}</span>
                    </div>
                </td>
                <th><label class="required">バルコニー面積</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('balcony_area'))) has-error @endif">
                        <input type="number" name="balcony_area" value="{{ old('balcony_area', $mansion->balcony_area) }}">㎡
                        <span class="help-block">{{$errors->first('balcony_area')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">所在階</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('floor'))) has-error @endif">
                        <input type="number" name="floor" value="{{ old('floor', $mansion->floor) }}">階
                        <span class="help-block">{{$errors->first('floor')}}</span>
                    </div>
                </td>
                <th><label class="required">階建</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('story'))) has-error @endif">
                        <input type="text"  placeholder="地上○階地下○階建" name="story" value="{{ old('story', $mansion->story) }}">
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
                                <input type="number" name="year" id="year" value="{{ old('year', $mansion->year) }}" min="1" max="2100" step="1">年
                                <input type="number" name="month" id="month" value="{{ old('month', $mansion->month) }}" min="1" max="12" step="1">月
                                <input type="number" name="day" id="day" value="{{ old('day', $mansion->day) }}" min="1" max="31" step="1">日
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
                            <option value="鉄骨造（S造）" @if(old('building_construction', $mansion->building_construction) === '鉄骨造（S造）') selected @endif>鉄骨造（S造）</option>
                            <option value="鉄筋コンクリート造（RC造）" @if(old('building_construction', $mansion->building_construction) === '鉄筋コンクリート造（RC造）') selected @endif>鉄筋コンクリート造（RC造）</option>
                            <option value="鉄骨鉄筋コンクリート造（SRC造）" @if(old('building_construction', $mansion->building_construction) === '鉄骨鉄筋コンクリート造（SRC造）') selected @endif>鉄骨鉄筋コンクリート造（SRC造）</option>
                        </select>
                        <span class="help-block">{{$errors->first('building_construction')}}</span>
                    </div>
                </td>
                <th><label class="required">総戸数</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('total_number_of_households'))) has-error @endif">
                        <input type="number" name="total_number_of_households" value="{{ old('total_number_of_households', $mansion->total_number_of_households) }}">戸
                        <span class="help-block">{{$errors->first('total_number_of_households')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">管理会社</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('management_company'))) has-error @endif">
                        <input type="text" name="management_company" value="{{ old('management_company', $mansion->management_company) }}">
                        <span class="help-block">{{$errors->first('management_company')}}</span>
                    </div>
                </td>
                <th><label class="required">管理形態</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('management_system'))) has-error @endif">
                        <select name="management_system">
                            <option disabled selected>未選択</option>
                            <option value="常駐管理" @if(old('management_system', $mansion->management_system) === '常駐管理') selected @endif>常駐管理</option>
                            <option value="日勤管理" @if(old('management_system', $mansion->management_system) === '日勤管理') selected @endif>日勤管理</option>
                            <option value="巡回管理" @if(old('management_system', $mansion->management_system) === '巡回管理') selected @endif>巡回管理</option>
                            <option value="自主管理" @if(old('management_system', $mansion->management_system) === '自主管理') selected @endif>自主管理</option>
                        </select>
                        <span class="help-block">{{$errors->first('management_system')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">管理費</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('maintenance_fee'))) has-error @endif">
                        <input type="number" name="maintenance_fee" value="{{ old('maintenance_fee', $mansion->maintenance_fee) }}">円
                        <span class="help-block">{{$errors->first('maintenance_fee')}}</span>
                    </div>
                </td>
                <th><label class="required">修繕積立金</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('reserve_fund_for_repair'))) has-error @endif">
                        <input type="number" name="reserve_fund_for_repair" value="{{ old('reserve_fund_for_repair', $mansion->reserve_fund_for_repair) }}">円
                        <span class="help-block">{{$errors->first('reserve_fund_for_repair')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>その他費用</th>
                <td>
                    <input type="text" name="other_fee" value="{{ old('other_fee', $mansion->other_fee) }}">
                </td>
                <th>駐車場</th>
                <td>
                    <select name="parking_lot">
                        <option disabled selected>未選択</option>
                        <option value="空きあり" @if(old('parking_lot', $mansion->parking_lot) === '空きあり') selected @endif>空きあり</option>
                        <option value="空きなし" @if(old('parking_lot', $mansion->parking_lot) === '空きなし') selected @endif>空きなし</option>
                        <option value="駐車場なし" @if(old('parking_lot', $mansion->parking_lot) === '駐車場なし') selected @endif>駐車場なし</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label class="required">用途地域</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('land_use_zones'))) has-error @endif">
                        <select name="land_use_zones">
                            <option disabled selected>未選択</option>
                            @foreach (PropertyInformationConsts::LAND_USE_ZONES_LIST as $key => $land_use_zones )
                            <option value="{{ $key }}" @if(old('land_use_zones', $mansion->land_use_zones) === '$mansion->lnad_use_zones') selected @endif>{{ $land_use_zones }}</option>
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
                            <option value="所有権" @if(old('land_right', $mansion->land_right) === '所有権') selected @endif>所有権</option>
                            <option value="借地権" @if(old('land_right', $mansion->land_right) === '借地権') selected @endif>借地権</option>
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
                            <option value="居住中" @if(old('status', $mansion->status) === '居住中') selected @endif>居住中</option>
                            <option value="空室" @if(old('status', $mansion->status) === '空室') selected @endif>空室</option>
                        </select>
                        <span class="help-block">{{$errors->first('status')}}</span>
                    </div>
                </td>
                <th><label class="required">入居時期</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('delivery_date'))) has-error @endif">
                        <input type="text" name="delivery_date" placeholder="決済後◯ヶ月後" value="{{ old('delivery_date', $mansion->delivery_date) }}">
                        <span class="help-block">{{$errors->first('delivery_date')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">最寄り駅</label></th>
                <td>
                    まで徒歩
                    <input type="number" name="walking_distance_station" value="{{ old('walking_distance_station', $mansion->walking_distance_station) }}">分
                </td>
                <th><label class="required">取引態様</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('conditions_of_transactions'))) has-error @endif">
                        <select name="conditions_of_transactions">
                            <option disabled selected>未選択</option>
                            <option value="媒介" @if(old('conditions_of_transactions', $mansion->conditions_of_transactions) === '媒介') selected @endif>媒介</option>
                            <option value="売主" @if(old('conditions_of_transactions', $mansion->conditions_of_transactions) === '売主') selected @endif>売主</option>
                            <option value="代理" @if(old('conditions_of_transactions', $mansion->conditions_of_transactions) === '代理') selected @endif>代理</option>
                        </select>
                        <span class="help-block">{{$errors->first('conditions_of_transactions')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>小学校</th>
                <td colspan=3>
                    <input type="text" placeholder="〇〇小学校" name="elementary_school_name" value="{{ old('elementary_school_name', $mansion->elementary_school_name) }}">まで徒歩</th><input type="number" name="elementary_school_district" value="{{ old('elementary_school_district', $mansion->elementary_school_district) }}">分
                </td>
            </tr>
            <tr>
                <th>中学校</th>
                <td colspan=3>
                    <input type="text" placeholder="〇〇中学校" name="junior_high_school_name" value="{{ old('junior_high_school_name', $mansion->junior_high_school_name) }}">まで徒歩</th><input type="number" name="junior_high_school_district" value="{{ old('junior_high_school_district', $mansion->junior_high_school_district) }}">分
                </td>
            </tr>
                <th>物件画像（複数可能）</th>
                <td colspan=3>
                    <input type="file" name="files[][image]" multiple>
                </td>
        </tbody>
    </table><br>
    <table>
        <tbody>
            <tr>
                <th colspan=2 class="table_top">物件紹介</th>
            </tr>
            <tr>
                <th><p>セールスコメント</p></th>
                <td>
                    <textarea maxlength="200" placeholder="最大200文字まで" name="sales_comment">{{ old('sales_comment', $mansion->sales_comment) }}</textarea>
                </td>
            </tr>
            <tr>
                <th><p>物件紹介コメント</p></th>
                <td>
                    <textarea maxlength="800" placeholder="最大800文字まで" name="property_introduction">{{ old('property_introduction', $mansion->property_introduction) }}</textarea>
                </td>
            </tr>
            <tr>
                <th><p>設備条件</p></th>
                <td>
                    <textarea maxlength="200" placeholder="最大200文字まで" name="terms_and_conditions">{{ old('terms_and_conditions', $mansion->terms_and_conditions) }}</textarea>
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="登録する" class="sign_up_btn">
</form>
@endsection
