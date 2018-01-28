<?php

use Illuminate\Database\Seeder;
use Virtuagym\Plan\Support\PlanSeeder;
use Virtuagym\User\Support\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PlanSeeder::class);
         $this->call(UserSeeder::class);
    }
}
