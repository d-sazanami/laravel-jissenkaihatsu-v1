<?php

namespace Tests\Feature;

use App\Events\PersonEvent;
use App\Jobs\MyJob;
use App\Listeners\PersonEventListener;
use App\Models\Person;
use Illuminate\Support\Facades\Queue;
use Illuminate\Events\CallQueuedListener;
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

        Queue::fake();
        Queue::assertNothingPushed();

        MyJob::dispatch($person->id)->onQueue('myjob');
        Queue::assertPushedOn('myjob', MyJob::class);

    }
}
