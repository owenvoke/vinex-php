<?php

declare(strict_types=1);

namespace pxgamer\Vinex\Entity;

final class Balance extends AbstractEntity
{
    /** @var string */
    public $asset;
    /** @var float */
    public $free;
    /** @var float */
    public $locked;
}
