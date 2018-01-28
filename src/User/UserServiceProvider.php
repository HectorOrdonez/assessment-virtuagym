<?php
namespace Virtuagym\User;

use Illuminate\Support\ServiceProvider;
use Virtuagym\User\Repository\UserRepository;

class UserServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, function () {
            return new UserRepository();
        });
    }
}
