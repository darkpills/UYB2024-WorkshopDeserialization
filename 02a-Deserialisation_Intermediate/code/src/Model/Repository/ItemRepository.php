<?php

namespace Application\Shareplay\Model\Repository;

class ItemRepository implements \ArrayAccess, \Iterator, \Countable
{
    private $container;
    private $keys;
    private $position;

    public function __construct()
    {
        $this->position = 0;
    }

    public function count()
    {
        return count($this->container);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current(): mixed
    {
        return $this->container[$this->keys[$this->position]];
    }

    public function key(): mixed
    {
        return $this->keys[$this->position];
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function valid(): bool
    {
        return isset($this->keys[$this->position]);
    }

    public function offsetSet(mixed $offset, mixed $value): void {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists(mixed $offset): bool {
        return isset($this->container[$offset]);
    }

    public function offsetUnset(mixed $offset): void {
        unset($this->container[$offset]);
    }

    public function offsetGet(mixed $offset): mixed {
        if (isset($this->container[$offset])){
            if ($this->container[$offset]->calculateValue() > PHP_INT_MAX) {
                error_log("Viewing a valuable item");
            }
            return $this->container[$offset];
        }
        return null;
    }

    public function calculateValue()
    {
        $gold = 0;
        for ($i = 0; $i < $this->count(); $i++) {
            $gold += $this->container[$i]->calculateValue();
        }
        return $gold;
    }
}
