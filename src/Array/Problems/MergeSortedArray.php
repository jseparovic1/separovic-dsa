<?php

declare(strict_types=1);

namespace Separovic\Dsa\Array\Problems;

use BadMethodCallException;

/**
 * LeetCode 88. Merge Sorted Array
 *
 * You are given two integer arrays $nums1 and $nums2, sorted in non-decreasing
 * order, and two integers $m and $n, representing the number of initialized
 * elements in $nums1 and $nums2 respectively.
 *
 * Merge $nums2 into $nums1 as one sorted array. The final sorted array should
 * not be returned; instead, it must be stored inside $nums1. To accommodate
 * this, $nums1 has a length of $m + $n, where the first $m elements are the
 * initialized values and the last $n elements are placeholders.
 */
final readonly class MergeSortedArray
{
    /**
     * @param list<int> $nums1
     * @param list<int> $nums2
     */
    public function __invoke(array &$nums1, int $m, array $nums2, int $n): void
    {
        //                           k
        //                 p1
        // $nums1 = [1, 2, 2 , 0, 0, 0];
        //                           p2
        // $nums2 =           [2, 5, 6];

        // Time complexity O(m+n)
        // We loop over both nums1 and numes2

        // Space complexity O(1)
        // Program uses no additional space.

        $p1 = $m - 1;
        $p2 = $n - 1;

        $k = ($m + $n) - 1;

        while ($p2 >= 0) {
            if ($nums1[$p1] < $nums2[$p2]) {
                $nums1[$k] = $nums2[$p2];
                $p2--;
            } else {
                $nums1[$k] = $nums1[$p1];
                $p1--;
            }

            $k--;
        }
    }
}
