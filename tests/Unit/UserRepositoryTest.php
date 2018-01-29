<?php

namespace Tests\Unit;

use Tests\TestCase;
use Virtuagym\User\Entity\UserCollection;
use Virtuagym\User\UserRepositoryInterface;
use Virtuagym\User\Repository\UserRepository;

class UserRepositoyTest extends TestCase
{
    /**
     * @var UserRepositoryInterface
     */
    private $repo;

    public function setUp()
    {
        parent::setUp();

        $this->repo = $this->app->make(UserRepositoryInterface::class);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRepoCanBeInstantiatedFromContainer()
    {
        $repo = $this->app->make(UserRepositoryInterface::class);

        $this->assertInstanceOf(UserRepository::class, $repo);
    }

    public function testFindAllReturnsCurrentUsers()
    {
        $users = $this->repo->findAll();

        $this->assertInstanceOf(UserCollection::class, $users);
    }

    public function testCanCreateUser()
    {
        $name = 'jimmy';
        $lastName = 'raynor';
        $email = 'jim@hyperion.com';

        $user = $this->repo->create($name, $lastName, $email);

        $this->assertEquals($name, $user->first_name);
        $this->assertEquals($lastName, $user->last_name);
        $this->assertEquals($email, $user->email);
    }
}
