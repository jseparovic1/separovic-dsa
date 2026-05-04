<?php

declare(strict_types=1);

namespace Separovic\Dsa\Tree\LevelOrder;

use RecursiveIteratorIterator;
use Separovic\Dsa\Tree\NodeIterator;
use Separovic\Dsa\Tree\StringNode;
use Separovic\Dsa\Tree\Visitor;

final readonly class UsingLevelOrderIterator implements LevelOrder
{
    public function __construct(private Visitor $visitor)
    {
    }

    /** @param array<StringNode> $nodes */
    public function __invoke(array $nodes): void
    {
        foreach (new LevelOrderIterator($nodes) as $node) {
            $this->visitor->visit($node);
        }
    }
}
