<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_show_message_page()
    {
        $response = $this->get('/message');

        $response->assertStatus(200);
    }


    public function test_show_answer_page()
    {
        $response = $this->get('/answer');

        $response->assertStatus(200);
    }
}
