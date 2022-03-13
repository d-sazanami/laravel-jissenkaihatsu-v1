<?php

namespace Tests\Feature;

use App\Jobs\MyJob;
use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Bus;
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
        $id = 1;
        $data = [
            'id' => $id,
            'name' => 'DUMMY',
            'mail' => 'dummy@mail',
            'age' => 0,
        ];
        $person = new Person();
        $person->fill($data)->save();
        $this->assertDatabaseHas('people', $data);

        Bus::fake();
        Bus::assertNotDispatched(MyJob::class);
        MyJob::dispatch($id);
        Bus::assertDispatched(function (Myjob $job) use ($id) {
            $p = Person::find($id)->first();
            return $job->getPersonId() == $p->id;
        });
    }
}
