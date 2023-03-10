<?php
declare(strict_types=1);
namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus():void
    {
        $response = $this->get('admin');

        $response->assertStatus(200);
    }

    public function testCreateSuccessStatus():void
    {
        $response = $this->get('admin/news/create');

        $response->assertStatus(200);
    }

    public function testSaveSuccessDataJson():void
    {
        $data = [
            'title'=>\fake()->jobTitle(),
            'author'=> \fake()->userName(),
            'description'=> \fake()->text(100)
        ];
        $response = $this->post(route('admin.news.store'), $data);
        $response->assertJson($data);
    }

    public function testCreateSaveSuccessData (): void
    {
        $news = News::factory()->create();

        $response = $this->post(route('admin.news.store'), $news);
        $response->assertRedirect(route('admin.news.index'));
    }
}
