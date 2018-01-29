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

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
        ];
    }

    public function newCollection(array $models = [])
    {
        return new PlanCollection($models);
    }
}
