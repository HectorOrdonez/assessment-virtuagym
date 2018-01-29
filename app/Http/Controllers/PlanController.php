<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPlanRequest;
use Virtuagym\Plan\PlanRepositoryInterface;

class PlanController extends Controller
{
    const PLAN_CREATED = 'Plan %s created successfully';

    public function store(PlanRepositoryInterface $repository, NewPlanRequest $newPlanRequest)
    {
        $plan = $repository->create($newPlanRequest->get('name'));

        return redirect()
            ->route('home')
            ->with('flash_message', sprintf(self::PLAN_CREATED, $plan->name));
    }
}
