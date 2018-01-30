<?php
namespace Virtuagym\Plan;


use Virtuagym\Plan\Entity\Exercise;
use Virtuagym\Plan\Entity\Plan;
use Virtuagym\Plan\Entity\PlanDay;
use Virtuagym\User\Entity\User;

interface PlanServiceInterface {
    /**
     * @param User $user
     * @param Plan $plan
     * @return bool
     */
    public function assignUserToPlan(User $user, Plan $plan);

    /**
     * @param User $user
     * @param Plan $plan
     * @return bool
     */
    public function removeUserFromPlan(User $user, Plan $plan);

    /**
     * @param Plan $plan
     * @param string $dayName
     * @return PlanDay
     */
    public function addDayToPlan(Plan $plan, $dayName);

    /**
     * @param Plan $plan
     * @param PlanDay $day
     * @param $exerciseName
     * @return Exercise
     */
    public function addExerciseToDay(Plan $plan, PlanDay $day, $exerciseName);

    /**
     * @param Plan $plan
     * @param PlanDay $day
     * @return bool
     */
    public function removeDayFromPlan(Plan $plan, PlanDay $day);

    /**
     * @param Plan $plan
     * @param PlanDay $day
     * @param Exercise $exercise
     * @return bool
     */
    public function removeExerciseFromDay(Plan $plan, PlanDay $day, Exercise $exercise);

    /**
     * @param Plan $plan
     * @param PlanDay $day
     * @param array $params
     * @return bool
     */
    public function updateDayFromPlan(Plan $plan, PlanDay $day, array $params);

    /**
     * @param Plan $plan
     * @param PlanDay $day
     * @param Exercise $exercise
     * @param array $params
     * @return bool
     */
    public function updateExerciseFromDay(Plan $plan, PlanDay $day, Exercise $exercise, array $params);
}
