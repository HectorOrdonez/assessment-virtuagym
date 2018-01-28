<?php
namespace Virtuagym\User\Entity;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package Virtuagym\User\Entity
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends Model implements Arrayable
{
    private $id;

    private $name;

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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function newCollection(array $models = [])
    {
        return new UserCollection($models);
    }
}
