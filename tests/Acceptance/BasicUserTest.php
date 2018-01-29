<?php

namespace Tests\Acceptance;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Virtuagym\User\Entity\User;

class BasicUserTest extends TestCase
{
    public function testCanStoreNewUser()
    {
        $firstName = 'Abraham';
        $lastName = 'Lincoln';
        $email = 'abraham@lincoln.com';

        $response = $this->post('/users', [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
        ]);

        // assertions
        $response->assertRedirect('/');
        $response->assertStatus(302);
        $this->assertDatabaseHas('users', ['first_name' => $firstName]);
    }

    public function testCanUpdateUser()
    {
        $this->disableExceptionHandling();

        $user = User::first();
        $firstName = 'NewestUser';
        $lastName = 'InTown';
        $email = 'ohlala@whoami.com';

        $response = $this->put('/users/' . $user->id, [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
        ]);

        // assertions
        $response->assertRedirect('/');
        $response->assertStatus(302);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'first_name' => $firstName
        ]);
    }

    public function testCanSeeUser()
    {
        $planId = 1;

        $response = $this->get('/users/' . $planId);

        // assertions
    }

    public function testCanDestroyUser()
    {
        $userId = User::first()->id;

        $response = $this->delete('/users/' . $userId);

        // assertions
        $this->assertDatabaseMissing('users', ['id' => $userId]);
    }

    public function testCannotDestroyUserThatDoesNotExist()
    {
        $userId = 123457;

        $response = $this->delete('/users/' . $userId);

        // assertions
        $response->assertStatus(404);
        $this->assertDatabaseMissing('users', ['id' => $userId]);
    }
}
