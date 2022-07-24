<?php

namespace App\Consts;

class FilteringConsts
{
    public const PRICE_01 = '1000';
    public const PRICE_LIST = [
        '1000' => self::PRICE
    ]:

        public const MEASURING_METHOD_01 = '壁芯';
        public const MEASURING_METHOD_02 = '内法';
        public const MEASURING_METHOD_03 = '不明';
        public const MEASURING_METHOD_LIST = [
            '壁芯' => self::MEASURING_METHOD_01,
            '内法' => self::MEASURING_METHOD_02,
            '不明' => self::MEASURING_METHOD_03,
        ];
}
