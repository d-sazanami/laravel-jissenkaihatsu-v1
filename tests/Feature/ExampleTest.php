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
        $list = [];
        for ($i=0; $i < 10; $i++) { 
            $p1 = Person::factory()->create();
            $p2 = Person::factory()->nameUpper()->create();
            $p3 = Person::factory()->nameLower()->create();
            $p4 = Person::factory()->nameUpper()->nameLower()->create();
            $list = array_merge($list, [$p1->id, $p2->id, $p3->id, $p4->id]);
        }

        for ($i=0; $i < 10; $i++) { 
            shuffle($list);
            $item = array_shift($list);
            $person = Person::find($item);
            $data = $person->toArray();
            print_r($data);

            $this->assertDatabaseHas('people', $data);

            $person->delete();
            $this->assertDatabaseMissing('people', $data);
        }
    }
}
