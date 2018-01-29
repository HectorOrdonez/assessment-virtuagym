<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Virtuagym\Plan\Entity\PlanCollection;
use Virtuagym\Plan\PlanRepositoryInterface;
use Virtuagym\Plan\Repository\PlanRepository;

class PlanRepositoyTest extends TestCase
{
    /**
     * @var PlanRepositoryInterface
     */
    private $repo;

    public function setUp()
    {
        parent::setUp();

        $this->repo = $this->app->make(PlanRepositoryInterface::class);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRepoCanBeInstantiatedFromContainer()
    {
        $repo = $this->app->make(PlanRepositoryInterface::class);

        $this->assertInstanceOf(PlanRepository::class, $repo);
    }

    public function testFindAllReturnsCurrentPlans()
    {
        $plans = $this->repo->findAll();

        $this->assertInstanceOf(PlanCollection::class, $plans);
    }

    public function testCanCreatePlan()
    {
        $name = 'best workout ever';

        $plan = $this->repo->create($name);

        $this->assertEquals($name, $plan->name);
    }
}
