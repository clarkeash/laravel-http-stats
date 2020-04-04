<?php

namespace Test\Clarkeash\LaravelHttpStats;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\TransferStats;
use GuzzleHttp\Psr7\Response;
use Clarkeash\LaravelHttpStats\Providers\ServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @var TransferStats $base
     */
    protected $base;

    protected function setUp(): void
    {
        parent::setUp();

        $this->base = new TransferStats(new Request('GET', 'http://example.com'), new Response(200), 0.121626, null, [
            "appconnect_time_us" => 57064,
            "connect_time_us" => 27572,
            "namelookup_time_us" => 14969,
            "pretransfer_time_us" => 58099,
            "redirect_time_us" => 123456,
            "starttransfer_time_us" => 109219,
            "total_time_us" => 121626,
        ]);
    }

    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }
}