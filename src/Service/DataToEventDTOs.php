<?php

declare(strict_types=1);

namespace EventValidator\App\Service;

use EventValidator\App\Entity\Event;

class DataToEventDTOs implements DataToEventDTOsInterface
{
    /**
     * @var ParseToEventInterface
     */
    private ParseToEventInterface $parseToEvent;

    public function __construct(ParseToEventInterface $parseToEvent)
    {
        $this->parseToEvent = $parseToEvent;
    }

    /**
     * @param array $events
     * @return Event[]
     */
    public function convertDataToEventDTOs(array $events): iterable
    {
        $eventDTOs = [];

        foreach ($events as $key => $event) {
            $eventDTOs[] = $this->parseToEvent->parse([$key => $event]);
        }

        return $eventDTOs;
    }
}
