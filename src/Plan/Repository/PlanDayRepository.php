<?php
namespace Virtuagym\Plan\Repository;

use Virtuagym\Plan\Entity\Plan;
use Virtuagym\Plan\Entity\PlanDay;
use Virtuagym\Plan\PlanDayRepositoryInterface;

class PlanDayRepository implements PlanDayRepositoryInterface
{

    /**
     * @inheritdoc
     */
    public function findAll()
    {
        return PlanDay::all();
    }

    /**
     * @inheritdoc
     */
    public function findOneById($id)
    {
        return PlanDay::findOrFail($id);
    }

    /**
     * @inheritdoc
     */
    public function create(Plan $plan, $name)
    {
        $planDay = new PlanDay();
        $planDay->plan_id = $plan->id;
        $planDay->name = $name;
        $planDay->save();

        return $planDay;
    }

    /**
     * @inheritdoc
     */
    public function update(PlanDay $planDay, array $params)
    {
        if(isset($params['name']))
        {
            $planDay->name = $params['name'];
        }

        $planDay->save();

        return true;
    }

    /**
     * @inheritdoc
     */
    public function destroy($planId)
    {
        $this->findOneById($planId)->delete();

        return true;
    }
}
