<?php

declare(strict_types=1);

namespace Separovic\Dsa\Tree;

use RecursiveArrayIterator;

/**
 * @template TValue
 *
 * @extends  RecursiveArrayIterator<TValue>
 */
final class NodeIterator extends RecursiveArrayIterator
{
    /** @param list<Node<TValue>> $items */
    public function __construct(array $items)
    {
        parent::__construct($items);
    }

    public function current(): Node
    {
        $node = parent::current();

        assert($node instanceof Node);

        return $node;
    }


    public function hasChildren(): bool
    {
        return count($this->current()->getChildren()) > 0;
    }

    public function getChildren(): RecursiveArrayIterator
    {
        return new NodeIterator($this->current()->getChildren());
    }
}
