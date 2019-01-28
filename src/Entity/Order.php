<?php

declare(strict_types=1);

namespace pxgamer\Vinex\Entity;

final class Order extends AbstractEntity
{
    public const DEFAULT_LIMIT = 10;

    /** @var string */
    public $uid;
    /** @var string */
    public $market;
    /** @var string */
    public $type;
    /** @var int */
    public $createdAt;
    /** @var float */
    public $remain;
    /** @var float */
    public $amount;
    /** @var float */
    public $price;
}
