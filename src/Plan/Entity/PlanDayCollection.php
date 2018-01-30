<?php
namespace Virtuagym\Plan\Entity;

use Illuminate\Database\Eloquent\Collection;

class PlanDayCollection extends Collection
{
    /**
     * @var PlanDay[]
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
