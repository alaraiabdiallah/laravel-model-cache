<?php

namespace ModelCache;

interface Contract
{
    public function scopeCacheQuery($query);
    public function scopeCached($query);
    public function scopeCachedPaginate($query, $per_page);
}