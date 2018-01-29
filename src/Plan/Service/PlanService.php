<?php
namespace Virtuagym\Plan\Service;

use Virtuagym\Plan\Entity\Plan;
use Virtuagym\Plan\PlanServiceInterface;
use Virtuagym\User\Entity\User;

class PlanService implements PlanServiceInterface
{
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
}
