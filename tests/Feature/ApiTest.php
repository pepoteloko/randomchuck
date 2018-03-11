<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/api/v1/chuck');

        $response->assertStatus(200);
    }

    public function testErrorTest()
    {
        $response = $this->post('/api/v1/chuck', [
            'email'    => 'falso',
            'password' => 'erroneo',
        ]);

        $response->assertStatus(400);
    }

    public function testErrorLogin()
    {
        $response = $this->post('/api/v1/chuck', [
            'email'    => 'chuck@norris.com',
            'password' => 'erroneo',
            'title'    => 'erroneo',
            'phrase'   => 'erroneo',
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     "result" => "false",
                 ]);
    }
}
