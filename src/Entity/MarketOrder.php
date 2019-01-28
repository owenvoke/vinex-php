<?php

declare(strict_types=1);

namespace pxgamer\Vinex\Entity;

final class MarketOrder extends AbstractEntity
{
    /** @var float|int */
    public $price;
    /** @var float|int */
    public $amount;
    /** @var float|int */
    public $remain;
    /** @var bool */
    public $inOrder;
}
