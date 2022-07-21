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
    public const DIRECTION_01 = '南東';
    public const DIRECTION_01 = '南';
    public const DIRECTION_01 = '南西';
    public const DIRECTION_01 = '西';
    public const DIRECTION_01 = '北西';
    public const DIRECTION_01 = '';
    public const DIRECTION_01 = '東';
    public const DIRECTION_01 = '東';
    public const DIRECTION_01 = '東';
    public const DIRECTION_01 = '東';
    public const DIRECTION_01 = '東';
    public const DIRECTION_01 = '東';
    public const DIRECTION_01 = '東';
    <option value="東" @if(old('direction') === '東') selected @endif>東</option>
    <option value="南東" @if(old('direction') === '南東') selected @endif>南東</option>
    <option value="西" @if(old('direction') === '西') selected @endif>西</option>
    <option value="北西" @if(old('direction') === '北西') selected @endif>北西</option>
    <option value="南" @if(old('direction') === '南') selected @endif>南</option>
    <option value="南西" @if(old('direction') === '南西') selected @endif>南西</option>
    <option value="北" @if(old('direction') === '北') selected @endif>北</option>
    <option value="北東" @if(old('direction') === '北東') selected @endif>北東</option>
}
