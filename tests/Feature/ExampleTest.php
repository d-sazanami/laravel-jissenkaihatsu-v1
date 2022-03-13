<?php

namespace Tests\Feature;

use App\Models\Person;
use Database\Seeders\PersonSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
        $count = 100;
        $persons = Person::factory()->count($count)->create();
        
        $person = Person::find(rand(1, $count));
        $data = $person->toArray();
        print_r($data);
        $this->assertDatabaseHas('people', $data);

        $person->delete();
        $this->assertDatabaseMissing('people', $data);
    }
}
