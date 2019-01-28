<?php

declare(strict_types=1);

namespace pxgamer\Vinex;

use pxgamer\Vinex\Adapter\HttpAdapter;
use pxgamer\Vinex\Api\Account;
use pxgamer\Vinex\Api\Basic;
use pxgamer\Vinex\Api\General;

/**
 * @link https://vinex.network VINEX Exchange
 * @link https://docs.vinex.network VINEX API Documentation
 */
class Vinex
{
    /** @var HttpAdapter */
    protected $adapter;

    public function __construct(HttpAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function account(): Account
    {
        return new Account($this->adapter);
    }

    public function basic(): Basic
    {
        return new Basic($this->adapter);
    }

    public function general(): General
    {
        return new General($this->adapter);
    }
}
