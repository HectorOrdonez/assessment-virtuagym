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
        $newName = 'Jimmy';

        $response = $this->put('/users', ['name' => $newName]);

        // assertions
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

}
