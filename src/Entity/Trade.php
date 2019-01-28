<?php

declare(strict_types=1);

namespace pxgamer\Vinex\Entity;

final class Trade extends AbstractEntity
{
    /** @var string */
    public $market;
    /** @var string */
    public $type;
    /** @var float */
    public $priceOrder;
    /** @var float */
    public $amountOrder;
    /** @var float */
    public $price;
    /** @var float */
    public $amount;
    /** @var int */
    public $createdAt;
}
