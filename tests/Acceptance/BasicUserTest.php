<?php

namespace Tests\Acceptance;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicUserTest extends TestCase
{
    public function testCanStoreNewUser()
    {
        $response = $this->post('/users');

        // assertions
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
        $planId = 1;

        $response = $this->delete('/users/' . $planId);

        // assertions
    }

}
