<?php

declare(strict_types=1);

namespace Separovic\Dsa\Graph;

use Stringable;

/** @implements Node<string> */
final readonly class StringNode implements Node, Stringable
{
    public function __construct(public string $value)
    {
    }

    public function getId(): string
    {
        return $this->value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }


}
