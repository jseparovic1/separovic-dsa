<?php

declare(strict_types=1);

namespace Separovic\Dsa\Array\Problems;

use RuntimeException;

/**
 * LeetCode 1. Two Sum
 *
 * Given an array of integers $nums and an integer $target, return the indices
 * of the two numbers such that they add up to $target.
 *
 * You may assume that each input has exactly one solution, and you may not use
 * the same element twice. You can return the answer in any order.
 *
 * Example:
 *   nums = [2, 7, 11, 15], target = 9  =>  [0, 1]  (nums[0] + nums[1] == 9)
 *   nums = [3, 2, 4],       target = 6  =>  [1, 2]
 *   nums = [3, 3],          target = 6  =>  [0, 1]
 *
 * Constraints:
 *   - 2 <= count($nums) <= 10^4
 *   - -10^9 <= $nums[i] <= 10^9
 *   - -10^9 <= $target <= 10^9
 *   - Exactly one valid answer exists.
 */
final readonly class TwoSum
{
    /**
     * @param array<int, int> $nums
     *
     * @return array{int, int} indices of the two numbers adding up to $target
     */
    public function __invoke(array $nums, int $target): array
    {
        $seen = [];

        foreach ($nums as $i => $num) {
            $complement = $target - $num;

            if (isset($seen[$complement])) {
                return [$seen[$complement], $i];
            }

            $seen[$num] = $i;
        }

        return [];
    }
}
