<?php

declare(strict_types=1);

namespace EventValidator\App\Service;

use EventValidator\App\Entity\Event;

interface ParseToEvent
{
    /**
     * @param array $event
     * @return Event
     */
    public function parse(array $event): Event;
}
