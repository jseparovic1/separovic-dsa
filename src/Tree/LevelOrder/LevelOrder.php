<?php

declare(strict_types=1);

namespace Separovic\Dsa\Tree\LevelOrder;

use Separovic\Dsa\Tree\Node;

interface LevelOrder
{
    /** @param list<Node> $nodes */
    public function __invoke(array $nodes): void;
}
