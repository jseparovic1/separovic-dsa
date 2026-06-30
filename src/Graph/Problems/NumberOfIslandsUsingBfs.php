<?php

declare(strict_types=1);

namespace Separovic\Dsa\Graph\Problems;

use SplQueue;

final readonly class NumberOfIslandsUsingBfs
{
    public function __invoke(array $grid): int
    {
        $islands = 0;

        $queue = new SplQueue();

        $directions = [
            [-1, 0],
            [1, 0],
            [0, -1],
            [0, 1]
        ];

        for ($r = 0; $r < count($grid); ++$r) {
            for ($c = 0; $c < count($grid[$r]); ++$c) {
                if ($grid[$r][$c] ==='1') {
                    $islands++;

                    // Mark as visited detrimentally, not when processing... good practice avoids processing twice.
                    $grid[$r][$c] = '0'; // Visited.
                    $queue->enqueue([$r, $c]);

                    while (!$queue->isEmpty()) {
                        [$row, $col] = $queue->dequeue();

                        foreach ($directions as [$dRow, $dCol]) {
                            $nr = $row + $dRow;
                            $nc = $col + $dCol;

                            if (
                                isset($grid[$nr][$nc]) && // In bounds
                                $grid[$nr][$nc] === '1' // Is island
                            ) {
                                $grid[$nr][$nc] = "0"; // Mark as visited;
                                $queue->enqueue([$nr, $nc]); // Visit around
                            }
                        }
                    }
                }

            }
        }

        return $islands;
    }
}
