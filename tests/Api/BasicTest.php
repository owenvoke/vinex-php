<?php

namespace pxgamer\Vinex\Api;

use PHPUnit\Framework\TestCase;
use pxgamer\Vinex\Adapter\HttpAdapter;
use pxgamer\Vinex\Entity\Market;
use pxgamer\Vinex\Vinex;

class BasicTest extends TestCase
{
    /** @var Vinex */
    private $apiInstance;

    public function setUp()
    {
        $adapter = new HttpAdapter();
        $this->apiInstance = new Vinex($adapter);
    }

    /**
     * @test
     * @medium
     */
    public function itCanRetrieveTheServerTime(): void
    {
        $localTime = time();
        $serverTime = $this->apiInstance->basic()->getServerTime();

        // Check against local time, allow for 100s deviation
        $this->assertLessThanOrEqual($localTime + 100, $serverTime);
        $this->assertGreaterThanOrEqual($localTime - 100, $serverTime);
    }

    /**
     * @test
     * @medium
     */
    public function itCanRetrieveAllMarketInformation(): void
    {
        $data = $this->apiInstance->basic()->getAllMarketInformation();

        $this->assertNotEmpty($data);
        $this->assertInstanceOf(Market::class, $data[0]);
    }

    /**
     * @test
     * @medium
     */
    public function itCanRetrieveInformationForASingleMarket(): void
    {
        $data = $this->apiInstance->basic()->getSingleMarketInformation('BTC_ETH');

        $this->assertEquals('BTC_ETH', $data->symbol);
    }
}
