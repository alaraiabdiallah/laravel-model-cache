<?php

namespace ModelCache\Interfaces;

interface CacheInterface
{
    public function scopeCacheQuery($query);
    public function scopeCached($query);
    public function scopeCachedPaginate($query, $per_page);
}