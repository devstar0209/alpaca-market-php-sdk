<?php namespace Alpaca\Market\Api;

use Alpaca\Market\Alpaca;

class Crypto
{
    /**
     * @var \Alpaca\Alpaca
     */
    protected $alpaca;

    /**
     * Construct
     */
    public function __construct(Alpaca $alpaca)
    {
        $this->alpaca = $alpaca;
    }

}