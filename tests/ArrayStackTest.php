<?php
declare(strict_types = 1);

namespace Tests;

use Exceptions\StackEmptyException;
use PHPUnit\Framework\TestCase;
use Stacks\ArrayStack;

class ArrayStackTest extends TestCase
{
    function test_that_size_returns_the_correct_amount()
    {
        $obj = new \stdClass();
        $obj->key = "value";

        $arrayStack = new ArrayStack();
        $this->assertEquals(0, $arrayStack->size());

        $arrayStack->push($obj);
        $this->assertEquals(1, $arrayStack->size());
    }

    function test_that_empty_arraystack_throws_exception()
    {
        $this->expectExceptionMessage("Stack is empty.");
        $this->expectException(StackEmptyException::class);

        $arrayStack = new ArrayStack();
        $arrayStack->pop();
    }
}
