<?php

namespace App\Consts;

class StaffConsts
{
    public const POSITION_01 = '主任';
    public const POSITION_02 = '係長';
    public const POSITION_03 = '課長代理';
    public const POSITION_04 = '課長';
    public const POSITION_05 = '部長代理';
    public const POSITION_06 = '部長';
    public const POSITION_07 = '事業部長';
    public const POSITION_SHIKKOYAKUIN = '執行役員';
    public const POSITION_SENMU= '専務';
    public const POSITION_LIST = [
        '主任' => self::POSITION_01,
        '係長' => self::POSITION_02,
        '課長代理' => self::POSITION_03,
        '課長' => self::POSITION_04,
        '部長代理' => self::POSITION_0,
        '部長' => self::POSITION_BUCHO,
        '事業部長' => self::POSITION_JIGYO_BUCHO,
        '執行役員' => self::POSITION_SHIKKOYAKUIN,
        '専務' => self::POSITION_SENMU,
    ];
}
