<?php

namespace Test\Clarkeash\LaravelHttpStats\Unit;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\TransferStats;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\Assert;
use Clarkeash\LaravelHttpStats\Stats;
use PHPUnit\Framework\Attributes\Test;
use Test\Clarkeash\LaravelHttpStats\TestCase;

class StatsTest extends TestCase
{
    /**
     * @var Stats $stats
     */
    protected Stats $stats;

    protected function setUp(): void
    {
        parent::setUp();
        $this->stats = new Stats($this->base);
    }

    #[Test]
    public function it_gets_the_lookup_time()
    {
        Assert::assertEquals(15, $this->stats->lookup());
        Assert::assertEquals(14969, $this->stats->lookup(false));
    }

    #[Test]
    public function it_gets_the_connect_time()
    {
        Assert::assertEquals(28, $this->stats->connect());
        Assert::assertEquals(27572, $this->stats->connect(false));
    }

    #[Test]
    public function it_gets_the_ssl_handshake_time()
    {
        Assert::assertEquals(57, $this->stats->ssl());
        Assert::assertEquals(57064, $this->stats->ssl(false));
    }

    #[Test]
    public function it_gets_the_pretransfer_time()
    {
        Assert::assertEquals(58, $this->stats->pretransfer());
        Assert::assertEquals(58099, $this->stats->pretransfer(false));
    }

    #[Test]
    public function it_gets_the_redirect_time()
    {
        Assert::assertEquals(123, $this->stats->redirect());
        Assert::assertEquals(123456, $this->stats->redirect(false));
    }

    #[Test]
    public function it_gets_the_time_to_first_byte()
    {
        Assert::assertEquals(109, $this->stats->ttfb());
        Assert::assertEquals(109219, $this->stats->ttfb(false));
    }

    #[Test]
    public function it_gets_the_total_time()
    {
        Assert::assertEquals(122, $this->stats->total());
        Assert::assertEquals(121626, $this->stats->total(false));
    }
}