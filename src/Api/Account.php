<?php

declare(strict_types=1);

namespace pxgamer\Vinex\Api;

use function GuzzleHttp\json_decode;
use pxgamer\Vinex\Entity\Order as OrderEntity;
use pxgamer\Vinex\Entity\Trade as TradeEntity;
use pxgamer\Vinex\Entity\Balance as BalanceEntity;

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

    /**
     * @param int|null    $page
     * @param string|null $status
     * @param string|null $market
     * @param int|null    $limit
     * @param int|null    $receiveWindow Allowed time in seconds between the timestamp and server time.
     * @return OrderEntity[]
     */
    public function getMyOrders(
        ?int $page = null,
        ?string $status = null,
        ?string $market = null,
        ?int $limit = null,
        ?int $receiveWindow = null
    ): array {
        $query = [
            'page' => $page ?? 1,
            'limit' => $limit ?? self::DEFAULT_LIMIT,
            'recv_window' => $receiveWindow ?? 10,
            'time_stamp' => time(),
        ];

        if ($market) {
            $query['market'] = $market;
        }

        if ($status) {
            $query['status'] = $status;
        }

        $query = http_build_query($query);

        $response = $this->adapter->get(sprintf('%s/v2/get-my-orders?%s', $this->endpoint, $query));

        $data = json_decode($response);

        return array_map(function ($order) {
            return new OrderEntity($order);
        }, $data->data);
    }

    /**
     * @param int|null    $page
     * @param string|null $market
     * @param int|null    $limit
     * @param int|null    $receiveWindow Allowed time in seconds between the timestamp and server time.
     * @return TradeEntity[]
     */
    public function getMyTrades(
        ?int $page = null,
        ?string $market = null,
        ?int $limit = null,
        ?int $receiveWindow = null
    ): array {
        $query = [
            'page' => $page ?? 1,
            'limit' => $limit ?? self::DEFAULT_LIMIT,
            'recv_window' => $receiveWindow ?? 10,
            'time_stamp' => time(),
        ];

        if ($market) {
            $query['market'] = $market;
        }

        $query = http_build_query($query);

        $response = $this->adapter->get(sprintf('%s/v2/get-my-trading?%s', $this->endpoint, $query));

        $data = json_decode($response);

        return array_map(function ($trade) {
            return new TradeEntity($trade);
        }, $data->data);
    }
}
