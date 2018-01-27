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
     * @param Plan $plan
     * @return bool
     */
    public function create(Plan $plan);

    /**
     * @param Plan $plan
     * @return bool
     */
    public function update(Plan $plan);

    /**
     * @param Plan $plan
     * @return bool
     */
    public function destroy(Plan $plan);
}
