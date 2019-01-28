<?php

declare(strict_types=1);

namespace pxgamer\Vinex\Entity;

final class Trade extends AbstractEntity
{
    /** @var string */
    public $market;
    /** @var string */
    public $type;
    /** @var float|int */
    public $priceOrder;
    /** @var float|int */
    public $amountOrder;
    /** @var float|int */
    public $price;
    /** @var float|int */
    public $amount;
    /** @var int */
    public $createdAt;
}
