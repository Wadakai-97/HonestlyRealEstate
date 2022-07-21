<?php

namespace App\Consts;

class PropertyInformationConsts
{
    public const URBAN_PLANNING_01 = '市街化区域';
    public const URBAN_PLANNING_02 = '市街化調整区域';
    public const URBAN_PLANNING_03 = '非線引き区域';
    public const URBAN_PLANNING_LIST = [
        '市街化区域' => self::URBAN_PLANNING_01,
        '市街化調整区域' => self::URBAN_PLANNING_02,
        '非線引き区域' => self::URBAN_PLANNING_03,
    ];

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

    public const TERRAIN_01 = '平坦';
    public const TERRAIN_02 = '高台';
    public const TERRAIN_03 = 'ひな段';
    public const TERRAIN_04 = '傾斜地';
    public const TERRAIN_05 = '低地';
    public const TERRAIN_LIST = [
        '平坦' => self::TERRAIN_01,
        '高台' => self::TERRAIN_02,
        'ひな段' => self::TERRAIN_03,
        '傾斜地' => self::TERRAIN_04,
        '低地' => self::TERRAIN_05,
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

    public const LAND_RIGHT_01 = '所有権';
    public const LAND_RIGHT_02 = '普通借地権';
    public const LAND_RIGHT_03 = '一般定期借地権';
    public const LAND_RIGHT_04 = '事業用定期借地権';
    public const LAND_RIGHT_05 = '建物譲渡特約付借地権';
    public const LAND_RIGHT_LIST = [
        '所有権' => self::LAND_RIGHT_01,
        '普通借地権' => self::LAND_RIGHT_02,
        '一般定期借地権' => self::LAND_RIGHT_03,
        '事業用定期借地権' => self::LAND_RIGHT_04,
        '建物譲渡特約付借地権' => self::LAND_RIGHT_05,
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

    public const GAS_01 = '都市ガス';
    public const GAS_02 = '個別プロパン';
    public const GAS_03 = '集中プロパン';
    public const GAS_LIST = [
        '都市ガス' => self::GAS_01,
        '個別プロパン' => self::GAS_02,
        '集中プロパン' => self::GAS_03,
    ];

    public const PARKING_LOT_01 = '空きあり';
    public const PARKING_LOT_02 = '空きなし';
    public const PARKING_LOT_03 = '駐車場なし';
    public const PARKING_LOT_LIST = [
        '空きあり' => ,
        '空きなし' => ,
        '駐車場なし' => ,
    ];
}
