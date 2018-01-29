<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use Virtuagym\User\UserRepositoryInterface;

class UserController extends Controller
{
    const USER_CREATED = 'User %s created successfully';
    const USER_DESTROYED = 'User %s destroyed successfully';

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

    public function destroy(UserRepositoryInterface $userRepository, $id)
    {
        $userRepository->destroy($id);

        return redirect()
            ->route('home')
            ->with('flash_message', self::USER_DESTROYED);
    }
}
