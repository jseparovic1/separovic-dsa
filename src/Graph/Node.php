<?php

declare(strict_types=1);

namespace Separovic\Dsa\Graph;

/** @template TValue */
interface Node
{
    public function getId(): string;

    /** @return TValue */
    public function getValue();
}
