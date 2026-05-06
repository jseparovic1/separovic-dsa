<?php

declare(strict_types=1);


namespace Separovic\Dsa\Tree\LevelOrder;

use IteratorAggregate;
use Separovic\Dsa\Tree\Node;
use SplQueue;
use Traversable;

/** @implements IteratorAggregate<int, Node> */
final readonly class LevelOrderIterator implements IteratorAggregate
{
    /** @param list<Node> $nodes */
    public function __construct(private array $nodes)
    {
    }

    /** @return Traversable<array{level: int, node: Node}> */
    public function getIterator(): Traversable
    {
        $queue = new SplQueue();

        // First add root nodes to the queue (usually only one).
        foreach ($this->nodes as $node) {
            $queue->enqueue($node);
        }

        $level = 0;

        while (!$queue->isEmpty()) {
            $nodesOnLevel = $queue->count();

            for ($i = 0; $i < $nodesOnLevel; $i++) {
                $node = $queue->dequeue();
                yield ['level' => $level, 'node' => $node]; // Node first.

                // ... then its children.
                foreach ($node->getChildren() as $child) {
                    $queue->enqueue($child);
                }
            }

            $level++;
        }
    }
}
