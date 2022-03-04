<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\UrlCheck;
use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UrlCheckControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testStore()
    {
        $url = Url::factory()->create();
        $data = UrlCheck::factory()
        ->for($url)
        ->make()
        ->only('title');

        $response = $this->post(route('url_checks.store', $url->id), $data);
        $response->assertRedirect(route('urls.show', $url->id));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('url_checks', $data);
    }
}