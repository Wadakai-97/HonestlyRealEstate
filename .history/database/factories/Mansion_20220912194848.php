<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Mansion;
use Faker\Generator as Faker;

$factory->define(Mansion::class, function (Faker $faker) {
    $yes_or_no = ['あり', 'なし', ];
    $apartment_name = ['六本木ヒルズ', 'トキワ荘', 'パークコート赤坂ザ・タワー', 'ライオンズマンション', ];
    $room = ['101', '1025', '302', '2002', ];
    $tax = ['税込', '非課税', ];
    $pref = ['神奈川県', '東京都', ];
    $municipalities = ['横浜市西区みなとみらい', '横浜市中区本牧三之谷', '横浜市港北区新横浜', '鎌倉市雪ノ下', '渋谷区消灯' '千代田区千代田', ];
    $block = ['1丁目35', '5丁目4', '3丁目2-4-3', ];
    $type_of_room = ['K', 'DK', 'LDK', ];
    $measuring_method = ['壁芯', '内法', '不明', ];
    $parking_lot = ['空きあり', '空きなし', '駐車場なし'];
    $story = ['地上50階建', '地上90階地下4階建', ];
    $direction = ['東', '西', '南', '北',];
    $access_method = ['徒歩', 'バス', '車', ];
    $station = ['新横浜', '渋谷', '新宿', '池袋', '横浜', ];
    $land_use_zones = ['第一種低層住居専用地域', '商業地域', '準工業地域',];
    $building_construction = ['軽量鉄骨造(S造)', '鉄筋コンクリート造(RC造)', '鉄骨鉄筋コンクリート造(SRC造)',];
    $land_right = ['所有権', '普通借地権',];
    $management_system = ['常駐管理', '日勤管理', '巡回管理', '自主管理',];
    $other_fee = ['自転車置き場100円/1台', 'バイク置き場1000円/1台'];
    $elementary_school_name = ['間門小学校', '本牧小学校', '本牧南小学校', ];
    $junior_high_school_name = ['大鳥中学校', '本牧中学校', '仲尾台中学校', ];
    $status = ['空室', '居住中',];
    $delivery_date = ['即日可能', '相談',];
    $conditions_of_transactions = ['売主', '代理' , '一般媒介', '専任媒介', '専属専任媒介', ];

    return [
            'apartment_name' => $faker->randomElement($apartment_name),
            'room' => $faker->randomElement($room),
            'price' => $faker->randomFloat(1, 900, 11000),
            'tax' => $faker->randomElement($tax),
            'pref'=>$faker->randomElement($pref),
            'municipalities'=>$faker->randomElement($municipalities),
            'block'=>$faker->randomElement($block),
            'year' => $faker->numberBetween(1990, 2022),
            'month' => $faker->numberBetween(1, 12),
            'day' => $faker->numberBetween(1, 29),
            'land_area'=>$faker->randomFloat(2, 500, 3000),
            'building_area'=>$faker->randomFloat(2, 1000, 3000),
            'number_of_rooms'=>$faker->numberBetween(1, 9),
            'type_of_room'=>$faker->randomElement($type_of_room),
            'measuring_method'=>$faker->randomElement($measuring_method),
            'occupation_area'=>$faker->randomFloat(2, 30, 300),
            'balcony' => $faker->randomElement($yes_or_no),
            'balcony_area'=>$faker->randomFloat(2, 10, 30),
            'parking_lot'=>$faker->randomElement($parking_lot),
            'floor'=>$faker->numberBetween(1, 90),
            'story'=>$faker->randomElement($story),
            'direction'=>$faker->randomElement($direction),
            'station'=>$faker->randomElement($station),
            'access_method'=>$faker->randomElement($access_method),
            'distance_station'=>$faker->numberBetween(1, 30),
            'building_construction'=>$faker->randomElement($building_construction),
            'total_number_of_households'=>$faker->numberBetween(5, 300),
            'land_right'=>$faker->randomElement($land_right),
            'land_use_zones'=>$faker->randomElement($land_use_zones),
            'management_company'=>$faker->company(),
            'management_system'=>$faker->randomElement($management_system),
            'maintenance_fee'=>$faker->numberBetween(0, 40000),
            'reserve_fund_for_repair'=>$faker->numberBetween(0, 40000),
            'other_fee'=>$faker->randomElement($other_fee),
            'status'=>$faker->randomElement($status),
            'delivery_date'=>$faker->randomElement($delivery_date),
            'property_introduction'=>$faker->realText(800),
            'sales_comment'=>$faker->realText(200),
            'elementary_school_name'=>$faker->randomElement($elementary_school_name),
            'elementary_school_district'=>$faker->numberBetween(1, 30),
            'junior_high_school_name'=>$faker->randomElement($junior_high_school_name),
            'junior_high_school_district'=>$faker->numberBetween(1, 30),
            'conditions_of_transactions'=>$faker->randomElement($conditions_of_transactions),
    ];
});
