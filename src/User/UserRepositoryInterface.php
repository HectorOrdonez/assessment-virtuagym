<?php
namespace Virtuagym\User;

use Virtuagym\User\Entity\User;
use Virtuagym\User\Entity\UserCollection;

interface UserRepositoryInterface {
    /**
     * @return UserCollection|User[]
     */
    public function findAll();

    /**
     * @param $id
     * @return false|User
     */
    public function findOneById($id);

    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user);

    /**
     * @param User $user
     * @return bool
     */
    public function update(User $user);

    /**
     * @param User $user
     * @return bool
     */
    public function destroy(User $user);
}