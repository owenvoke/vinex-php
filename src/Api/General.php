<?php

declare(strict_types=1);

namespace pxgamer\Vinex\Api;

use pxgamer\Vinex\Entity\MarketOrder as MarketOrderEntity;
use function GuzzleHttp\json_decode;

/** @link https://docs.vinex.network/api_general_endpoint.html */
class General extends AbstractApi
{
    /**
     * @param string   $type
     * @param string   $market
     * @param int|null $limit
     * @param int|null $receiveWindow Allowed time in seconds between the timestamp and server time.
     * @return MarketOrderEntity[]
     */
    public function getMarketOrders(
        string $type,
        string $market,
        ?int $limit = null,
        ?int $receiveWindow = null
    ): array {
        $query = http_build_query([
            'type' => $type,
            'market' => $market,
            'limit' => $limit ?? MarketOrderEntity::DEFAULT_LIMIT,
            'recv_window' => $receiveWindow ?? 10,
            'time_stamp' => time(),
        ]);

        $response = $this->adapter->get(sprintf('%s/v2/get-orders?%s', $this->endpoint, $query));

        $data = json_decode($response);

        return array_map(function ($market) {
            return new MarketOrderEntity($market);
        }, $data->data);
    }
}
