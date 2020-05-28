<?php

declare(strict_types=1);

namespace EventValidator\App\Entity;

class Event
{
    private string $namespace;

    private string $name;

    private iterable $fields;

    public function __construct(string $namespace, string $name, iterable $fields)
    {
        $this->namespace = $namespace;
        $this->name = $name;
        $this->fields = $fields;
    }

    /**
     * @return string
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return EventField[]
     */
    public function getFields(): iterable
    {
        return $this->fields;
    }
}
