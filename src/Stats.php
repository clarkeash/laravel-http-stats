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
     * @param float $value
     * @param bool $milli
     * @return int
     */
    protected function microOrMilli(float $value, bool $milli): int
    {
        return $milli ? round($value / 1000) : round($value);
    }

    /**
     * DNS lookup time in ms.
     *
     * @param bool $milli
     * @return int
     */
    public function lookup(bool $milli = true): int
    {
        return $this->microOrMilli($this->transferStats->getHandlerStat('namelookup_time_us'), $milli);
    }

    /**
     * TCP connection time in ms.
     *
     * @return int
     */
    public function connect(bool $milli = true): int
    {
        return $this->microOrMilli($this->transferStats->getHandlerStat('connect_time_us'), $milli);
    }

    /**
     * SSL handshake time in ms.
     *
     * @param bool $milli
     * @return int
     */
    public function ssl(bool $milli = true): int
    {
        return $this->microOrMilli($this->transferStats->getHandlerStat('appconnect_time_us'), $milli);
    }

    /**
     * Negotiation time in ms.
     *
     * @param bool $milli
     * @return int
     */
    public function pretransfer(bool $milli = true): int
    {
        return $this->microOrMilli($this->transferStats->getHandlerStat('pretransfer_time_us'), $milli);
    }

    /**
     * Redirect time in ms.
     *
     * @param bool $milli
     * @return int
     */
    public function redirect(bool $milli = true): int
    {
        return $this->microOrMilli($this->transferStats->getHandlerStat('redirect_time_us'), $milli);
    }

    /**
     * Time to first byte in ms.
     *
     * @param bool $milli
     * @return int
     */
    public function ttfb(bool $milli = true): int
    {
        return $this->microOrMilli($this->transferStats->getHandlerStat('starttransfer_time_us'), $milli);
    }

    /**
     * Total time in ms.
     *
     * @param bool $milli
     * @return int
     */
    public function total(bool $milli = true): int
    {
        return $this->microOrMilli($this->transferStats->getHandlerStat('total_time_us'), $milli);
    }
}