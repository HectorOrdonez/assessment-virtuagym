<?php
namespace Virtuagym\Plan;

use Illuminate\Support\ServiceProvider;
use Virtuagym\Plan\Repository\PlanRepository;

class PlanServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->bind(PlanRepositoryInterface::class, function () {
            return new PlanRepository();
        });
    }
}
