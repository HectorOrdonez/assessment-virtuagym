<?php
namespace Virtuagym\Plan;

use Virtuagym\Plan\Entity\Exercise;
use Virtuagym\Plan\Entity\ExerciseCollection;
use Virtuagym\Plan\Entity\PlanDay;

interface ExerciseRepositoryInterface {
    /**
     * @return ExerciseCollection|Exercise[]
     */
    public function findAll();

    /**
     * @param $id
     * @return false|Exercise
     */
    public function findOneById($id);

    /**
     * @param PlanDay $planDay
     * @param $name
     * @return Exercise
     */
    public function create(PlanDay $planDay, $name);

    /**
     * @param Exercise $exercise
     * @param array $params
     * @return bool
     */
    public function update(Exercise $exercise, array $params);

    /**
     * @param int $exerciseId
     * @return bool
     */
    public function destroy($exerciseId);
}
