<?php

declare(strict_types=1);

namespace pxgamer\Vinex\Entity;

final class Market extends AbstractEntity
{
    /** @var string */
    public $symbol;
    /** @var float */
    public $lastPrice;
    /** @var float */
    public $volume;
    /** @var float */
    public $volume24h;
    /** @var float */
    public $change24h;
    /** @var float */
    public $high24h;
    /** @var float */
    public $low24h;
    /** @var float */
    public $threshold;
}
