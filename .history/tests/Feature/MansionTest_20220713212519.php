<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Http\Requests\MansionSignUpRequest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MansionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
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
        return [
            'Perfect' => [
                ['apartment_name', 'room', 'price', 'tax', 'pref',
                'municipalities',
                'block',
                'land_area',
                'building_area',
                'number_of_rooms',
                'type_of_room',
                'measuring_method',
                'occupation_area',
                'balcony',
                'balcony_area',
                'parking_lot',
                'floor',
                'story',
                'year',
                'month',
                'day',
                'direction',
                'station',
                'walking_distance_station',
                'building_construction',
                'total_number_of_households',
                'land_right',
                'land_use_zones',
                'management_company',
                'management_system',
                'maintenance_fee',
                'reserve_fund_for_repair',
                'other_fee',
                'status',
                'delivery_date',
                'conditions_of_transactions',
                'images',
                'elementary_school_name',
                'elementary_school_district',
                'junior_high_school_name',
                'junior_high_school_district',
                'terms_and_conditions',
                'property_introduction',
                'sales_comment',],
                ['testuser', 'test@example.com', 'password', 'password'],
                false
            ],
        ];
    }
}
