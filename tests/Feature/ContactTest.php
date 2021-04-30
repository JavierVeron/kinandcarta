<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_all()
    {
        $response = $this->get('/api/all');
        $response->assertStatus(200);
    }

    public function test_view()
    {
        $response = $this->get('/api/view/1');
        $response->assertStatus(200);
        $response = $this->get('/api/view/1000');
        $response->assertStatus(200);
        $response = $this->get('/api/view/aa');
        $response->assertStatus(200);
    }

    public function test_search()
    {
        $response = $this->get('/api/search/1');
        $response->assertStatus(200);
        $response = $this->get('/api/search/1000');
        $response->assertStatus(200);
        $response = $this->get('/api/search/jeremy');
        $response->assertStatus(200);
    }

    public function test_getCities()
    {
        $response = $this->get('/api/getcities');
        $response->assertStatus(200);
    }

    public function test_getStates()
    {
        $response = $this->get('/api/getstates');
        $response->assertStatus(200);
    }

    public function test_getContacts()
    {
        $response = $this->get('/api/getcontacts/1');
        $response->assertStatus(200);
        $response = $this->get('/api/getcontacts/1000');
        $response->assertStatus(200);
        $response = $this->get('/api/getcontacts/Los Angeles');
        $response->assertStatus(200);
        $response = $this->get('/api/getcontacts/California');
        $response->assertStatus(200);
    }

    public function test_post()
    {
        $response = $this->post('/api/post', ["name" => "Javier Verón", "company" => "We Have Devs", "email" => "javier.veron@gmail.com"]);
        $response->assertStatus(201);
    }

    public function test_update()
    {
        $response = $this->put('/api/update/1', ["name" => "Javier Verón"]);
        $response->assertStatus(200);
        $response = $this->put('/api/update/1000', ["name" => "Javier Verón"]);
        $response->assertStatus(200);
        $response = $this->put('/api/update/aa', ["name" => "Javier Verón"]);
        $response->assertStatus(200);
    }

    public function test_delete()
    {
        $response = $this->delete('api/delete/1');
        $response->assertStatus(200);
        $response = $this->delete('/api/delete/1000');
        $response->assertStatus(200);
        $response = $this->delete('/api/delete/aa');
        $response->assertStatus(200);
    }
}
