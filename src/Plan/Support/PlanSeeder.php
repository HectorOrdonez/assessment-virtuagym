<?php
namespace Virtuagym\Plan\Support;

use Illuminate\Database\Seeder;
use Virtuagym\Plan\Entity\Exercise;
use Virtuagym\Plan\Entity\Plan;
use Virtuagym\Plan\Entity\PlanDay;

class PlanSeeder extends Seeder
{
    public function run()
    {
        factory(Plan::class, 10)->create()->each(function($plan) {
            factory(PlanDay::class, 3)->create(['plan_id' => $plan->id])->each(function($day) {
                factory(Exercise::class, 4)->create(['plan_day_id' => $day->id]);
            });
        });
    }
}
