<?php

declare(strict_types=1);

namespace pxgamer\Vinex\Entity;

final class Market extends AbstractEntity
{
    /** @var string */
    public $symbol;
    /** @var float|int */
    public $lastPrice;
    /** @var float|int */
    public $volume;
    /** @var float|int */
    public $volume24h;
    /** @var float|int */
    public $change24h;
    /** @var float|int */
    public $high24h;
    /** @var float|int */
    public $low24h;
    /** @var float|int */
    public $threshold;
}
