<?php

use EventValidator\App\Service\DataToEventDTOs;
use EventValidator\App\Service\ParseToEventDTO;
use PHPUnit\Framework\TestCase;

class DataToEventDTOsTest extends TestCase
{
    public function testConvertDataToEventList()
    {
        $eventArr = [
            '\App\Domain\Models\Events\UserAsBuyerRegistered' => [
                'id' => [
                    'type' => 'int',
                ],
                'name' => [
                    'type' => 'string',
                ],
            ],
            '\App\Domain\Models\Events\UserAsBuyerEmailReceived' => [
                'id' => [
                    'type' => 'int',
                ],
                'email' => [
                    'type' => 'string',
                ],
            ],
        ];

        $eventParser = new ParseToEventDTO();
        $dataToEventDTOs = new DataToEventDTOs($eventParser);

        $eventDTOs = $dataToEventDTOs->convertDataToEventDTOs($eventArr);

        $this->assertCount(2, $eventDTOs);
    }
}
