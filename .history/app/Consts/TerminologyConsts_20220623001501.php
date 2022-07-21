<?php

namespace App\Consts;

class TerminologyConsts
{
    public const CONDITIONS_OF_TRANSACTIONS_01 = '売主';
    public const CONDITIONS_OF_TRANSACTIONS_02 = '代理';
    public const CONDITIONS_OF_TRANSACTIONS_03 = '一般媒介';
    public const CONDITIONS_OF_TRANSACTIONS_04 = '専任媒介';
    public const CONDITIONS_OF_TRANSACTIONS_05 = '専属専任媒介';
    public const CONDITIONS_OF_TRANSACTIONS_LIST = [
        '売主' => self::CONDITIONS_OF_TRANSACTIONS_01,
        '代理' => self::CONDITIONS_OF_TRANSACTIONS_02,
        '一般媒介' => self::CONDITIONS_OF_TRANSACTIONS_03,
        '専任媒介' => self::CONDITIONS_OF_TRANSACTIONS_04,
        '専属専任媒介' => self::CONDITIONS_OF_TRANSACTIONS_05,
    ];

    public const LAND_STATUS_01 = '更地';
    public const LAND_STATUS_02 = '古屋あり（現況渡し）';
    public const LAND_STATUS_03 = '古屋あり（更地渡し）';
    public const LAND_STATUS_LIST = [
        '更地' => self::LAND_CONDI
        '古屋あり（現況渡し）' => self::LAND_CONDI
        '古屋あり（更地渡し）' => self::LAND_CONDI
    ];

    <option value="更地" @if(old('status') === '更地') selected @endif>更地</option>
    <option value="古屋あり（現況渡し）" @if(old('status') === '古屋あり（現況渡し）') selected @endif>古屋あり（現況渡し）</option>
    <option value="古屋あり（更地渡し）" @if(old('status') === '古屋あり（更地渡し)') selected @endif>古屋あり（更地渡し）</option>
}
