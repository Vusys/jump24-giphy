<?php
/**
 * Created by PhpStorm.
 * User: bryan
 * Date: 2019-03-22
 * Time: 11:21
 */

namespace Tests\Feature;

use App\Services\Giphy;
use GPH\Model\InlineResponse2002;
use GPH\Model\RandomGif;
use Mockery\MockInterface;
use Tests\TestCase;

class PopulateRandomGifsTest extends TestCase
{
    public function provider_total_ints()
    {
        return [
            [1, 0],
            [5, 0],
            ['potato', 1],
        ];
    }

    /**
     * @test
     * @dataProvider provider_total_ints
     */
    public function total_must_be_int($total, int $exitCode)
    {
        $this->mock(Giphy::class, function (MockInterface $mock) {
            $response = \Mockery::mock(InlineResponse2002::class);

            $gif = \Mockery::mock(RandomGif::class);
            $gif->shouldReceive('getImageUrl')->andReturn('https://example.com/foobar.gif');
            $gif->shouldReceive('getId')->andReturn('abcd1234');

            $response->shouldReceive('getData')->andReturn($gif);

            $mock->shouldReceive('random')->andReturn($response);
        });

        $this->artisan("gifs:random {$total} 0")
            ->assertExitCode($exitCode);
    }

    public function provider_sleep_ints()
    {
        return [
            [1, 0],
            [5, 0],
            ['turnip', 1],
        ];
    }

    /**
     * @test
     * @dataProvider provider_sleep_ints
     */
    public function sleep_must_be_int($sleep, int $exitCode)
    {
        $this->mock(Giphy::class, function (MockInterface $mock) {
            $response = \Mockery::mock(InlineResponse2002::class);

            $gif = \Mockery::mock(RandomGif::class);
            $gif->shouldReceive('getImageUrl')->andReturn('https://example.com/foobar.gif');
            $gif->shouldReceive('getId')->andReturn('abcd1234');

            $response->shouldReceive('getData')->andReturn($gif);

            $mock->shouldReceive('random')->andReturn($response);
        });

        $this->artisan("gifs:random 1 {$sleep}")
            ->assertExitCode($exitCode);
    }
}