@extends('layouts.admin')
@section('title', '中古戸建の新規登録')
@section('body')
<h2>中古戸建：新規登録</h2>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form method="post" action="{{ route('admin.oldDetachedHouse.signUp') }}" enctype="multipart/form-data">
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
                        <span class="help-block">{{$errors->first('town')}}</span>
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
                        <input type="number" name="land_area" value="{{ old('land_area') }}">㎡
                    <span class="help-block">{{$errors->first('land_area')}}</span>
                </td>
                <th><label class="required">建物面積</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('building_area'))) has-error @endif">
                        <input type="number" name="building_area" value="{{ old('building_area') }}">㎡
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
                <th>バルコニー面積</th>
                <td colspan=3>
                    <div class="form-group @if(!empty($errors->first('balcony_area'))) has-error @endif">
                        <input type="number" name="balcony_area" value="{{ old('balcony_area') }}">㎡
                    <span class="help-block">{{$errors->first('balcony_area')}}</span>
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
                                <option value="K" @if(old('type_of_room') === 'K') selected @endif>K</option>
                                <option value="DK" @if(old('type_of_room') === 'DK') selected @endif>DK</option>
                                <option value="LDK" @if(old('type_of_room') === 'LDK') selected @endif>LDK</option>
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
                    <select name="parking_lot">
                        <option disabled selected>未選択</option>
                        <option value="なし" @if(old('parking_lot') === 'なし') selected @endif>なし</option>
                        <option value="１台" @if(old('parking_lot') === '１台') selected @endif>１台</option>
                        <option value="２台" @if(old('parking_lot') === '２台') selected @endif>２台</option>
                        <option value="３台" @if(old('parking_lot') === '３台') selected @endif>３台</option>
                        <option value="４台" @if(old('parking_lot') === '４台') selected @endif>４台</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label class="required">都市計画区域</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('urban_planning'))) has-error @endif">
                        <select name="urban_planning">
                            <option disabled selected>未選択</option>
                            <option value="市街化区域" @if(old('urban_planning') === '市街化区域') selected @endif>市街化区域</option>
                            <option value="市街化調整区域" @if(old('urban_planning') === '市街化調整区域') selected @endif>市街化調整区域</option>
                            <option value="非線引き区域" @if(old('urban_planning') === '非線引き区域') selected @endif>非線引き区域</option>
                        </select>
                        <span class="help-block">{{$errors->first('urban_planning')}}</span>
                    </div>
                </td>
                <th><label class="required">用途地域</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('land_use_zones'))) has-error @endif">
                        <select name="land_use_zones">
                            <option disabled selected>未選択</option>
                            @foreach (PropertyInformationConsts::LAND_USE_ZONES_LIST as $key => $land_use_zones )
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
                            <option value="所有権" @if(old('land_right') === '所有権') selected @endif>所有権</option>
                            <option value="普通借地権" @if(old('land_right') === '普通借地権') selected @endif>普通借地権</option>
                            <option value="一般定期借地権" @if(old('land_right') === '一般定期借地権') selected @endif>一般定期借地権</option>
                            <option value="事業用定期借地権" @if(old('land_right') === '事業用定期借地権') selected @endif>事業用定期借地権</option>
                            <option value="建物譲渡特約付借地権" @if(old('land_right') === '建物譲渡特約付借地権') selected @endif>建物譲渡特約付借地権</option>
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
                            <option value="更地" @if(old('status') === '更地') selected @endif>更地</option>
                            <option value="建築中" @if(old('status') === '建築中') selected @endif>建築中</option>
                            <option value="完成済み" @if(old('status') === '完成済み') selected @endif>完成済み</option>
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
                            <option value="平坦" @if(old('terrain') === '平坦') selected @endif>平坦</option>
                            <option value="高台" @if(old('terrain') === '高台') selected @endif>高台</option>
                            <option value="ひな段" @if(old('terrain') === 'ひな段') selected @endif>ひな段</option>
                            <option value="傾斜地" @if(old('terrain') === '傾斜地') selected @endif>傾斜地</option>
                            <option value="低地" @if(old('terrain') === '低地') selected @endif>低地</option>
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
                        <input type="text" name="setback" value="{{ old('setback') }}" placeholder="">
                        <span class="help-block">{{$errors->first('setback')}}</span>
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
                            @foreach (PropertyInformationConsts::WATER_SUPPLY_LIST as $key => $water_supply)
                            <option value="{{ $key }}" @if(old('water_supply') === $water_supply) selected @endif>{{ $water_supply }}</option>
                            @endforeach
                            <option value="公共下水" @if(old('sewage_line') === '公共下水') selected @endif>公共下水</option>
                            <option value="個別浄化槽" @if(old('sewage_line') === '個別浄化槽') selected @endif>個別浄化槽</option>
                            <option value="集中浄化槽" @if(old('sewage_line') === '集中浄化槽') selected @endif>集中浄化槽</option>
                            <option value="汲取式" @if(old('sewage_line') === '汲取式') selected @endif>汲取式</option>
                        </select>
                        <span class="help-block">{{$errors->first('sewage_line')}}</span>
                    </div>
                </td>
                <th><label class="required">ガス</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('gas'))) has-error @endif">
                        <select name="gas">
                            <option disabled selected>未選択</option>
                            <option value="都市ガス" @if(old('gas') === '都市ガス') selected @endif>都市ガス</option>
                            <option value="個別プロパン" @if(old('gas') === '個別プロパン') selected @endif>個別プロパン</option>
                            <option value="集中プロパン" @if(old('gas') === '集中プロパン') selected @endif>集中プロパン</option>
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
                        <select name="station" id="station">
                            <option value="">路線を選択してください。</option>
                        </select>
                    </div>
                </td>
                <th><label class="required">最寄り駅までの距離（分）</label></th>
                <td>
                    <input type="number" name="walking_distance_station" value="{{ old('walking_distance_station') }}">分
                </td>
            </tr>
            <tr>
                <th><label class="required">取引態様</label></th>
                <td colspan=3>
                    <div class="form-group @if(!empty($errors->first('conditions_of_transactions'))) has-error @endif">
                        <select name="conditions_of_transactions">
                            <option disabled selected>未選択</option>
                            <option value="媒介" @if(old('conditions_of_transactions') === '媒介') selected @endif>媒介</option>
                            <option value="売主" @if(old('conditions_of_transactions') === '売主') selected @endif>売主</option>
                            <option value="代理" @if(old('conditions_of_transactions') === '代理') selected @endif>代理</option>
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
                <th>物件画像（複数可能）</th>
                <td colspan=3>
                    <input type="file" name="files[][image]" multiple>
                </td>
        </tbody>
    </table><br>
    <table>
        <thead>
            <th colspan=2 class="table_top">物件紹介</th>
        </thead>
        <tbody>
            <tr>
                <th><p>セールスコメント</p></th>
                <td>
                    <textarea maxlength="200" placeholder="最大200文字まで" name="sales_comment">{{ old('sales_comment') }}</textarea>
                </td>
            </tr>
            <tr>
                <th><p>物件紹介コメント</p></th>
                <td>
                    <textarea maxlength="800" placeholder="最大800文字まで" name="property_introduction">{{ old('property_introduction') }}</textarea>
                </td>
            </tr>
            <tr>
                <th><p>設備条件</p></th>
                <td>
                    <textarea maxlength="200" placeholder="最大200文字まで" name="terms_and_conditions">{{ old('terms_and_conditions') }}</textarea>
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="登録する" class="sign_up_btn" >
</form>
@endsection
