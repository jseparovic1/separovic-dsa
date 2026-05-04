<?php

declare(strict_types=1);


namespace Separovic\Dsa\Tree\LevelOrder;

use IteratorAggregate;
use Separovic\Dsa\Tree\Node;
use SplQueue;
use Traversable;

/**
 * @implements IteratorAggregate<int, Node>
 */
final readonly class LevelOrderIterator implements IteratorAggregate
{
    /** @param list<Node> $nodes */
    public function __construct(private array $nodes)
    {
    }

    public function getIterator(): Traversable
    {
        $queue = new SplQueue();

        // First add root nodes to the queue (usually only one).
        foreach ($this->nodes as $node) {
            $queue->enqueue($node);
        }

        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();

            yield $node; // Node first.

            // ... then its children.
            foreach ($node->getChildren() as $child) {
                $queue->enqueue($child);
            }
        }

    }
}
