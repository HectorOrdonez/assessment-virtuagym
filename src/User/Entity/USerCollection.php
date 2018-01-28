<?php
namespace Virtuagym\User\Entity;

use Illuminate\Database\Eloquent\Collection;

class UserCollection extends Collection
{
    /**
     * @var User[]
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
