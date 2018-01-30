<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExerciseRequest;
use App\Http\Requests\UpdateExerciseRequest;
use Virtuagym\Plan\ExerciseRepositoryInterface;
use Virtuagym\Plan\PlanDayRepositoryInterface;
use Virtuagym\Plan\PlanRepositoryInterface;
use Virtuagym\Plan\PlanServiceInterface;
use Virtuagym\Plan\Repository\PlanRepository;

class PlanDayExerciseController extends Controller
{
    const EXERCISE_CREATED = 'Exercise created successfully';
    const EXERCISE_DESTROYED = 'Exercise destroyed successfully';

    public function store(
        PlanServiceInterface $planService,
        PlanRepositoryInterface $planRepository,
        PlanDayRepositoryInterface $dayRepository,
        CreateExerciseRequest $request,
        $planId,
        $dayId
    )
    {
        $plan = $planRepository->findOneById($planId);
        $day = $dayRepository->findOneById($dayId);

        $planService->addExerciseToDay($plan, $day, $request->get('name'));

        return redirect()
            ->route('plans.show', $plan->id)
            ->with('flash_message', self::EXERCISE_CREATED);
    }

    public function update(
        PlanServiceInterface $service,
        PlanRepositoryInterface $planRepository,
        PlanDayRepositoryInterface $planDayRepository,
        ExerciseRepositoryInterface $exerciseRepository,
        UpdateExerciseRequest $request,
        $planId,
        $planDayId,
        $exerciseId
    )
    {
        $plan = $planRepository->findOneById($planId);
        $planDay = $planDayRepository->findOneById($planDayId);
        $exercise = $exerciseRepository->findOneById($exerciseId);

        $service->updateExerciseFromDay($plan, $planDay, $exercise, ['name' => $request->get('name')]);

        return ['ok'];
    }

    public function destroy(
        PlanServiceInterface $planService,
        PlanRepositoryInterface $planRepository,
        PlanDayRepositoryInterface $dayRepository,
        ExerciseRepositoryInterface $exerciseRepository,
        $planId,
        $dayId,
        $exerciseId
    )
    {
        $plan = $planRepository->findOneById($planId);
        $planDay = $dayRepository->findOneById($dayId);
        $exercise = $exerciseRepository->findOneById($exerciseId);

        $planService->removeExerciseFromDay($plan, $planDay, $exercise);

        return redirect()
            ->route('plans.show', $planId)
            ->with('flash_message', self::EXERCISE_DESTROYED);
    }
}
