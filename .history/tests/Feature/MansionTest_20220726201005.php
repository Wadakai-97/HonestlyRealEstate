<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Feature\MansionTest;
use App\Http\Requests\MansionSignUpRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class MansionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * マンション新規登録テスト
     *
     * @dataProvider dataMansionSignUp
     */
    public function testMansionSignUp(array $keys, array $values, bool $expect)
    {
        $requestList = array_combine($keys, $values);
        $request = new MansionSignUpRequest();
        $rules = $request->rules();
        $validator = Validator::make($requestList, $rules);
        $result = $validator->passes();
        $this->assertEquals($expect, $result);
    }


    public function dataMansionSignUp()
    {

        $testImage = UploadedFile::fake()->image('test.jpg');

        return [
            'Pass' => [
                ['apartment_name', 'room', 'price', 'tax', 'pref', 'municipalities', 'block', 'land_area', 'building_area', 'number_of_rooms', 'type_of_room', 'measuring_method', 'occupation_area', 'balcony', 'balcony_area', 'parking_lot', 'floor', 'story', 'year', 'month', 'day', 'direction', 'station', 'walking_distance_station', 'building_construction', 'total_number_of_households', 'land_right', 'land_use_zones', 'management_company', 'management_system', 'maintenance_fee', 'reserve_fund_for_repair', 'other_fee', 'status', 'delivery_date', 'conditions_of_transactions', 'images', 'elementary_school_name', 'elementary_school_district', 'junior_high_school_name', 'junior_high_school_district', 'terms_and_conditions', 'property_introduction', 'sales_comment', 'image1', 'category1'],
                ['ライオンズマンション代官山', '1005', '9800', '税込', '神奈川県', '横浜市中区本牧三之谷', '9-3', '1500', '1000', '4', 'LDK', '壁芯', '75', 'あり', '15', 'あり', '4', '12', '1997', '3', '15', '南東', '横浜', '5', '鉄骨鉄筋コンクリート造', '85', '所有権', '商業地域', '大和ライフネクスト', '常勤', '15000', '12500', 'なし', '空室', '未定', '専任媒介', '間門小学校', '15', '大鳥中学校', '8', '室内フルリフォーム予定', '室内状態良好', 'ぜひご見学ください。', $testImage,],
                true
            ],
        ];
    }
}
