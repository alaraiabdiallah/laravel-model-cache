# Laravel Model Cache

This package is simple way to cache model query to collection.

## Installation
```
composer require "alaraiabdiallah/laravel-model-cache":"dev-master"
```

## Example
You required to make scope Cache Query for register query to cache. This example it will select all data from user model then cache it  
```php
<?php

namespace App;

use ModelCache\Contract as CacheContract;
use ModelCache\Cacheable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements CacheContract
{
    use Notifiable,Cacheable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeCacheQuery($query)
    {
        return $query->get();
    }
}
```
