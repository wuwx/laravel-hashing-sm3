<?php
namespace Wuwx\LaravelHashingSm3;

use Illuminate\Support\ServiceProvider;

class Sm3ServiceProvider extends ServiceProvider
{
    public function boot()
    {
        app('hash')->extend('sm3', function () {
            return new Sm3Hasher();
        });
    }
}