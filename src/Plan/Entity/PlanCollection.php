<?php
namespace Virtuagym\Plan\Entity;

use Illuminate\Database\Eloquent\Collection;

class PlanCollection extends Collection
{
    /**
     * @var Plan[]
     */
    protected $items;
    
    public function toArray()
    {
        $array = [];
        
        foreach($this->items as $item)
        {
            $array[] = $item->toArray();
        }
        
        return $array;
    }
}
