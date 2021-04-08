<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_show_admin_page()
    {
        $response = $this->get('/admin/news');

        $response->assertStatus(200);
    }

    public function test_show_admin_create()
    {
        $response = $this->get('/admin/news/create');

        $response->assertStatus(200);
    }

    public function test_show_admin_category()
    {
        $response = $this->get('/admin/category');

        $response->assertStatus(200);
    }

    public function test_show_admin_unloading()
    {
        $response = $this->get('/admin/unloading');

        $response->assertStatus(200);
    }
}
