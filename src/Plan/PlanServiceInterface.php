<?php
namespace Virtuagym\Plan;


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
}
