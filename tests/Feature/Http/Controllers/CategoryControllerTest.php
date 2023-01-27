<?php
declare(strict_types=1);
namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example():void
    {
        $response = $this->get('category/2/show');

        $response->assertStatus(200);
    }

    public function testHasFooter():void
    {
        $response = $this->get(route('news.category'));

        $response->assertSeeText('News site built for Geekbrains by Andrey Golanov');

    }


}
