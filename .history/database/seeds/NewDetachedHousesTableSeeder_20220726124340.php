<?php

use App\Models\NewDetachedHouse;
use Illuminate\Database\Seeder;

class NewDetachedHousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(NewDetachedHouse::class, 2000)->create();
    }
}
