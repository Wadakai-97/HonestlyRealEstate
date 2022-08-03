<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MansionsTableSeeder::class);
        $this->call(StaffsTableSeeder::class);
        $this->call(InformationsTableSeeder::class);
        $this->call(LandsTableSeeder::class);
        $this->call(NewDetachedHousesTableSeeder::class);
        $this->call(NewDetachedHouseGroupsTableSeeder::class);
        $this->call(OldDetachedHousesTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
    }
}
