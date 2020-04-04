<?php

namespace Test\Clarkeash\LaravelHttpStats\Unit;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\TransferStats;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Assert;
use Clarkeash\LaravelHttpStats\Stats;
use Test\Clarkeash\LaravelHttpStats\TestCase;

class StatsTest extends TestCase
{
    /**
     * @var Stats $stats
     */
    protected $stats;

    protected function setUp(): void
    {
        parent::setUp();
        $this->stats = new Stats($this->base);
    }

    /**
     * @test
     */
    public function it_gets_the_lookup_time()
    {
        Assert::assertEquals(15, $this->stats->lookup());
    }

    /**
     * @test
     */
    public function it_gets_the_connect_time()
    {
        Assert::assertEquals(28, $this->stats->connect());
    }

    /**
     * @test
     */
    public function it_gets_the_ssl_handshake_time()
    {
        Assert::assertEquals(57, $this->stats->ssl());
    }

    /**
     * @test
     */
    public function it_gets_the_pretransfer_time()
    {
        Assert::assertEquals(58, $this->stats->pretransfer());
    }

    /**
     * @test
     */
    public function it_gets_the_redirect_time()
    {
        Assert::assertEquals(123, $this->stats->redirect());
    }

    /**
     * @test
     */
    public function it_gets_the_time_to_first_byte()
    {
        Assert::assertEquals(109, $this->stats->ttfb());
    }

    /**
     * @test
     */
    public function it_gets_the_total_time()
    {
        Assert::assertEquals(122, $this->stats->total());
    }
}