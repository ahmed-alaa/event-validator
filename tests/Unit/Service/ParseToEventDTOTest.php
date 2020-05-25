<?php

use EventValidator\App\Entity\Event;
use EventValidator\App\Entity\EventField;
use EventValidator\App\Service\ParseToEventDTO;
use PHPUnit\Framework\TestCase;

class ParseToEventDTOTest extends TestCase
{
    public function testParseEventDtoInstance()
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
        ];
        $parser = new ParseToEventDTO();

        $event = $parser->parse($eventArr);

        $this->assertInstanceOf(Event::class, $event);
    }

    public function testParseEventNamespace()
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
        ];
        $parser = new ParseToEventDTO();

        $event = $parser->parse($eventArr);

        $this->assertEquals('\App\Domain\Models\Events\\', $event->getNamespace());
    }

    public function testParseEventName()
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
        ];
        $parser = new ParseToEventDTO();

        $event = $parser->parse($eventArr);

        $this->assertEquals('UserAsBuyerRegistered', $event->getName());
    }

    public function testParseEventFieldsCount()
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
        ];
        $parser = new ParseToEventDTO();

        $event = $parser->parse($eventArr);

        $this->assertCount(2, $event->getFields());
    }

    public function testParseEventFieldInstanceType()
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
        ];
        $parser = new ParseToEventDTO();

        $event = $parser->parse($eventArr);

        $this->assertInstanceOf(EventField::class, $event->getFields()[0]);
    }

    public function testParseEventFieldName()
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
        ];
        $parser = new ParseToEventDTO();

        $event = $parser->parse($eventArr);

        /** @var EventField $eventField */
        $eventField = $event->getFields()[0];
        $this->assertEquals('id', $eventField->getName());
    }

    public function testParseEventFieldType()
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
        ];
        $parser = new ParseToEventDTO();

        $event = $parser->parse($eventArr);

        /** @var EventField $eventField */
        $eventField = $event->getFields()[0];
        $this->assertEquals('int', $eventField->getType());
    }
}
