<?php
namespace Virtuagym\User\Repository;

use Virtuagym\User\Entity\User;
use Virtuagym\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function findAll()
    {

        return User::all();
    }

    /**
     * @inheritdoc
     */
    public function findOneById($id)
    {
        return User::find($id);
    }

    /**
     * @inheritdoc
     */
    public function create($firstName, $lastName, $email)
    {
        $user = new User();
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->email = $email;
        $user->save();

        return $user;
    }

    /**
     * @inheritdoc
     */
    public function update(User $user)
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritdoc
     */
    public function destroy($userId)
    {
        $this->findOneById($userId)->delete();

        return true;
    }
}
