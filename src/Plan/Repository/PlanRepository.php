<?php
namespace Virtuagym\Plan\Repository;

use Virtuagym\Plan\Entity\Plan;
use Virtuagym\Plan\Entity\PlanCollection;
use Virtuagym\Plan\PlanRepositoryInterface;

class PlanRepository implements PlanRepositoryInterface
{

    /**
     * @return PlanCollection|Plan[]
     */
    public function findAll()
    {
        return Plan::all();
    }

    /**
     * @param $id
     * @return false|Plan
     */
    public function findOneById($id)
    {
        // TODO: Implement findOneById() method.
    }

    /**
     * @param Plan $plan
     * @return bool
     */
    public function create(Plan $plan)
    {
        // TODO: Implement create() method.
    }

    /**
     * @param Plan $plan
     * @return bool
     */
    public function update(Plan $plan)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param Plan $plan
     * @return bool
     */
    public function destroy(Plan $plan)
    {
        // TODO: Implement destroy() method.
    }
}
