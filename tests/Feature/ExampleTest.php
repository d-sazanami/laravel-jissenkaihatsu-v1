<?php

namespace Tests\Feature;

use App\MyClasses\PowerMyservice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Mockery\MockInterface;
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
        $msg = '*** OK ***';
        $this->instance(
            PowerMyservice::class,
            Mockery::mock(PowerMyservice::class, function (MockInterface $mock) use ($msg) {
                $mock->shouldReceive('setId')
                    ->withArgs([1])
                    ->once()
                    ->andReturn(null);
                $mock->shouldReceive('say')
                    ->once()
                    ->andReturn($msg);
            })
        );

        $response = $this->get('/hello');
        $content = $response->getContent();
        $response->assertSeeText(
            $msg,
            $content
        );
    }
}
