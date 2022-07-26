<?php

use App\Models\Mansion;
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
        factory(Mansion::class, 500)->create();
    }
}
