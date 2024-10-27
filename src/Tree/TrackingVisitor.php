<?php

declare(strict_types=1);

namespace Separovic\Dsa\Tree;

final class TrackingVisitor implements Visitor
{
    public function __construct(public array $visited = [])
    {
    }

    public function visit(Node $node): void
    {
        $this->visited[] = $node;
    }
}
