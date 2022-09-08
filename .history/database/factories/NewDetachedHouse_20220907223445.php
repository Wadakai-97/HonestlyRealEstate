<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\NewDetachedHouse;
use Faker\Generator as Faker;

$factory->define(NewDetachedHouse::class, function (Faker $faker) {
    $yes_or_no = ['あり', 'なし', ];
    $name = ['ミニマムな家', '広々戸建て', '駅チカ物件！', ];
    $tax = ['税込', '非課税', ];
    $pref = ['神奈川県', '東京都', ];
    $municipalities = ['横浜市西区みなとみらい', '鎌倉市雪ノ下', '千代田区千代田', ];
    $block = ['1丁目35', '5丁目4', '3丁目2-4-3', ];
    $type_of_room = ['K', 'DK', 'LDK', ];
    $station = ['新横浜', '渋谷', '新宿', '池袋', '横浜', ];
    $access_method = ['徒歩', 'バス', '車', ];
    $building_construction = ['木造アスファルトシングル葺3階建て', '木造亜鉛メッキ銅板葺2階建て', '軽量鉄骨2階建て', ];
    $land_right = ['所有権', '普通借地権',];
    $urban_planning = ['市街化区域', '市街化調整区域', '非線引き区域',];
    $land_use_zones = ['第一種低層住居専用地域', '商業地域', '準工業地域',];
    $national_land_utilization_law = ['必要', '不要', ];
    $land_classification = ['宅地', '山林',];
    $terrain = ['平坦', '高台', '傾斜地', 'ひな段',];
    $adjacent_road = ['法42条1項1号道路（公道）', '法42条1項2号道路（開発道路）', '法42条1項3号道路（既存道路）', '法42条1項4号道路（計画道路）', '法42条1項5号道路（位置指定道路）', '法42条2項道路（みなし道路）', ];
    $water_supply = ['公営水道', '私営水道', '井戸', ];
    $sewage_line = ['公共下水', '個別浄化槽', ];
    $gas = ['都市ガス', '個別プロパン', ];
    $status = ['更地', '建築中', '完成済み'];
    $elementary_school_name = ['間門小学校', '本牧小学校', '本牧南小学校', ];
    $junior_high_school_name = ['大鳥中学校', '本牧中学校', '仲尾台中学校', ];
    $delivery_date = ['即日可能', '相談',];
    $building_certification_number = ['第0000SBC-確00000Y号', '	第00UD01S建00000号',];
    $conditions_of_transactions = ['売主', '代理' , '一般媒介', '専任媒介', '専属専任媒介', ];

    return [
            'name' => $faker->randomElement($name),
            'price' => $faker->randomNumber(4),
            'tax' => $faker->randomElement($tax),
            'pref'=> $faker->randomElement($pref),
            'municipalities'=> $faker->randomElement($municipalities),
            'block'=> $faker->randomElement($block),
            'land_area'=> $faker->randomFloat(2, 50, 200),
            'number_of_rooms'=> $faker->numberBetween(1, 9),
            'type_of_room'=> $faker->randomElement($type_of_room),
            'building_area'=> $faker->randomFloat(2, 50, 300),
            'balcony' => $faker->randomElement($yes_or_no),
            'balcony_area'=> $faker->randomFloat(2, 10, 30),
            'building_coverage_ratio' = >$faker->randomNumber(2),
            'floor_area_ratio'=>$faker->randomNumber(2),
            'parking'=> $faker->randomElement($yes_or_no),
            'parking_lot'=>$faker->randomNumber(1),
            'year' => $faker->numberBetween(1990, 2022),
            'month' => $faker->numberBetween(1, 12),
            'day' => $faker->numberBetween(1, 29),
            'station'=>$faker->randomElement($station),
            'access_method'=>$faker->randomElement($access_method),
            'distance_station'=>$faker->numberBetween(1, 30),
            'building_construction'=>$faker->randomElement($building_construction),
            'land_right'=>$faker->randomElement($land_right),
            'urban_planning'=>$faker->randomElement($urban_planning),
            'land_use_zones'=>$faker->randomElement($land_use_zones),
            'restrictions_by_law'=>$faker->randomElement($yes_or_no),
            'land_classification'=>$faker->randomElement($land_classification),
            'terrain'=>$faker->randomElement($terrain),
            'adjacent_road'=>$faker->randomElement($adjacent_road),
            'adjacent_road_width'=>$faker->randomFloat(2, 0, 4),
            'private_road'=>$faker->randomElement($yes_or_no),
            'setback'=>$faker->randomElement($yes_or_no),
            'setback_length'=>$faker->randomFloat(2, 0, 3),
            'water_supply'=>$faker->randomElement($water_supply),
            'sewage_line'=>$faker->randomElement($sewage_line),
            'gas'=>$faker->randomElement($gas),
            'building_certification_number'=>$faker->randomElement($building_certification_number),
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
