<?php
namespace Virtuagym\Plan\Repository;

use Virtuagym\Plan\Entity\Plan;
use Virtuagym\Plan\Entity\PlanCollection;
use Virtuagym\Plan\PlanRepositoryInterface;

class PlanRepository implements PlanRepositoryInterface
{

    /**
     * @inheritdoc
     */
    public function findAll()
    {
        return Plan::all();
    }

    /**
     * @inheritdoc
     */
    public function findOneById($id)
    {
        return Plan::findOrFail($id);
    }

    /**
     * @inheritdoc
     */
    public function create($name)
    {
        $plan = new Plan();
        $plan->name = $name;
        $plan->save();

        return $plan;
    }

    /**
     * @inheritdoc
     */
    public function update(Plan $plan, array $params)
    {
        if(isset($params['name']))
        {
            $plan->name = $params['name'];
        }

        $plan->save();

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
