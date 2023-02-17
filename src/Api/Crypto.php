<?php namespace Alpaca\Market\Api;

use Alpaca\Market\Alpaca;

class Crypto
{
    /**
     * @var \Alpaca\Market\Alpaca
     */
    protected $alpaca;

    /**
     * Construct
     */
    public function __construct(Alpaca $alpaca)
    {
        $this->alpaca = $alpaca;
    }

    /**
     * The Bars API returns aggregate historical data for the requested security over a specified time period.
     * 
     * @param JSON $params
     * 
     * @return array
     */
    public function historicalBars($params)
    {
        return $this->alpaca->request('crypto_bars', $params)->contents();
    }

}