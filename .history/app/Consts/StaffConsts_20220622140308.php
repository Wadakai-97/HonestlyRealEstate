<?php

namespace App\Consts;

// usersで使う定数
class KirameigerConsts
{
    public const POSITION_SHUNIN = '主任';
    public const POSITION_KAKARICHO = '係長';
    public const POSITION_KACHO_DAIRI = '課長代理';
    public const POSITION_KACHO = '課長';
    public const POSITION_BUCHO_DAIRI = '部長代理';
    public const POSITION_BUCHO = '部長';
    public const POSITION_JIGYO_BUCHO = '事業部長';
    public const POSITION_SHIKKOYAKUIN = '執行役員';
    public const POSITION_SENMU= '専務';
    public const POSITION_LIST = [
        '主任' => self::POSITION_SHUNIN,
        '係長' => self::POSITION_SHUNIN,
        '課長代理' => self::POSITION_SHUNIN,
        '課長' => self::POSITION_SHUNIN,
        '部長代理' => self::POSITION_SHUNIN,
        '部長' => self::POSITION_SHUNIN,
        '' => self::POSITION_SHUNIN,
        '主任' => self::POSITION_SHUNIN,
        '主任' => self::POSITION_SHUNIN,
        '主任' => self::POSITION_SHUNIN,
    ];
}
