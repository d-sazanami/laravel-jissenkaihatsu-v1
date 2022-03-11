<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $data = [
            'id' => 1,
            'name' => 'Reimu Hakurei',
            'mail' => 'reimu@hakurei.com',
            'age' => '16'
        ];
        $this->assertDatabaseHas('people', $data);

        $this->assertDatabaseMissing('people', ['id' => 14]);
    }
}
