<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignUserToPlanRequest;
use Virtuagym\Plan\PlanRepositoryInterface;
use Virtuagym\Plan\PlanServiceInterface;
use Virtuagym\User\UserRepositoryInterface;

class PlanUserController extends Controller
{
    const RELATION_CREATED = 'Plan attached to user %s';
    const RELATION_DESTROYED = 'User %s now is not using this plan';

    public function store(
        PlanServiceInterface $planService,
        PlanRepositoryInterface $planRepository,
        UserRepositoryInterface $userRepository,
        AssignUserToPlanRequest $request,
        $planId
    )
    {
        $plan = $planRepository->findOneById($planId);
        $user = $userRepository->findOneById($request->get('user_id'));

        $planService->assignUserToPlan($user, $plan);

        return redirect()
            ->route('plans.show', $plan->id)
            ->with('flash_message', sprintf(self::RELATION_CREATED, $user->full_name));
    }

    public function destroy(
        PlanServiceInterface $planService,
        PlanRepositoryInterface $planRepository,
        UserRepositoryInterface $userRepository,
        $planId,
        $userId
    ) {
        $plan = $planRepository->findOneById($planId);
        $user = $userRepository->findOneById($userId);

        $planService->removeUserFromPlan($user, $plan);

        return redirect()
            ->route('plans.show', $plan->id)
            ->with('flash_message', sprintf(self::RELATION_DESTROYED, $user->full_name));
    }
}
