<?php

declare(strict_types=1);

namespace Separovic\Dsa\Tree\LevelOrder;

use Separovic\Dsa\Tree\StringNode;
use Separovic\Dsa\Tree\Visitor;
use SplDoublyLinkedList;
use SplQueue;

final readonly class UsingQueue implements LevelOrder
{
    public function __construct(private Visitor $visitor)
    {
    }

    /** @param array<StringNode> $nodes */
    public function __invoke(array $nodes): void
    {
        /** @var SplQueue<StringNode> $queue */
        $queue = new SplQueue();
        $queue->setIteratorMode(SplDoublyLinkedList::IT_MODE_DELETE);

        $add = function (array $items) use ($queue) {
            foreach ($items as $item) {
                $queue->enqueue($item);
            }
        };

        $add($nodes);

        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();

            $this->visitor->visit($node);

            $add($node->children);
        }
    }
}
