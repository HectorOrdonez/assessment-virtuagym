<?php
namespace Virtuagym\Plan;


use Virtuagym\Plan\Entity\Plan;
use Virtuagym\Plan\Entity\PlanCollection;

interface PlanRepositoryInterface {
    /**
     * @return PlanCollection|Plan[]
     */
    public function findAll();

    /**
     * @param $id
     * @return false|Plan
     */
    public function findOneById($id);

    /**
     * @param $name
     * @return Plan
     */
    public function create($name);

    /**
     * @param Plan $plan
     * @param array $params
     * @return bool
     */
    public function update(Plan $plan, array $params);

    /**
     * @param int $planId
     * @return bool
     */
    public function destroy($planId);
}
