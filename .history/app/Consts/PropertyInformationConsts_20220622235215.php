<?php

namespace App\Consts;

class PropertyInformationConsts
{
    public const LAND_USE_ZONES_01 = '田園住居地域';
    public const LAND_USE_ZONES_02 = '第一種低層住居専用地域';
    public const LAND_USE_ZONES_03 = '第二種低層住居専用地域';
    public const LAND_USE_ZONES_04 = '第一種中高層住居専用地域';
    public const LAND_USE_ZONES_05 = '第二種中高層住居専用地域';
    public const LAND_USE_ZONES_06 = '第一種住居地域';
    public const LAND_USE_ZONES_07 = '第二種住居地域';
    public const LAND_USE_ZONES_08 = '準住居地域';
    public const LAND_USE_ZONES_09 = '近隣商業地域';
    public const LAND_USE_ZONES_10 = '商業地域';
    public const LAND_USE_ZONES_11 = '準工業地域';
    public const LAND_USE_ZONES_12 = '工業地域';
    public const LAND_USE_ZONES_LIST = [
        '田園住居地域' => self::LAND_USE_ZONES_01,
        '第一種低層住居専用地域' => self::LAND_USE_ZONES_02,
        '第二種低層住居専用地域' => self::LAND_USE_ZONES_03,
        '第一種中高層住居専用地域' => self::LAND_USE_ZONES_04,
        '第二種中高層住居専用地域' => self::LAND_USE_ZONES_05,
        '第一種住居地域' => self::LAND_USE_ZONES_06,
        '第二種住居地域' => self::LAND_USE_ZONES_07,
        '準住居地域' => self::LAND_USE_ZONES_08,
        '近隣商業地域' => self::LAND_USE_ZONES_09,
        '商業地域' => self::LAND_USE_ZONES_10,
        '準工業地域' => self::LAND_USE_ZONES_11,
        '工業地域' => self::LAND_USE_ZONES_12,
    ];

    public const ADJACENT_ROAD_01 = '法42条1項1号道路（公道）';
    public const ADJACENT_ROAD_02 = '法42条1項2号道路（開発道路）';
    public const ADJACENT_ROAD_03 = '法42条1項3号道路（既存道路）';
    public const ADJACENT_ROAD_04 = '法42条1項4号道路（計画道路）';
    public const ADJACENT_ROAD_05 = '法42条1項5号道路（位置指定道路）';
    public const ADJACENT_ROAD_06 = '法42条2項道路（みなし道路）';
    public const ADJACENT_ROAD_LIST = [
        '法42条1項1号道路（公道）' => self::ADJACENT_ROAD_01,
        '法42条1項2号道路（開発道路）' => self::ADJACENT_ROAD_02,
        '法42条1項3号道路（既存道路）' => self::ADJACENT_ROAD_03,
        '法42条1項4号道路（計画道路）' => self::ADJACENT_ROAD_04,
        '法42条1項5号道路（位置指定道路）' => self::ADJACENT_ROAD_05,
        '法42条2項道路（みなし道路）' => self::ADJACENT_ROAD_06,
    ];
    public const DIRECTION_01 = '東';
    public const DIRECTION_02 = '南東';
    public const DIRECTION_03 = '南';
    public const DIRECTION_04 = '南西';
    public const DIRECTION_05 = '西';
    public const DIRECTION_06 = '北西';
    public const DIRECTION_07 = '北';
    public const DIRECTION_08 = '北東';
    public const DIRECTION_LIST = [
        '東' => self::DIRECTION_01,
        '南東' => self::DIRECTION_02,
        '南' => self::DIRECTION_03,
        '南西' => self::DIRECTION_04,
        '西' => self::DIRECTION_05,
        '北西' => self::DIRECTION_06,
        '北' => self::DIRECTION_07,
        '北東' => self::DIRECTION_08,
    ];
    public const MANAGEMENT_SYSTEM_01 = '常駐管理';
    public const MANAGEMENT_SYSTEM_02 = '日勤管理';
    public const MANAGEMENT_SYSTEM_03 = '巡回管理';
    public const MANAGEMENT_SYSTEM_04 = '自主管理';
    public const MANAGEMENT_SYSTEM_LIST = [
        '常駐管理' => self::MANAGEMENT_SYSTEM_01,
        '日勤管理' => self::MANAGEMENT_SYSTEM_02,
        '巡回管理' => self::MANAGEMENT_SYSTEM_03,
        '自主管理' => self::MANAGEMENT_SYSTEM_04,
    ];
    public const BUILDING_CONSTRUCTION_01 = '鉄筋コンクリート造(RC造)';
    public const BUILDING_CONSTRUCTION_02 = '鉄骨鉄筋コンクリート造(SRC造)';
    public const BUILDING_CONSTRUCTION_03 = '軽量鉄骨造(S造)';
    public const BUILDING_CONSTRUCTION_04 = '重量鉄骨造(S造)';
    public const BUILDING_CONSTRUCTION_05 = '木造(W造)';
    public const BUILDING_CONSTRUCTION_06 = 'アルミ造(AL造)';
    public const BUILDING_CONSTRUCTION_07 = 'コンクリートブロック造(CB造)';
    public const BUILDING_CONSTRUCTION_08 = 'コンクリート充填鋼管構造(CFT造)';
    public const BUILDING_CONSTRUCTION_LIST = [
        '鉄筋コンクリート造(RC造)' => self::BUILDING_CONSTRUCTION_01,
        '鉄骨鉄筋コンクリート造(SRC造)' => self::BUILDING_CONSTRUCTION_02,
        '軽量鉄骨造(S造)' => self::BUILDING_CONSTRUCTION_03,
        '重量鉄骨造(S造)' => self::BUILDING_CONSTRUCTION_04,
        '木造(W造)' => self::BUILDING_CONSTRUCTION_05,
        'アルミ造(AL造)' => self::BUILDING_CONSTRUCTION_06,
        'コンクリートブロック造(CB造)' => self::BUILDING_CONSTRUCTION_07,
        'コンクリート充填鋼管構造(CFT造)' => self::BUILDING_CONSTRUCTION_08,
    ];
    public const WATER_SUPPLY_01 = '公営水道';
    public const WATER_SUPPLY_02 = '私営水道';
    public const WATER_SUPPLY_03 = '井戸';
    public const WATER_SUPPLY_LIST = [
        '公営水道' => self::WATER_SUPPLY_01,
        '私営水道' => self::WATER_SUPPLY_02,
        '井戸' => self::WATER_SUPPLY_03,
    ];
    public const SEWAGE_LINE_01 = '公共下水';
    public const SEWAGE_LINE_02 = '個別浄化槽';
    public const SEWAGE_LINE_03 = '集中浄化槽';
    public const SEWAGE_LINE_04 = '汲取式';
    public const SEWAGE_LINE_LIST = [
        '公共下水' => self::SEWAGE_LINE_01,
        '個別浄化槽' => self::SEWAGE_LINE_02,
        '集中浄化槽' => self::SEWAGE_LINE_03,
        '汲取式' => self::SEWAGE_LINE_04,
    ];
    <option value="都市ガス" @if(old('gas') === '都市ガス') selected @endif>都市ガス</option>
    <option value="個別プロパン" @if(old('gas') === '個別プロパン') selected @endif>個別プロパン</option>
    <option value="集中プロパン" @if(old('gas') === '集中プロパン') selected @endif>集中プロパン</option>
    public const GAS_01 = ''
}
