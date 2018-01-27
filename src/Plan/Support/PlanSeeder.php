<?php
namespace Virtuagym\Plan\Support;

use Illuminate\Database\Seeder;
use Virtuagym\Plan\Entity\Plan;

class PlanSeeder extends Seeder
{
    public function run()
    {
        factory(Plan::class, 10)->create();
    }
}
