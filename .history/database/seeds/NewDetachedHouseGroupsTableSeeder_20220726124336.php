<?php

use App\Models\NewDetachedHouseGroup;
use Illuminate\Database\Seeder;

class NewDetachedHouseGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(NewDetachedHouseGroup::class, 2000)->create();
    }
}
