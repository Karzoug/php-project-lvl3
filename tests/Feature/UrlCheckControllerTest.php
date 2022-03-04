<?php

namespace Tests\Feature;
use Illuminate\Support\Facades\Http;

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
        Http::fake();

        $url = Url::factory()->create();

        $response = $this->post(route('url_checks.store', $url->id));
        $response->assertRedirect(route('urls.show', $url->id));
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('url_checks', [
            'url_id' => $url->id,
        ]);
    }
}