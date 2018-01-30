<?php
namespace Virtuagym\Plan\Repository;

use Virtuagym\Plan\Entity\Exercise;
use Virtuagym\Plan\Entity\Plan;
use Virtuagym\Plan\Entity\PlanDay;
use Virtuagym\Plan\ExerciseRepositoryInterface;
use Virtuagym\Plan\PlanDayRepositoryInterface;

class ExerciseRepository implements ExerciseRepositoryInterface
{

    /**
     * @inheritdoc
     */
    public function findAll()
    {
        return Exercise::all();
    }

    /**
     * @inheritdoc
     */
    public function findOneById($id)
    {
        return Exercise::findOrFail($id);
    }

    /**
     * @inheritdoc
     */
    public function create(PlanDay $planDay, $name)
    {
        $exercise = new Exercise();
        $exercise->plan_day_id = $planDay->id;
        $exercise->name = $name;
        $exercise->save();

        return $exercise;
    }

    /**
     * @inheritdoc
     */
    public function update(Exercise $exercise, array $params)
    {
        if(isset($params['name']))
        {
            $exercise->name = $params['name'];
        }

        $exercise->save();

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
