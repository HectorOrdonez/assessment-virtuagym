<?php
namespace Virtuagym\Plan\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PlanDay
 */
class PlanDay extends Model
{
    protected $fillable = ['name'];

    public function plan()
    {
        return $this->hasOne(Plan::class);
    }

    public function newCollection(array $models = [])
    {
        return new PlanDayCollection($models);
    }
}
