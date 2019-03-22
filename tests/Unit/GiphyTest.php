<?php

namespace Tests\Unit;

use App\Services\Giphy;
use GPH\Api\DefaultApi;
use GPH\Model\InlineResponse200;
use GPH\Model\InlineResponse2002;
use Illuminate\Cache\Repository;
use Mockery\Mock;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class GiphyTest extends TestCase
{
    /** @test */
    public function instantiation(): void
    {
        $giphyApi = \Mockery::mock(DefaultApi::class);
        $cache    = \Mockery::mock(Repository::class);
        $key      = 'test_key';

        $giphy = new Giphy($giphyApi, $cache, $key);

        $this->assertInstanceOf(Giphy::class, $giphy);
    }

    /** @test */
    public function popular(): void
    {
        $giphyApiResponse = \Mockery::mock(InlineResponse200::class);
        $key              = 'test_key';

        $giphyApi = \Mockery::mock(DefaultApi::class);
        $giphyApi->shouldReceive('gifsTrendingGet')
            ->withArgs([$key, null, null, null])
            ->andReturn($giphyApiResponse);

        $cache = \Mockery::mock(Repository::class);
        $cache->shouldReceive([
            'has' => false,
            'put' => $giphyApiResponse,
        ]);

        $giphy = new Giphy($giphyApi, $cache, $key);

        $results = $giphy->popular();

        $this->assertInstanceOf(InlineResponse200::class, $results);
    }

    /** @test */
    public function random(): void
    {
        $giphyApiResponse = \Mockery::mock(InlineResponse2002::class);
        $key              = 'test_key';

        $giphyApi = \Mockery::mock(DefaultApi::class);
        $giphyApi->shouldReceive('gifsRandomGet')
            ->withArgs([$key, null, null, null])
            ->andReturn($giphyApiResponse);

        $cache = \Mockery::mock(Repository::class);

        $giphy = new Giphy($giphyApi, $cache, $key);

        $results = $giphy->random();

        $this->assertInstanceOf(InlineResponse2002::class, $results);
    }

    /** @test */
    public function search(): void
    {
        $giphyApiResponse = \Mockery::mock(InlineResponse200::class);
        $key              = 'test_key';

        $giphyApi = \Mockery::mock(DefaultApi::class);
        $giphyApi->shouldReceive('gifsSearchGet')
            ->withArgs([$key, 'test', null, null, null, null,null])
            ->andReturn($giphyApiResponse);

        $cache = \Mockery::mock(Repository::class);
        $cache->shouldReceive([
            'has' => false,
            'put' => $giphyApiResponse,
        ]);

        $giphy = new Giphy($giphyApi, $cache, $key);

        $results = $giphy->search('test');

        $this->assertInstanceOf(InlineResponse200::class, $results);
    }
}