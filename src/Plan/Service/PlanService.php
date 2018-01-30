<?php
namespace Virtuagym\Plan\Service;

use Virtuagym\Plan\Entity\Exercise;
use Virtuagym\Plan\Entity\Plan;
use Virtuagym\Plan\Entity\PlanDay;
use Virtuagym\Plan\ExerciseRepositoryInterface;
use Virtuagym\Plan\PlanDayRepositoryInterface;
use Virtuagym\Plan\PlanServiceInterface;
use Virtuagym\User\Entity\User;

class PlanService implements PlanServiceInterface
{
    private $planDayRepository;
    private $exerciseRepository;

    public function __construct(
        PlanDayRepositoryInterface $planDayRepository,
        ExerciseRepositoryInterface $exerciseRepository
    )
    {
        $this->planDayRepository = $planDayRepository;
        $this->exerciseRepository = $exerciseRepository;
    }

    /**
     * @param User $user
     * @param Plan $plan
     * @return bool
     *
     * @todo Send an email
     */
    public function assignUserToPlan(User $user, Plan $plan)
    {
        $plan->users()->save($user);

        return true;
    }

    /**
     * @param User $user
     * @param Plan $plan
     * @return bool
     *
     * @todo Right now there is no need for the plan to do this, but we might want to send an email
     *       and there we might specify the plan that got removed from the user
     */
    public function removeUserFromPlan(User $user, Plan $plan)
    {
        $user->plan_id = null;
        $user->save();

        return true;
    }

    /**
     * @param Plan $plan
     * @param string $dayName
     * @return PlanDay
     */
    public function addDayToPlan(Plan $plan, $dayName)
    {
        $this->planDayRepository->create($plan, $dayName);
    }

    /**
     * @param Plan $plan
     * @param PlanDay $day
     * @param $exerciseName
     * @return Exercise
     */
    public function addExerciseToDay(Plan $plan, PlanDay $day, $exerciseName)
    {
        return $this->exerciseRepository->create($day, $exerciseName);
    }

    /**
     * @param Plan $plan
     * @param PlanDay $day
     * @return bool
     */
    public function removeDayFromPlan(Plan $plan, PlanDay $day)
    {
        return $this->planDayRepository->destroy($day->id);
    }

    /**
     * @param Plan $plan
     * @param PlanDay $day
     * @param Exercise $exercise
     * @return bool
     */
    public function removeExerciseFromDay(Plan $plan, PlanDay $day, Exercise $exercise)
    {
        return $this->exerciseRepository->destroy($exercise->id);
    }

    /**
     * @param Plan $plan
     * @param PlanDay $day
     * @param array $params
     * @return bool
     */
    public function updateDayFromPlan(Plan $plan, PlanDay $day, array $params)
    {
        return $this->planDayRepository->update($day, $params);
    }

    /**
     * @param Plan $plan
     * @param PlanDay $day
     * @param Exercise $exercise
     * @param array $params
     * @return bool
     */
    public function updateExerciseFromDay(Plan $plan, PlanDay $day, Exercise $exercise, array $params)
    {
        return $this->exerciseRepository->update($exercise, $params);
    }
}
