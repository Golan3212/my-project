<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserIndex():void
    {
        $response = $this->get('/user');

        $response->assertStatus(200);
    }

    public function testFeedbackCreate():void
    {
        $response = $this->get('/user/feedback/create');
        $response->assertStatus(200);
    }

    public function testFeedbackStore():void
    {
        $data = [
            'author'=> \fake()->userName(),
            'comment'=> \fake()->text(100)
        ];
        $response = $this->post(route('user.feedback.store'), $data);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'author',
            'comment'
        ]);
    }

    public function testDownloadCreate():void
    {
        $response = $this->get('/user/download/create');
        $response->assertStatus(200);
    }

    public function testDownloadStore():void
    {
        $data = [
            'username'=>\fake()->userName(),
            'phone'=> \fake()->e164PhoneNumber(),
            'email'=>\fake()->email(),
            'wishInfo'=> \fake()->text(100)
        ];
        $response = $this->post(route('user.download.store'), $data);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'username',
            'phone',
            'email',
            'wishInfo'
        ]);
    }
}
