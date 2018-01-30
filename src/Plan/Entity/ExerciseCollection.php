<?php
namespace Virtuagym\Plan\Entity;

use Illuminate\Database\Eloquent\Collection;

class ExerciseCollection extends Collection
{
    /**
     * @var Exercise[]
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
