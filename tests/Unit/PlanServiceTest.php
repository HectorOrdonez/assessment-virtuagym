<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Mockery\MockInterface;
use Tests\TestCase;
use Virtuagym\Plan\Entity\Plan;
use Virtuagym\Plan\Service\PlanService;
use Virtuagym\User\Entity\User;

class PlanServiceTest extends TestCase
{
    public function testAssignUserToPlan()
    {
        $userId = rand(1, 1000);

        /**
         * @var MockInterface|User $userMock
         */
        $userMock = \Mockery::mock(User::class);
        $userMock->shouldReceive('getId')->andReturn($userId);

        /**
         * @var MockInterface|HasMany $usersMock
         */
        $usersMock = \Mockery::mock(HasMany::class);
        $usersMock->shouldReceive('save')->once()->with($userMock);

        /**
         * @var MockInterface|Plan $planMock
         */
        $planMock = \Mockery::mock(Plan::class);
        $planMock->shouldReceive('users')->once()->andReturn($usersMock);

        $planService = new PlanService();
        $response = $planService->assignUserToPlan($userMock, $planMock);

        $this->assertTrue($response);
    }

    public function testRemoveUserFromPlan()
    {
        /**
         * @var MockInterface|User $userMock
         */
        $userMock = \Mockery::mock(User::class);
        $userMock->shouldReceive('setAttribute')->with('plan_id', null);
        $userMock->shouldReceive('save')->once();

        /**
         * @var MockInterface|Plan $planMock
         */
        $planMock = \Mockery::mock(Plan::class);

        $planService = new PlanService();
        $response = $planService->removeUserFromPlan($userMock, $planMock);

        $this->assertTrue($response);
    }
}
