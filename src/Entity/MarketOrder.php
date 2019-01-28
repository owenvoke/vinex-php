<?php

declare(strict_types=1);

namespace pxgamer\Vinex\Entity;

final class MarketOrder extends AbstractEntity
{
    /** @var float */
    public $price;
    /** @var float */
    public $amount;
    /** @var float */
    public $remain;
    /** @var bool */
    public $inOrder;
}
