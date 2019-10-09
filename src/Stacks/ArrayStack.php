<?php

namespace Stacks;

use Exceptions\StackEmptyException;
use Exceptions\StackFullException;
use Interfaces\Stack;
use stdClass;

class ArrayStack implements Stack
{
    private $capacity;

    private $type;

    private $array = [];

    private $top = -1;

    /**
     * ArrayStack constructor.
     * @param int $capacity
     * @param string $type
     */
    public function __construct(int $capacity = 1000, string $type = stdClass::class)
    {
        $this->capacity = $capacity;
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function size(): int
    {
        return $this->top + 1;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->top < 0;
    }

    /**
     * @return int
     */
    public function top(): int
    {
        return $this->top;
    }

    /**
     * @param $element
     * @throws StackEmptyException
     */
    public function push($element)
    {
        if(get_class($element) !== $this->type) {
            throw new StackEmptyException("Mismatched type");
        }

        if($this->size() === $this->capacity) {
            throw new StackFullException("Stack overflow.");
        }

        $this->array[$this->top++] = $element;
    }

    /**
     * Returns the last pushed value to the stack
     *
     * @return stdClass
     * @throws StackEmptyException
     */
    public function pop(): stdClass
    {
        if($this->isEmpty()) {
            throw new StackEmptyException;
        }

        return array_pop($this->array);
    }
}
