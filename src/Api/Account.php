<?php

declare(strict_types=1);

namespace pxgamer\Vinex\Api;

use pxgamer\Vinex\Entity\Balance as BalanceEntity;
use function GuzzleHttp\json_decode;

/** @link https://docs.vinex.network/api_account_endpoint.html */
class Account extends AbstractApi
{
    /** @return BalanceEntity[] */
    public function getAllBalanceInformation(): array
    {
        $response = $this->adapter->get(sprintf('%s/v2/balances', $this->endpoint));

        $data = json_decode($response);

        return array_map(function ($market) {
            return new BalanceEntity($market);
        }, $data->balances);
    }

    public function getSingleBalanceInformation(string $coinSymbol): BalanceEntity
    {
        $response = $this->adapter->get(sprintf('%s/v2/balances/%s', $this->endpoint, $coinSymbol));

        $data = json_decode($response);

        return new BalanceEntity($data->balances);
    }
}
