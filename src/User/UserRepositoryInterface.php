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
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @return User
     */
    public function create($firstName, $lastName, $email);

    /**
     * @param User $user
     * @return bool
     */
    public function update(User $user);

    /**
     * @param int $userId
     * @return bool
     */
    public function destroy($userId);
}
