<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Land;
use Faker\Generator as Faker;

$factory->define(Land::class, function (Faker $faker) {
    $yes_or_no = ['あり', 'なし', ];
    $name = ['日当たり良好な駅チカ物件', '銀座4丁目住所！', 'マンションも建築可能な土地', ];
    $tax = ['税込', '非課税', ];
    $pref = ['神奈川県', '東京都', ];
    $municipalities = ['横浜市西区みなとみらい', '鎌倉市雪ノ下', '千代田区千代田', ];
    $block = ['1丁目35', '5丁目4', '3丁目2-4-3', ];
    $station = ['新横浜', '渋谷', '新宿', '池袋', '横浜', ];
    $land_right = ['所有権', '普通借地権',];
    $urban_planning = ['市街化区域', '市街化調整区域', '非線引き区域',];
    $land_use_zones = ['第一種低層住居専用地域', '商業地域', '準工業地域',];
    $national_land_utilization_law = ['不明', '不要', '必要（事前届出）', '必要（事後届出）'];
    $land_classification = ['宅地', '山林',];
    $terrain = ['平坦', '高台', '傾斜地', 'ひな段',];
    $adjacent_road = ['法第42条1項1号道路（公道）', '法第42条1項2号道路（開発道路）', ];
    '法42条1項1号道路（公道）', '法42条1項2号道路（開発道路）', '法42条1項3号道路（既存道路）', '法42条1項4号道路（計画道路）', '法42条1項5号道路（位置指定道路）', '法42条2項道路（みなし道路）'
    $water_supply = ['公営水道', '私営水道', '井戸', ];
    $sewage_line = ['公共下水', '個別浄化槽', ];
    $gas = ['都市ガス', '個別プロパン', ];
    $elementary_school_name = ['間門小学校', '本牧小学校', '本牧南小学校', ];
    $junior_high_school_name = ['大鳥中学校', '本牧中学校', '仲尾台中学校', ];
    $status = ['古屋あり(現況渡し)', '更地',];
    $delivery_date = ['即日可能', '相談',];
    $conditions_of_transactions = ['媒介', '売主', '代理' ];

    return [
            'name' => $faker->randomElement($name),
            'price' => $faker->randomNumber(4),
            'tax' => $faker->randomElement($tax),
            'pref'=>$faker->randomElement($pref),
            'municipalities'=>$faker->randomElement($municipalities),
            'block'=>$faker->randomElement($block),
            'construction_conditions' => $faker->randomElement($yes_or_no),
            'land_area'=>$faker->randomNumber(3),
            'building_coverage_ratio'=>$faker->randomNumber(2),
            'floor_area_ratio'=>$faker->randomNumber(2),
            'station'=>$faker->randomElement($station),
            'walking_distance_station'=>$faker->numberBetween(1, 30),
            'land_right'=>$faker->randomElement($land_right),
            'urban_planning'=>$faker->randomElement($urban_planning),
            'land_use_zones'=>$faker->randomElement($land_use_zones),
            'restrictions_by_law'=>$faker->randomElement($yes_or_no),
            'national_land_utilization_law'=>$faker->randomElement($national_land_utilization_law),
            'land_classification'=>$faker->randomElement($land_classification),
            'terrain'=>$faker->randomElement($terrain),
            'adjacent_road'=>$faker->randomElement($adjacent_road),
            'adjacent_road_width'=>$faker->randomNumber(1),
            'private_road'=>$faker->randomElement($yes_or_no),
            'setback'=>$faker->randomElement($yes_or_no),
            'water_supply'=>$faker->randomElement($water_supply),
            'sewage_line'=>$faker->randomElement($sewage_line),
            'gas'=>$faker->randomElement($gas),
            'status'=>$faker->randomElement($status),
            'delivery_date'=>$faker->randomElement($delivery_date),
            'property_introduction'=>$faker->realText(120),
            'sales_comment'=>$faker->realText(60),
            'elementary_school_name'=>$faker->randomElement($elementary_school_name),
            'elementary_school_district'=>$faker->numberBetween(1, 30),
            'junior_high_school_name'=>$faker->randomElement($junior_high_school_name),
            'junior_high_school_district'=>$faker->numberBetween(1, 30),
            'conditions_of_transactions'=>$faker->randomElement($conditions_of_transactions),
    ];
});
