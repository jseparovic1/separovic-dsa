<?php

declare(strict_types=1);

namespace Separovic\Dsa\Tree;

use Separovic\Dsa\Tree\LevelOrder\VisitedNode;

final class TrackingVisitor implements Visitor
{
    /** @param list<VisitedNode> $visited */
    public function __construct(public array $visited = [])
    {
    }

    public function visit(int $level, Node $node): void
    {
        $this->visited[] = new VisitedNode($level, $node);
    }
}
