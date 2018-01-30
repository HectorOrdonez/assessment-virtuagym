<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Virtuagym\User\UserRepositoryInterface;

class UserController extends Controller
{
    const USER_CREATED = 'User %s created successfully';
    const USER_UPDATED = 'User %s updated successfully';
    const USER_DESTROYED = 'User destroyed successfully';

    public function store(UserRepositoryInterface $userRepository, CreateUserRequest $request)
    {
        $user = $userRepository->create(
            $request->get('first_name'),
            $request->get('last_name'),
            $request->get('email')
        );

        return redirect()
            ->route('home')
            ->with('flash_message', sprintf(self::USER_CREATED, $user->full_name));
    }

    public function update(UserRepositoryInterface $userRepository, UpdateUserRequest $request, $userId)
    {
        $user = $userRepository->findOneById($userId);

        $userRepository->update(
            $user,
            $request->get('first_name'),
            $request->get('last_name'),
            $request->get('email')
        );

        return redirect()
            ->route('home')
            ->with('flash_message', sprintf(self::USER_UPDATED, $user->full_name));
    }

    public function destroy(UserRepositoryInterface $userRepository, $id)
    {
        $userRepository->destroy($id);

        return redirect()
            ->route('home')
            ->with('flash_message', self::USER_DESTROYED);
    }
}
