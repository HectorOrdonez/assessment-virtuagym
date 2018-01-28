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
        // TODO: Implement findOneById() method.
    }

    /**
     * @inheritdoc
     */
    public function create(User $user)
    {
        // TODO: Implement create() method.
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
    public function destroy(User $user)
    {
        // TODO: Implement destroy() method.
    }
}
