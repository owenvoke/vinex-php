<?php

declare(strict_types=1);

namespace pxgamer\Vinex;

use pxgamer\Vinex\Adapter\HttpAdapter;
use pxgamer\Vinex\Api\Basic;

class Vinex
{
    /** @var HttpAdapter */
    protected $adapter;

    public function __construct(HttpAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function basic(): Basic
    {
        return new Basic($this->adapter);
    }
}
