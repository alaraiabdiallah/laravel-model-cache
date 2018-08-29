<?php

namespace ModelCache;

use Cache;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
trait Cacheable
{
    public function scopeCached($query)
    {
        $minutes = isset($this->cache_time) ? $this->cache_time : 3;
        $cache = Cache::remember($this->table, $minutes, function () {
            return self::cacheQuery();
        });

        return $cache;
    }

    public function scopeCachedPaginate($query, $per_page = 25)
    {
        $request = new Request;
        $cache = $query->cached();
        $page = $request->input('page', 1);
        $perPage = $per_page;
        return new LengthAwarePaginator(
            $cache->forPage($page, $perPage),
            $cache->count(),
            $perPage,
            $page
        );
    }
}