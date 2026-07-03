<?php

declare(strict_types=1);

namespace Separovic\Dsa\Array\Problems;

use Generator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(TwoSum::class)]
final class TwoSumTest extends TestCase
{
    /**
     * @param array<int, int> $nums
     * @param array{int, int} $expected
     */
    #[DataProvider('provideCases')]
    public function testFindsIndices(array $nums, int $target, array $expected): void
    {
        $actual = (new TwoSum)->__invoke($nums, $target);

        // The answer may be returned in any order.
        sort($actual);
        sort($expected);

        self::assertSame($expected, $actual);
    }

    public static function provideCases(): Generator
    {
        yield 'first two' => [
            'nums' => [2, 7, 11, 15],
            'target' => 9,
            'expected' => [0, 1],
        ];

        yield 'non-adjacent' => [
            'nums' => [3, 2, 4],
            'target' => 6,
            'expected' => [1, 2],
        ];

        yield 'duplicate values' => [
            'nums' => [3, 3],
            'target' => 6,
            'expected' => [0, 1],
        ];

        yield 'negative numbers' => [
            'nums' => [-3, 4, 3, 90],
            'target' => 0,
            'expected' => [0, 2],
        ];
    }
}
