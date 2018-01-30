<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlanDayRequest;
use Virtuagym\Plan\PlanDayRepositoryInterface;
use Virtuagym\Plan\PlanRepositoryInterface;
use Virtuagym\Plan\PlanServiceInterface;

class PlanDayController extends Controller
{
    const PLAN_DAY_CREATED = 'Plan day successfully created';
    const PLAN_DAY_DESTROYED = 'Plan day successfully destroyed';

    public function store(
        PlanServiceInterface $service,
        PlanRepositoryInterface $repository,
        CreatePlanDayRequest $request,
        $planId
    )
    {
        $plan = $repository->findOneById($planId);

        $service->addDayToPlan($plan, $request->get('name'));

        return redirect()
            ->route('plans.show', $plan->id)
            ->with('flash_message', self::PLAN_DAY_CREATED);
    }

    public function update()
    {

    }

    public function destroy(PlanDayRepositoryInterface $planDayRepository, $planId, $planDayId)
    {
        $planDayRepository->destroy($planDayId);

        return redirect()
            ->route('plans.show', $planId)
            ->with('flash_message', self::PLAN_DAY_DESTROYED);
    }
}
