<?php

namespace Clarkeash\LaravelHttpStats\Providers;

use Illuminate\Http\Client\Response;
use Clarkeash\LaravelHttpStats\Stats;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        Response::macro('stats', function () {
            return new Stats($this->transferStats);
        });
    }
}