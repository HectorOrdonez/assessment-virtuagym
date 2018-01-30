<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use Virtuagym\Plan\PlanRepositoryInterface;
use Virtuagym\User\UserRepositoryInterface;

class PlanController extends Controller
{
    const PLAN_CREATED = 'Plan %s created successfully';
    const PLAN_DESTROYED = 'Plan destroyed successfully';

    public function store(PlanRepositoryInterface $repository, CreatePlanRequest $newPlanRequest)
    {
        $plan = $repository->create($newPlanRequest->get('name'));

        return redirect()
            ->route('home')
            ->with('flash_message', sprintf(self::PLAN_CREATED, $plan->name));
    }

    public function show(
        PlanRepositoryInterface $planRepository,
        UserRepositoryInterface $userRepository,
        $id)
    {
        $plan = $planRepository->findOneById($id);
        $availableUsers = $userRepository->findAvailableForPlan($plan);

        return view('plans.show', compact('plan', 'availableUsers'));
    }

    public function update(
        PlanRepositoryInterface $planRepository,
        UpdatePlanRequest $request,
        $id)
    {
        $plan = $planRepository->findOneById($id);
        $newPlanName = $request->get('name');

        $planRepository->update($plan, ['name' => $newPlanName]);

        return ['ok'];
    }

    public function destroy(PlanRepositoryInterface $planRepository, $id)
    {
        $planRepository->destroy($id);

        return redirect()
            ->route('home')
            ->with('flash_message', self::PLAN_DESTROYED);
    }
}
