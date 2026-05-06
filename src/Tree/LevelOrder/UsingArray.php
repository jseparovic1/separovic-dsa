<?php

declare(strict_types=1);

namespace Separovic\Dsa\Tree\LevelOrder;

use Separovic\Dsa\Tree\Node;
use Separovic\Dsa\Tree\Visitor;

final readonly class UsingArray implements LevelOrder
{
    public function __construct(private Visitor $visitor)
    {
    }

    /** @param list<Node> $nodes */
    public function __invoke(array $nodes): void
    {
        $toProcess = $nodes;

        $level = 0;

        while (count($toProcess) > 0) {
            $children = [];

            foreach ($toProcess as $node) {
                $this->visitor->visit($level, $node);
                $children = [...$children, ...$node->getChildren()];
            }

            $toProcess = $children;

            $level++;
        }
    }
}
