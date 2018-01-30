<?php
namespace Virtuagym\Plan;

use Virtuagym\Plan\Entity\Plan;
use Virtuagym\Plan\Entity\PlanDay;
use Virtuagym\Plan\Entity\PlanDayCollection;

interface PlanDayRepositoryInterface {
    /**
     * @return PlanDayCollection|PlanDay[]
     */
    public function findAll();

    /**
     * @param $id
     * @return false|PlanDay
     */
    public function findOneById($id);

    /**
     * @param Plan $plan,
     * @param $name
     * @return PlanDay
     */
    public function create(Plan $plan, $name);

    /**
     * @param PlanDay $planDay
     * @param array $params
     * @return bool
     */
    public function update(PlanDay $planDay, array $params);

    /**
     * @param int $planDayId
     * @return bool
     */
    public function destroy($planDayId);
}
