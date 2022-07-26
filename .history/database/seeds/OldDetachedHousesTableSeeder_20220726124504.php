<?php

use App\Models\OldDetachedHouse;
use Illuminate\Database\Seeder;

class OldDetachedHousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OldDetachedHouse::class, 2000)->create();
    }c
}
