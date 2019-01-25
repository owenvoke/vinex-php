<?php
declare(strict_types=1);

namespace pxgamer\Vinex\Api;

use pxgamer\Vinex\Adapter\HttpAdapter;

abstract class AbstractApi
{
    /** @var string */
    public const ENDPOINT = 'https://api.vinex.network/api';

    /** @var HttpAdapter */
    protected $adapter;

    /** @var string */
    protected $endpoint;

    public function __construct(HttpAdapter $adapter, ?string $endpoint = null)
    {
        $this->adapter = $adapter;
        $this->endpoint = $endpoint ?: static::ENDPOINT;
    }
}
