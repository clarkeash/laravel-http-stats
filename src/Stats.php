<?php

namespace Clarkeash\LaravelHttpStats;

use GuzzleHttp\TransferStats;

class Stats
{
    /**
     * @var TransferStats
     */
    protected $transferStats;

    public function __construct(TransferStats $transferStats)
    {
        $this->transferStats = $transferStats;
    }

    /**
     * DNS lookup time in ms.
     *
     * @return int
     */
    public function lookup(): int
    {
        return round($this->transferStats->getHandlerStat('namelookup_time_us') / 1000);
    }

    /**
     * TCP connection time in ms.
     *
     * @return int
     */
    public function connect(): int
    {
        return round($this->transferStats->getHandlerStat('connect_time_us') / 1000);
    }

    /**
     * SSL handshake time in ms.
     *
     * @return int
     */
    public function ssl(): int
    {
        return round($this->transferStats->getHandlerStat('appconnect_time_us') / 1000);
    }

    /**
     * Negotiation time in ms.
     *
     * @return int
     */
    public function pretransfer(): int
    {
        return round($this->transferStats->getHandlerStat('pretransfer_time_us') / 1000);
    }

    /**
     * Redirect time in ms.
     *
     * @return int
     */
    public function redirect(): int
    {
        return round($this->transferStats->getHandlerStat('redirect_time_us') / 1000);
    }

    /**
     * Time to first byte in ms.
     *
     * @return int
     */
    public function ttfb(): int
    {
        return round($this->transferStats->getHandlerStat('starttransfer_time_us') / 1000);
    }

    /**
     * Total time in ms.
     *
     * @return int
     */
    public function total(): int
    {
        return round($this->transferStats->getHandlerStat('total_time_us') / 1000);
    }
}