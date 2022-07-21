@extends('layouts.admin')
@section('title', '土地編集画面')
@section('body')

<h2>{{ $land->name }}：編集</h2>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form method="post" action="{{ route('admin.land.save', ['id' => $land->id]) }}" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <table>
        <thead>
            <th colspan=4 class="table_top">物件概要</th>
        </thead>
        <tbody>
            <tr>
                <th><label class="required">土地名</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
                        <input type="text" name="name" value="{{ old('name', $land->name) }}">
                        <span class="help-block">{{$errors->first('name')}}</span>
                    </div>
                </td>
                <th><label class="required">販売価格</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('price'))) has-error @endif">
                        <div class="form-group @if(!empty($errors->first('tax'))) has-error @endif">
                            <input type="number" name="price" value="{{ old('price', $land->price) }}">万円
                            <select name="tax">
                                <option disabled selected>未選択</option>
                                <option type="text" value="税込" @if(old('tax', $land->tax) === '税込') selected @endif>税込</option>
                                <option type="text" value="非課税" @if(old('tax', $land->tax) === '非課税') selected @endif>非課税</option>
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
                        <input type="text" id="都道府県" name="pref" placeholder="〇〇県" value="{{ old('pref', $land->pref) }}">
                        <span class="help-block">{{$errors->first('pref')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">住所２（市区町村）</label></th>
                <td colspan=3>
                    <div class="form-group @if(!empty($errors->first('municipalities'))) has-error @endif">
                        <input type="text" id="住所" name="municipalities" placeholder="〇〇市〇〇区〇〇町" value="{{ old('municipalities', $land->municipalities) }}">
                        <span class="help-block">{{$errors->first('town')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>住所３（丁目番地）</th>
                <td colspan=3>
                    <input type="text" name="block" placeholder="〇〇-〇" value="{{ old('block', $land->block) }}">
                </td>
            </tr>
            <tr>
                <th><label class="required">土地面積</label></th>
                <td colspan=3>
                    <div class="form-group @if(!empty($errors->first('land_area'))) has-error @endif">
                        <input type="number" name="land_area" value="{{ old('land_area', $land->land_area) }}">㎡
                    <span class="help-block">{{$errors->first('land_area')}}</span>
                </td>
            </tr>
            <tr>
                <th><label class="required">容積率</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('floor_area_ratio'))) has-error @endif">
                        <input type="number" name="floor_area_ratio" value="{{ old('floor_area_ratio', $land->floor_area_ratio) }}">％
                    <span class="help-block">{{$errors->first('floor_area_ratio')}}</span>
                </td>
                <th><label class="required">建ぺい率</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('building_coverage_ratio'))) has-error @endif">
                        <input type="number" name="building_coverage_ratio" value="{{ old('building_coverage_ratio', $land->building_coverage_ratio) }}">％
                    <span class="help-block">{{$errors->first('building_coverage_ratio')}}</span>
                </td>
            </tr>
            <tr>
                <th><label class="required">都市計画区域</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('urban_planning'))) has-error @endif">
                        <select name="urban_planning">
                            <option disabled selected>未選択</option>
                            <option value="市街化区域" @if(old('urban_planning', $land->urban_planning) === '市街化区域') selected @endif>市街化区域</option>
                            <option value="市街化調整区域" @if(old('urban_planning', $land->urban_planning) === '市街化調整区域') selected @endif>市街化調整区域</option>
                            <option value="非線引き区域" @if(old('urban_planning', $land->urban_planning) === '非線引き区域') selected @endif>非線引き区域</option>
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
                            <option value="{{ $key }}" @if(old('land_use_zones', $land->land_use_zones) === $land_use_zones) selected @endif>{{ $land_use_zones }}</option>
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
                        <input type="text" name="land_classification" value="{{ old('land_classification', $land->land_classification) }}">
                        <span class="help-block">{{$errors->first('land_classification')}}</span>
                    </div>
                </td>
                <th><label class="required">土地権利</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('land_right'))) has-error @endif">
                        <select name="land_right">
                            <option disabled selected>未選択</option>
                            <option value="所有権" @if(old('land_right', $land->land_right) === '所有権') selected @endif>所有権</option>
                            <option value="普通借地権" @if(old('land_right', $land->land_right) === '普通借地権') selected @endif>普通借地権</option>
                            <option value="一般定期借地権" @if(old('land_right', $land->land_right) === '一般定期借地権') selected @endif>一般定期借地権</option>
                            <option value="事業用定期借地権" @if(old('land_right', $land->land_right) === '事業用定期借地権') selected @endif>事業用定期借地権</option>
                            <option value="建物譲渡特約付借地権" @if(old('land_right', $land->land_right) === '建物譲渡特約付借地権') selected @endif>建物譲渡特約付借地権</option>
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
                            @foreach (TerminologyConsts::LAND_STATUS_LIST as $key => $land_status )
                            <option value="{{ $key }}" @if(old('land_status', $land->status) === $land_status) selected @endif>{{ $land_status }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('status')}}</span>
                    </div>
                </td>
                <th>その他の費用</th>
                <td>
                    <div class="form-group @if(!empty($errors->first('other_fee'))) has-error @endif">
                        <input type="text" name="other_fee" value="{{ old('other_fee', $land->other_fee) }}">
                        <span class="help-block">{{$errors->first('other_fee')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>法令上の制限</th>
                <td>
                    <textarea maxlength="200" placeholder="最大200文字まで" name="restrictions_by_law">{{ old('restrictions_by_law', $land->restrictions_by_law) }}</textarea>
                </td>
                <th><label class="required">入居時期</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('delivery_date'))) has-error @endif">
                        <input type="text" name="delivery_date" value="{{ old('delivery_date', $land->delivery_date) }}">
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
                            <option value="平坦" @if(old('terrain', $land->terrain) === '平坦') selected @endif>平坦</option>
                            <option value="高台" @if(old('terrain', $land->terrain) === '高台') selected @endif>高台</option>
                            <option value="ひな段" @if(old('terrain', $land->terrain) === 'ひな段') selected @endif>ひな段</option>
                            <option value="傾斜地" @if(old('terrain', $land->terrain) === '傾斜地') selected @endif>傾斜地</option>
                            <option value="低地" @if(old('terrain', $land->terrain) === '低地') selected @endif>低地</option>
                        </select>
                        <span class="help-block">{{$errors->first('terrain')}}</span>
                    </div>
                </td>
                <th><label class="required">接道種類</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('adjacent_road'))) has-error @endif">
                        <select name="adjacent_road">
                            <option disabled selected>未選択</option>
                            <option value="法42条1項1号道路（公道）" @if(old('adjacent_road', $land->adjacent_road) === '法42条1項1号道路（公道）') selected @endif>法42条1項1号道路（公道）</option>
                            <option value="法42条1項2号道路（開発道路）" @if(old('adjacent_road', $land->adjacent_road) === '法42条1項2号道路（開発道路）') selected @endif>法42条1項2号道路（開発道路）</option>
                            <option value="法42条1項3号道路（既存道路）" @if(old('adjacent_road', $land->adjacent_road) === '法42条1項3号道路（既存道路）') selected @endif>法42条1項3号道路（既存道路）</option>
                            <option value="法42条1項4号道路（計画道路）" @if(old('adjacent_road', $land->adjacent_road) === '法42条1項4号道路（計画道路）') selected @endif>法42条1項4号道路（計画道路）</option>
                            <option value="法42条1項5号道路（位置指定道路）" @if(old('adjacent_road', $land->adjacent_road) === '法42条1項5号道路（位置指定道路）') selected @endif>法42条1項5号道路（位置指定道路）</option>
                            <option value="法42条2項道路（みなし道路）" @if(old('adjacent_road', $land->adjacent_road) === '法42条2項道路（みなし道路）') selected @endif>法42条2項道路（みなし道路）</option>
                        </select>
                        <span class="help-block">{{$errors->first('adjacent_road')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">接道幅</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('adjacent_road_width'))) has-error @endif">
                        <input type="text" name="adjacent_road_width" value="{{ old('adjacent_road_width', $land->adjacent_road_width) }}">ｍ
                        <span class="help-block">{{$errors->first('adjacent_road_width')}}</span>
                    </div>
                </td>
                <th><label class="required">私道負担</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('private_road'))) has-error @endif">
                        <select name="private_road">
                            <option disabled selected>未選択</option>
                            <option value="あり" @if(old('private_road', $land->private_road) === 'あり') selected @endif>あり</option>
                            <option value="なし" @if(old('private_road', $land->private_road) === 'なし') selected @endif>なし</option>
                        </select>
                        <span class="help-block">{{$errors->first('private_road')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">セットバック</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('setback'))) has-error @endif">
                        <input type="text" name="setback" value="{{ old('setback', $land->setback) }}" placeholder="">
                        <span class="help-block">{{$errors->first('setback')}}</span>
                    </div>
                </td>
                <th><label class="required">上水道</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('water_supply'))) has-error @endif">
                        <select name="water_supply">
                            <option disabled selected>未選択</option>
                            @foreach (PropertyInformationConsts::WATER_SUPPLY_LIST as $key => $water_supply)
                            <option value="{{ $key }}" @if(old('water_supply', $land->water_supply) === $water_supply) selected @endif>{{ $water_supply }}</option>
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
                            <option value="{{ $key }}" @if(old('sewage_line', $land->) === $sewage_line) selected @endif>{{ $sewage_line }}</option>
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
                            <option value="{{ $key }}" @if(old('gas', $land->gas) === $gas) selected @endif>{{ $gas }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('gas')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">建築条件</label></th>
                <td colspan=3>
                    <div class="form-group @if(!empty($errors->first('construction_conditions'))) has-error @endif">
                        <select name="construction_conditions">
                            <option disabled selected>未選択</option>
                            <option value="あり" @if(old('construction_conditions', $land->construction_conditions) === 'あり') selected @endif>あり</option>
                            <option value="なし" @if(old('construction_conditions', $land->construction_conditions) === 'なし') selected @endif>なし</option>
                        </select>
                        <span class="help-block">{{$errors->first('construction_conditions')}}</span>
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
                    {{ $land->station }}まで徒歩
                    <input type="number" name="walking_distance_station" value="{{ old('walking_distance_station', $land->walking_distance_station) }}">分
                </td>
                <th><label class="required">取引態様</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('conditions_of_transactions'))) has-error @endif">
                        <select name="conditions_of_transactions">
                            <option disabled selected>未選択</option>
                            @foreach (TerminologyConsts::NATIONAL_LAND_UTILIZATION_LAW_LIST as $key => $national_land_utilization_law)
                            <option value="{{ $key }}" @if(old('national_land_utilization_law', $land->national_land_utilization_law) === $national_land_utilization_law) selected @endif>{{ $national_land_utilization_law }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">{{$errors->first('conditions_of_transactions')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>小学校</th>
                <td colspan=3>
                    <input type="text" placeholder="〇〇小学校" name="elementary_school_name" value="{{ old('elementary_school_name', $land->elementary_school_name) }}">まで徒歩</th><input type="number" name="elementary_school_district" value="{{ old('elementary_school_district', $land->elementary_school_district) }}">分
                </td>
            </tr>
            <tr>
                <th>中学校</th>
                <td colspan=3>
                    <input type="text" placeholder="〇〇中学校" name="junior_high_school_name" value="{{ old('junior_high_school_name', $land->junior_high_school_name) }}">まで徒歩</th><input type="number" name="junior_high_school_district" value="{{ old('junior_high_school_district', $land->junior_high_school_district) }}">分
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
                    <textarea maxlength="200" placeholder="最大200文字まで" name="sales_comment">{{ old('sales_comment', $land->sales_comment) }}</textarea>
                </td>
            </tr>
            <tr>
                <th><p>物件紹介コメント</p></th>
                <td>
                    <textarea maxlength="800" placeholder="最大800文字まで" name="property_introduction">{{ old('property_introduction', $land->property_introduction) }}</textarea>
                </td>
            </tr>
            <tr>
                <th><p>設備条件</p></th>
                <td>
                    <textarea maxlength="200" placeholder="最大200文字まで" name="terms_and_conditions">{{ old('terms_and_conditions', $land->terms_and_conditions) }}</textarea>
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="登録する" class="sign_up_btn">
</form>
@endsection
