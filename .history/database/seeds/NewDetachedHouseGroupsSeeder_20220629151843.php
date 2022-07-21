<?php

use App\Models\NewDetachedHouseGroup;
use Illuminate\Database\Seeder;

class NewDetachedHouseGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(NewDetachedHouse::class, 100)->create();
    }
}
