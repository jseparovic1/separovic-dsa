<?php

declare(strict_types=1);

namespace Separovic\Dsa\Graph\Problems;

final readonly class NumberOfIslandsUsingRecursiveDfs
{
    public function __invoke(array $grid): int
    {
        $islands = 0;

        $dfs = static function (int $r, int $c) use (&$grid, &$dfs) {
            $directions = [
                [-1, 0],
                [1, 0],
                [0, -1],
                [0, 1],
            ];

            // Take a look at connecting adjacent lands horizontally or vertically.
            foreach ($directions as $direction) {
                [$moveRow, $moveColumn] = $direction;

                $nextRow = $r + $moveRow;
                $nextColumn = $c + $moveColumn;

                if (($grid[$nextRow][$nextColumn] ?? null) === '1') {
                    $grid[$nextRow][$nextColumn] = '0'; // visited.

                    $dfs($nextRow, $nextColumn);
                }
            }
        };

        // Assume all equals.
        $rows = count($grid);
        $cols = count($grid[0]);

        for ($r = 0; $r < $rows; $r++) {
            for ($c = 0; $c < $cols; $c++) {
                if ($grid[$r][$c] === '1') {
                    $grid[$r][$c] = '0'; // Visited.
                    $dfs($r, $c);
                    $islands++;
                }
            }
        }

        return $islands;
    }
}
