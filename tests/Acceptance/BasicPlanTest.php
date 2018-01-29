<?php

namespace Tests\Acceptance;

use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Virtuagym\Plan\Entity\Plan;

class BasicPlanTest extends TestCase
{
    use InteractsWithDatabase;

    public function testCannotStoreNewPlanIfNameIsTooShort()
    {
        $name = 'q';

        $response = $this->post('/plans', [
            'name' => $name
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors('name');
    }

    public function testCanStoreNewPlan()
    {
        $this->disableExceptionHandling();

        $name = 'New plan name';

        $response = $this->post('/plans', [
            'name' => $name
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertDatabaseHas('plans', ['name' => $name]);
    }

    public function testCanUpdatePlan()
    {
        $newName = 'my fancy plan to lose weight in n-1 days';

        $response = $this->put('/plans', ['name' => $newName]);

        // assertions
    }

    public function testCanSeePlan()
    {
        $planId = 1;

        $response = $this->get('/plans/' . $planId);

        // assertions
    }

    public function testCanDestroyPlan()
    {
        $planId = Plan::first()->id;

        $response = $this->delete('/plans/' . $planId);

        // assertions
        $this->assertDatabaseMissing('plans', ['id' => $planId]);
    }

    public function testCannotDestroyPlanThatDoesNotExist()
    {
        $planId = 123457;

        $response = $this->delete('/plans/' . $planId);

        // assertions
        $response->assertStatus(404);
        $this->assertDatabaseMissing('plans', ['id' => $planId]);
    }
}
