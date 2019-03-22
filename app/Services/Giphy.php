<?php
/**
 * Created by PhpStorm.
 * User: bryan
 * Date: 2019-03-20
 * Time: 13:36
 */

namespace App\Services;

use GPH\Api\DefaultApi;
use GPH\Model\InlineResponse200;
use GPH\Model\InlineResponse2002;
use Illuminate\Cache\Repository;

class Giphy
{
    private $api;
    private $key;
    private $cache;
    private $ttl = 60 * 60;
    private $bypassCache = false;

    public function __construct(DefaultApi $api, Repository $cache, string $key)
    {
        $this->api   = $api;
        $this->cache = $cache;
        $this->key   = $key;
    }

    public function getTtl(): int
    {
        return $this->ttl;
    }


    public function setTtl(int $ttl): self
    {
        $this->ttl = $ttl;
        return $this;
    }

    public function shouldBypassCache(): bool
    {
        return $this->bypassCache;
    }

    public function setBypassCache(bool $bypassCache): self
    {
        $this->bypassCache = $bypassCache;
        return $this;
    }

    public function popular(int $limit = null, string $rating = null, string $format = null): InlineResponse200
    {
        $key = 'giphy.popular.' . implode('.', func_get_args());

        if (!$this->bypassCache && $this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $results = $this->api->gifsTrendingGet($this->key, $limit, $rating, $format);

        $this->cache->put($key, $results, $this->ttl);

        return $results;
    }

    public function random(string $tag = null, string $rating = null, string $format = null): InlineResponse2002
    {
        return $this->api->gifsRandomGet($this->key, $tag, $rating, $format);
    }

    public function search(string $search, int $limit = null, int $offset = null, string $rating = null, string $lang = null, string $format = null): InlineResponse200
    {
        $key = 'giphy.search.' . implode('.', func_get_args());

        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $results = $this->api->gifsSearchGet($this->key, $search, $limit, $offset, $rating, $lang, $format);

        $this->cache->put($key, $results, $this->ttl);

        return $results;
    }
}