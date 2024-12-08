<?php

namespace Test\Clarkeash\LaravelHttpStats\Unit;

use PHPUnit\Framework\Assert;
use Illuminate\Support\Facades\Http;
use Clarkeash\LaravelHttpStats\Stats;
use PHPUnit\Framework\Attributes\Test;
use Test\Clarkeash\LaravelHttpStats\TestCase;

class FrameworkTest extends TestCase
{
    #[Test]
    public function it_adds_stats()
    {
        /*
         * I would like to fake the request but cant
         * find how to mock transfer stats.
         */
        // Http::fake();

        $response = Http::get('http://example.com');

        Assert::assertInstanceOf(Stats::class, $response->stats());
    }
}