<?php

use Illuminate\Database\Seeder;

class MansionAccesssTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i = 1 ; $i <= 100 ; $i++) {

            $product_id = $products->random()->id;
            $ip = Arr::random([
                '1.1.1.1',
                '2.2.2.2',
                '3.3.3.3',
                '4.4.4.4',
                '5.5.5.5',
                '6.6.6.6',
                '7.7.7.7',
                '8.8.8.8',
                '9.9.9.9',
                '10.10.10.10',
            ]);

            $access = \App\ProductAccess::firstOrNew([
                'product_id' => $product_id,
                'ip' => $ip
            ]);
            $access->save();

        }
    }
}
