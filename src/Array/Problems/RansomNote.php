<?php

declare(strict_types=1);

namespace Separovic\Dsa\Array\Problems;

/**
 * LeetCode 383. Ransom Note
 *
 * Given two strings $ransomNote and $magazine, return true if $ransomNote can
 * be constructed by using the letters from $magazine and false otherwise.
 *
 * Each letter in $magazine can only be used once in $ransomNote.
 */
final readonly class RansomNote
{
    public function __invoke(string $ransomNote, string $magazine): bool
    {
        $seen = [];

        for ($i = 0; $i < strlen($magazine); $i++) {
            if (!isset($seen[$magazine[$i]])) {
                $seen[$magazine[$i]] = 1;
            } else {
                $seen[$magazine[$i]]++;
            }
        }

        for ($i = 0; $i < strlen($ransomNote); $i++) {
            if (!isset($seen[$ransomNote[$i]])) {
                return false;
            }

            $seen[$ransomNote[$i]]--;

            if ($seen[$ransomNote[$i]] === 0) {
                unset($seen[$ransomNote[$i]]);
            }
        }

        return true;
    }
}
