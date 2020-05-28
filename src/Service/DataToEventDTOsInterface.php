<?php

declare(strict_types=1);

namespace EventValidator\App\Service;

interface DataToEventDTOsInterface
{
    /**
     * @param array $events
     * @return iterable
     */
    public function convertDataToEventDTOs(array $events): iterable;
}
