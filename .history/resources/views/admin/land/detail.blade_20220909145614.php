@extends('layouts.admin')
@section('title', '土地：詳細画面')
@section('body')
<h3>詳細画面</h3>

<table>
    <thead>
        <th colspan=4 class="table_top">物件概要</th>
    </thead>
    <tbody>
        <tr>
            <th><label class="required">土地名</label></th>
            <td>
                {{ $land->name }}
            </td>
            <th><label class="required">販売価格</label></th>
            <td>
                {{ $land->price }}万円（{{ $land->tax }}）
            </td>
        </tr>
        <tr>
            <th><label class="required">住所１（都道府県）</label></th>
            <td colspan=3>
                {{ $land->pref }}
            </td>
        </tr>
        <tr>
            <th><label class="required">住所２（市区町村）</label></th>
            <td colspan=3>
                {{ $land->municipalities }}
            </td>
        </tr>
        <tr>
            <th>住所３（丁目番地）</th>
            <td colspan=3>
                {{ $land->block }}
            </td>
        </tr>
        <tr>
            <th><label class="required">土地面積</label></th>
            <td>
                {{ $land->land_area }}
            </td>
            <th><label class="required">建築条件</label></th>
            <td>
                {{ $land->construction_conditions }}
            </td>
        </tr>
        <tr>
            <th><label class="required">容積率</label></th>
            <td>
                {{ $land->floor_area_ratio }}
            </td>
            <th><label class="required">建ぺい率</label></th>
            <td>
                {{ $land->building_coverage_ratio }}
            </td>
        </tr>
        <tr>
            <th><label class="required">都市計画区域</label></th>
            <td>
                {{ $land->urban_planning }}
            </td>
            <th><label class="required">用途地域</label></th>
            <td>
                {{ $land->land_use_zones }}
            </td>
        </tr>
        <tr>
            <th><label class="required">地目</label></th>
            <td>
                {{ $land->land_classification }}
            </td>
            <th><label class="required">土地権利</label></th>
            <td>
                {{ $land->land_right }}
            </td>
        </tr>
        <tr>
            <th><label class="required">現況</label></th>
            <td>
                {{ $land->status }}
            </td>
            <th>その他の費用</th>
            <td>
                @if(!empty($land->other_fee))
                    {{ $land->other_fee}}
                @else
                    なし
                @endif
            </td>
        </tr>
        <tr>
            <th>法令上の制限</th>
            <td>
                {{ $land->restrictions_by_law }}
            </td>
            <th><label class="required">入居時期</label></th>
            <td>
                {{ $land->delivery_date }}
            </td>
        </tr>
        <tr>
            <th>地勢</th>
            <td>
                {{ $land->terrain }}
            </td>
            <th><label class="required">接道種類</label></th>
            <td>
                {{ $land->adjacent_road }}
            </td>
        </tr>
        <tr>
            <th><label class="required">接道幅</label></th>
            <td>
                {{ $land->adjacent_road_width }}
            </td>
            <th><label class="required">私道負担</label></th>
            <td>
                {{ $land->private_road }}
            </td>
        </tr>
        <tr>
            <th><label class="required">セットバック</label></th>
            <td>
                {{ $land->setback }}
            </td>
            <th><label class="required">上水道</label></th>
            <td>
                {{ $land->water_supply }}
            </td>
        </tr>
        <tr>
            <th><label class="required">下水道</label></th>
            <td>
                {{ $land->sewage_line }}
            </td>
            <th><label class="required">ガス</label></th>
            <td>
                {{ $land->gas }}
            </td>
        </tr>
        <tr>
            <th><label class="required">最寄り駅</label></th>
            <td>
                {{ $land->station }}まで{{ $land->access_method }}{{ $land->distance_station }}分
            </td>
            <th><label class="required">取引態様</label></th>
            <td>
                {{ $land->conditions_of_transactions }}
            </td>
        </tr>
        <tr>
            <th>小学校</th>
            <td colspan=3>
                {{ $land->elementary_school_name }}まで徒歩{{ $land->elementary_school_district }}分
            </td>
        </tr>
        <tr>
            <th>中学校</th>
            <td colspan=3>
                {{ $land->junior_high_school_name }}まで徒歩{{ $land->junior_high_school_district }}分
            </td>
        </tr>
    </tbody>
</table><br>

<table>
    <thead>
        <th colspan=2 class="table_top">物件紹介</th>
    </thead>
    <tbody>
        <tr>
            <th>セールスコメント</th>
            <td>
                {{ $land->sales_comment }}
            </td>
        </tr>
        <tr>
            <th>物件紹介コメント</th>
            <td>
                {{ $land->property_introduction }}
            </td>
        </tr>
        <tr>
            <th>設備条件</th>
            <td>
                {{ $land->terms_and_conditions }}
            </td>
        </tr>
    </tbody>
</table>

<button onclick="location.href='{{ route('admin.land.edit', ['id' => $land->id]) }}'">編集</button>

@endsection
