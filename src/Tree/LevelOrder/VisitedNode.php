<?php

declare(strict_types=1);


namespace Separovic\Dsa\Tree\LevelOrder;

use Separovic\Dsa\Tree\Node;

final readonly class VisitedNode
{
    public function __construct(public int $level, public Node $node)
    {
    }
}
