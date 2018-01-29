<?php
namespace Virtuagym\Plan;

use Illuminate\Support\ServiceProvider;
use Virtuagym\Plan\Repository\PlanRepository;
use Virtuagym\Plan\Service\PlanService;

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
        $this->app->bind(PlanServiceInterface::class, function () {
            return new PlanService();
        });
    }
}
