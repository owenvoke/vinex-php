<?php

declare(strict_types=1);

namespace pxgamer\Vinex\Entity;

final class Order extends AbstractEntity
{
    /** @var string */
    public $uid;
    /** @var string */
    public $market;
    /** @var string */
    public $type;
    /** @var int */
    public $createdAt;
    /** @var float|int */
    public $remain;
    /** @var float|int */
    public $amount;
    /** @var float|int */
    public $price;
}
