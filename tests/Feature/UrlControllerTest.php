<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticleControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
        Url::factory()->count(2)->create();
    }

    public function testIndex()
    {
        $response = $this->get(route('urls.index'));
        $response->assertOk();
        $response->assertViewHas('urls', Url::all());
    }

    public function testCreate()
    {
        $response = $this->get(route('urls.create'));
        $response->assertOk();
    }

    public function testStore()
    {
        $data = Url::factory()->make()->only('name');
        $response = $this->post(route('urls.store'), $data);
        $response->assertRedirect(route('urls.index'));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('urls', $data);
    }

    public function testShow()
    {
        $response = $this->get(route('urls.show', Url::query()->first()->id));
        $response->assertOk();
    }
}