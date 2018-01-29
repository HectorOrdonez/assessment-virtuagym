<?php
namespace Virtuagym\User\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 */
class User extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email'];

    public function newCollection(array $models = [])
    {
        return new UserCollection($models);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
