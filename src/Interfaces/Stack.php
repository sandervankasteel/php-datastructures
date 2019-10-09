<?php

namespace Interfaces;

use stdClass;

interface Stack
{
    public function size(): int;

    public function isEmpty(): bool;

    public function top(): int;

    public function push($element);

    public function pop(): stdClass;
}
