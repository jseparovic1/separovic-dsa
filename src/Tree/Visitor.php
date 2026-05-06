<?php

declare(strict_types=1);

namespace Separovic\Dsa\Tree;

/** @template TValue */
interface Visitor
{
    /** @param Node<TValue> $node */
    public function visit(int $level, Node $node): void;
}
