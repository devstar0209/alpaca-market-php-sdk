<?php namespace Alpaca\Market\Api;

use Alpaca\Market\Alpaca;

class Stocks
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
     * @param string $symbol
     * @param JSON $params
     * 
     * @return array
     */
    public function historicalBars($symbol, $params)
    {
        return $this->alpaca->request('stocks_bars', $params, ['symbol' => $symbol])->contents();
    }

    /**
     * The Bars API returns aggregate latest data for the requested security over a specified time period.
     * 
     * @param string $symbol
     * @param JSON $params
     * 
     * @return array
     */
    public function latestBars($params)
    {
        return $this->alpaca->request('stocks_latest_bars', $params)->contents();
    }

}