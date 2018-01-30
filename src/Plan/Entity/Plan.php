<?php
namespace Virtuagym\Plan\Entity;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;
use Virtuagym\User\Entity\User;

/**
 * Class Plan
 */
class Plan extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function days()
    {
        return $this->hasMany(PlanDay::class);
    }

    public function newCollection(array $models = [])
    {
        return new PlanCollection($models);
    }
}
