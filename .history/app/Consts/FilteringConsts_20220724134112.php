<?php

namespace App\Consts;

class FilteringConsts
{
    public const LOWEST_PRICE_01 = '1000';
    public const LOWEST_PRICE_02 = '2000';
    public const LOWEST_PRICE_03 = '3000';
    public const LOWEST_PRICE_04 = '4000';
    public const LOWEST_PRICE_05 = '5000';
    public const LOWEST_PRICE_06 = '6000';
    public const LOWEST_PRICE_07 = '7000';
    public const LOWEST_PRICE_08 = '8000';
    public const LOWEST_PRICE_09 = '9000';
    public const LOWEST_PRICE_10  =  '10000';
    public const LOWEST_PRICE_LIST = [
        '1000' => self::LOWEST_PRICE_01,
        '2000' => self::LOWEST_PRICE_02,
        '3000' => self::LOWEST_PRICE_03,
        '4000' => self::LOWEST_PRICE_04,
        '5000' => self::LOWEST_PRICE_05,
        '6000' => self::LOWEST_PRICE_06,
        '7000' => self::LOWEST_PRICE_07,
        '8000' => self::LOWEST_PRICE_08,
        '9000' => self::LOWEST_PRICE_09,
        '10000' => self::LOWEST_PRICE_10,
    ];

    public const HIGHEST_PRICE_01 = '1000万円未満';
    public const HIGHEST_PRICE_02 = '2000万円未満';
    public const HIGHEST_PRICE_03 = '3000万円未満';
    public const HIGHEST_PRICE_04 = '4000万円未満';
    public const HIGHEST_PRICE_05 = '5000万円未満';
    public const HIGHEST_PRICE_06 = '6000万円未満';
    public const HIGHEST_PRICE_07 = '7000万円未満';
    public const HIGHEST_PRICE_08 = '8000万円未満';
    public const HIGHEST_PRICE_09 = '9000万円未満';
    public const HIGHEST_PRICE_10  =  '1億円未満';
    public const HIGHEST_PRICE_LIST = [
        '1000万円未満' => self::HIGHEST_PRICE_01,
        '2000万円未満' => self::HIGHEST_PRICE_02,
        '3000万円未満' => self::HIGHEST_PRICE_03,
        '4000万円未満' => self::HIGHEST_PRICE_04,
        '5000万円未満' => self::HIGHEST_PRICE_05,
        '6000万円未満' => self::HIGHEST_PRICE_06,
        '7000万円未満' => self::HIGHEST_PRICE_07,
        '8000万円未満' => self::HIGHEST_PRICE_08,
        '9000万円未満' => self::HIGHEST_PRICE_09,
        '1億円未満' => self::HIGHEST_PRICE_10,
    ];


}
