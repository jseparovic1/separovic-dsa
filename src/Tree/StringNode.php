<?php

declare(strict_types=1);

namespace Separovic\Dsa\Tree;

use Stringable;

/** @implements Node<string> */
final readonly class StringNode implements Node, Stringable
{
    /** @param list<StringNode> $children */
    public function __construct(
        public string $value,
        public array $children = []
    ) {
    }

    public function getValue(): string
    {
        return $this->value;
    }

    /** @return list<StringNode> */
    public function getChildren(): array
    {
        return $this->children;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
