<?php

use App\Models\Mansion;
use App\Models\MansionAccess;
use Illuminate\Database\Seeder;

class MansionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Mansion::class, 2000)->create();

        for($i = 1 ; $i <= 100 ; $i++) {
            $mansion_id = $mansions->random()->id;
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

            $access = MansionAccess::firstOrNew([
                'mansion_id' => $mansion_id,
                'ip' => $ip
            ]);
            $access->save();

        }
    }
}
