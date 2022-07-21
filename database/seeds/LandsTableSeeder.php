<?php

use App\Models\Land;
use Illuminate\Database\Seeder;

class LandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Land::class, 100)->create();
    }
}
