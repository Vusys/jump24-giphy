<?php

namespace Tests\Feature;

use App\Services\Giphy;
use GPH\Model\Gif;
use GPH\Model\InlineResponse200;
use Mockery\Mock;
use Mockery\MockInterface;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PagesTest extends TestCase
{
    /** @test */
    public function index(): void
    {
        $response = $this->get('/');

        $response->assertSee('Popular GIFs');
        $response->assertStatus(200);
    }

    /** @test */
    public function random(): void
    {
        $response = $this->get('/random');

        $response->assertSee('Random GIFs');
        $response->assertStatus(200);
    }

    /** @test */
    public function search_ajax(): void
    {
        $this->mock(Giphy::class, function (MockInterface $mock) {
            $response = \Mockery::mock(InlineResponse200::class);

            $gif = \Mockery::mock(Gif::class);
            $gif->shouldReceive('getImages->getPreviewGif->getUrl')
                ->andReturn('https://example.com/foobar.gif');

            $response->shouldReceive('getData')->andReturn([$gif]);

            $mock->shouldReceive('search')
                ->withArgs(['test'])
                ->andReturn($response);

            $mock->shouldReceive('setTtl')->andReturnSelf();
        });

        $response = $this->post('/search', [
            'search' => 'test',
        ]);

        $response->assertJsonCount(1);
        $response->assertJson([['preview' => 'https://example.com/foobar.gif']]);
        $response->assertStatus(200);
    }
}
