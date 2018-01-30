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
}
