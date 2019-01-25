<?php

declare(strict_types=1);

namespace pxgamer\Vinex;

use pxgamer\Vinex\Adapter\HttpAdapter;

class Vinex
{
    /** @var HttpAdapter */
    protected $adapter;

    public function __construct(HttpAdapter $adapter)
    {
        $this->adapter = $adapter;
    }
}
