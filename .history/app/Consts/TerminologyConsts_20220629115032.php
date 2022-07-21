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
        '更地' => self::LAND_STATUS_01,
        '古屋あり（現況渡し）' => self::LAND_STATUS_02,
        '古屋あり（更地渡し）' => self::LAND_STATUS_03,
    ];

    public const

    "不明" @if(old('national_land_utilization_law') === '不明') selected @endif>不明</option>
                            <option value="不要" @if(old('national_land_utilization_law') === '不要') selected @endif>不要</option>
                            <option value="必要（事前届出）" @if(old('national_land_utilization_law') === '必要（事前届出）') selected @endif>必要（事前届出）</option>
                            <option value="必要（事後届出）"
}
