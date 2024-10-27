<?php

declare(strict_types=1);

namespace Separovic\Dsa\Tree;

/** @template TValue */
interface Node
{
    /** @return TValue */
    public function getValue();

    /** @return list<TValue> */
    public function getChildren(): array;
}
