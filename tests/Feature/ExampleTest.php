<?php

namespace Tests\Feature;

use App\Events\PersonEvent;
use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testBasicTest()
    {
        Person::factory()->create();
        $person = Person::factory()->create();

        Event::fake();
        $this->get('/hello/' . $person->id)->assertOk();
        Event::assertDispatched(PersonEvent::class);
    }
}
