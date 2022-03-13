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
        Event::assertNotDispatched(PersonEvent::class);
        event(new PersonEvent($person));
        Event::assertDispatched(PersonEvent::class);
        Event::assertDispatched(function (PersonEvent $event) use ($person) {
            return $event->person == $person;
        });
    }
}
