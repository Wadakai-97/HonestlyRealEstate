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

    public const NATIONAL_LAND_UTILIZATION_LAW_01 = '不明';
    public const NATIONAL_LAND_UTILIZATION_LAW_02 = '不要';
    public const NATIONAL_LAND_UTILIZATION_LAW_03 = '必要（事前届出）';
    public const NATIONAL_LAND_UTILIZATION_LAW_04 = '必要（事後届出）';
    public const NATIONAL_LAND_UTILIZATION_LAW_LIST = [
        不明';
        不要';
        必要（事前届出）';
        必要（事後届出）';
    ];
}
