<?php

declare(strict_types=1);

namespace EventValidator\App\Service;

use EventValidator\App\Entity\Event;
use EventValidator\App\Entity\EventField;

class ParseToEventDTO implements ParseToEvent
{
    public function parse(array $event): Event
    {
        $namespace = $this->extractNamespace(key($event));
        $name = $this->extractName(key($event));
        $fields = $this->extractFields($event[key($event)]);

        return new Event($namespace, $name, $fields);
    }

    private function extractNamespace(string $name)
    {
        return substr($name, 0, strrpos($name, '\\') + 1);
    }

    private function extractName(string $name)
    {
        return substr($name, strrpos($name, '\\') + 1);
    }

    private function extractFields(array $fields)
    {
        $eventFields = [];
        foreach ($fields as $key => $type) {
            $eventFields[] = new EventField($key, $type['type']);
        }

        return $eventFields;
    }
}
