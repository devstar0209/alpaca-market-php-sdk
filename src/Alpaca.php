<?php namespace Alpaca\Market;

use Alpaca\Market\Api\Stocks;
use Alpaca\Market\Api\Crypto;
use Alpaca\Market\Request;

class Alpaca
{

    /**
     * API key
     *
     * @var string
     */
    private $key;

    /**
     * API secret
     *
     * @var string
     */
    private $secret;
    
    /**
     * Use paper account (true/false)
     *
     * @var bool
     */
    private $paper;

    /**
     * API Paper Path
     *
     * @var array
     */
    private $apiPaperPath = 'https://data.sandbox.alpaca.markets/';

    /**
     * API Real Path
     *
     * @var array
     */
    private $apiPath = 'https://data.alpaca.markets/';

    /**
     * API Paths
     *
     * @var array
     */
    private $paths = [
        "stocks_bars"     => "v2/stocks/{symbol}/bars",
        "crypto_bars"     => "v1beta2/crypto/bars",
    ];

    /**
     * @var \Alpaca\Market\Api\Stocks
     */
    public $stocks;

    /**
     * @var \Alpaca\Market\Api\Crypto
     */
    public $crypto;


    /**
     * Set Alpaca 
     *
     */
    public function __construct($key, $secret, $paper = false)
    {
        $this->setAuthKeys($key, $secret);

        $this->paper = $paper;

        $this->crypto = (new Crypto($this));
        $this->stocks = (new Stocks($this));
    }

    /**
     * setKey()
     *
     * @return self
     */
    public function setAuthKeys($key, $secret)
    {
        $this->key = $key;

        $this->secret = $secret;

        return $this;
    }

    /**
     * getAuthKeys()
     *
     * @return array
     */
    public function getAuthKeys()
    {
        return [$this->key, $this->secret];
    }

    /**
     * getRoot()
     *
     * @return string
     */
    public function getRoot()
    {
        if ($this->paper===true) {
            return $this->apiPaperPath;
        }

        return $this->apiPath;
    }

    /**
     * getPath()
     *
     * @return string
     */
    public function getPath($handle)
    {
        return $this->paths[$handle] ?? false;
    }
    
    /**
     * request()
     *
     * @return \Alpaca\Response
     */
    public function request($handle, $params = [], $pathParams = [])
    {
        return (new Request($this))->send($handle, $params, $pathParams);
    }
}
