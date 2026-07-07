<?php

declare(strict_types=1);

namespace Separovic\Dsa\Array\Problems;

use Generator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(MergeSortedArray::class)]
final class MergeSortedArrayTest extends TestCase
{
    /**
     * @param list<int> $nums1
     * @param list<int> $nums2
     * @param list<int> $expected
     */
    #[DataProvider('provideCases')]
    public function testMergesSortedArray(array $nums1, int $m, array $nums2, int $n, array $expected): void
    {
        (new MergeSortedArray)->__invoke($nums1, $m, $nums2, $n);

        self::assertSame($expected, $nums1);
    }

    public static function provideCases(): Generator
    {
        yield 'It merges two populated arrays' => [
            'nums1' => [1, 2, 3, 0, 0, 0],
            'm' => 3,
            'nums2' => [2, 5, 6],
            'n' => 3,
            'expected' => [1, 2, 2, 3, 5, 6],
        ];

        yield 'It keeps nums1 when nums2 is empty' => [
            'nums1' => [1],
            'm' => 1,
            'nums2' => [],
            'n' => 0,
            'expected' => [1],
        ];

        yield 'It copies nums2 when nums1 has no initialized values' => [
            'nums1' => [0],
            'm' => 0,
            'nums2' => [1],
            'n' => 1,
            'expected' => [1],
        ];
    }
}
