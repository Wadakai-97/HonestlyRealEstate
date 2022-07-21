<?php

use App\Models\Information;
use Illuminate\Database\Seeder;

class InformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Information::class, 10)->create();
    }
}
