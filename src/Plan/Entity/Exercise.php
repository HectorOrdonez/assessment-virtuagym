<?php
namespace Virtuagym\Plan\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Exercise
 */
class Exercise extends Model
{
    protected $fillable = ['name'];

    public function day()
    {
        return $this->hasOne(PlanDay::class);
    }

    public function newCollection(array $models = [])
    {
        return new ExerciseCollection($models);
    }
}
