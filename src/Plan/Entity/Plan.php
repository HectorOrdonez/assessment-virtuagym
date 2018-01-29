<?php
namespace Virtuagym\Plan\Entity;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Plan
 * @package Virtuagym\Plan\Entity
 * @ORM\Entity
 * @ORM\Table(name="plans")
 */
class Plan extends Model implements Arrayable
{
    protected $fillable = ['name'];

    public function newCollection(array $models = [])
    {
        return new PlanCollection($models);
    }
}
