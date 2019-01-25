<?php

declare(strict_types=1);

namespace pxgamer\Vinex\Entity;

final class MarketOrder extends AbstractEntity
{
    public const DEFAULT_LIMIT = 10;

    /** @var float */
    public $price;
    /** @var float */
    public $amount;
    /** @var float */
    public $remain;
    /** @var bool */
    public $inOrder;
}
