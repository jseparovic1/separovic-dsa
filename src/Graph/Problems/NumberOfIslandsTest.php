<?php

declare(strict_types=1);

namespace Separovic\Dsa\Graph\Problems;

use Generator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(NumberOfIslandsUsingBfs::class)]
#[CoversClass(NumberOfIslandsUsingRecursiveDfs::class)]
final class NumberOfIslandsTest extends TestCase
{
    /** @param array<int, array<int, string>> $grid */
    #[DataProvider('provideGrids')]
    public function testCountsIslands(array $grid, int $expected): void
    {
        self::assertSame($expected, (new NumberOfIslandsUsingBfs)->__invoke($grid));
        self::assertSame($expected, (new NumberOfIslandsUsingRecursiveDfs)->__invoke($grid));
    }

    public static function provideGrids(): Generator
    {
        yield 'one island' => [
            'grid' => [
                ['1', '1', '1', '1', '0'],
                ['1', '1', '0', '1', '0'],
                ['1', '1', '0', '0', '0'],
                ['0', '0', '0', '0', '0'],
            ],
            'expected' => 1,
        ];

        yield 'three islands' => [
            'grid' => [
                ['1', '1', '0', '0', '0'],
                ['1', '1', '0', '0', '0'],
                ['0', '0', '1', '0', '0'],
                ['0', '0', '0', '1', '1'],
            ],
            'expected' => 3,
        ];
    }
}
