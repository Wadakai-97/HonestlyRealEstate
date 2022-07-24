<?php

namespace App\Consts;

class FilteringConsts
{
    public const LOW_01 = '1000';
    public const LOW_02 = '2000';
    public const LOW_03 = '3000';
    public const LOW_04 = '4000';
    public const LOW_05 = '5000';
    public const LOW_06 = '6000';
    public const LOW_07 = '7000';
    public const LOW_08 = '8000';
    public const LOW_09 = '9000';
    public const LOW_10  =  '1億円以上';
    public const LOW_LIST = [
        '1000' => self::LOW_01,
        '2000' => self::LOW_02,
        '3000' => self::LOW_03,
        '4000' => self::LOW_04,
        '5000' => self::LOW_05,
        '6000' => self::LOW_06,
        '7000' => self::LOW_07,
        '8000' => self::LOW_08,
        '9000' => self::LOW_09,
        '10000' => self::LOW_10,
    ];
}
