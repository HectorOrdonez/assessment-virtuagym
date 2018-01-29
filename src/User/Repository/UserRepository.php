<?php
namespace Virtuagym\User\Repository;

use Virtuagym\Plan\Entity\Plan;
use Virtuagym\User\Entity\User;
use Virtuagym\User\Entity\UserCollection;
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
    public function update(User $user, $firstName, $lastName, $email)
    {
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->email = $email;
        $user->save();

        return true;
    }

    /**
     * @inheritdoc
     */
    public function destroy($userId)
    {
        $this->findOneById($userId)->delete();

        return true;
    }

    /**
     * @inheritdoc
     */
    public function findOneById($id)
    {
        return User::findOrFail($id);
    }

    /**
     * @param Plan $plan
     * @return UserCollection
     */
    public function findAvailableForPlan(Plan $plan)
    {
        $userIds = array_map(function ($user) {
            return $user['id'];
        }, $plan->users()->get()->toArray());

        return User::whereNotIn('id', $userIds)->get();
    }
}
