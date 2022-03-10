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
        $this->get('/')->assertStatus(200);

        $this->get('/hello')->assertOK();
        // $this->post('/hello')->assertOK();
        // $this->get('/hello/1')->assertOK();
        $this->get('/hoge')->assertStatus(404);

        $this->get('/hello')->assertSeeText('Index');
        //$this->get('/hello')->assertSee('<h1>');
        // $this->get('/hello')->assertSeeInOrder(['<html', '<head', '<body', '<h1>']);

        //$this->get('/hello/json/1')->assertSeeText('博麗霊夢');
        /*
        $this->get('/hello/json/2')->assertExactJson(
            [
                'id'=> 2,
                'name' => '霧雨魔理沙',
                'mail' => 'marisa@kirisame.jp',
                'created_at' => null,
                'updated_at' => null,
                'age' => '16'
            ]
        );
        */
    }
}
