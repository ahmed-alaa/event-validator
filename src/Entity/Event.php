<?php

declare(strict_types=1);

namespace EventValidator\App\Entity;

class Event
{
    private string $namespace;

    private string $name;

    private array $fields;

    public function __construct(string $namespace, string $name, array $fields)
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
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}
