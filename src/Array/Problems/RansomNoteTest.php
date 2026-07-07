<?php

declare(strict_types=1);

namespace Separovic\Dsa\Array\Problems;

use Generator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(RansomNote::class)]
final class RansomNoteTest extends TestCase
{
    #[DataProvider('provideCases')]
    public function testChecksWhetherRansomNoteCanBeConstructed(
        string $ransomNote,
        string $magazine,
        bool $expected,
    ): void {
        self::assertSame($expected, (new RansomNote)->__invoke($ransomNote, $magazine));
    }

    public static function provideCases(): Generator
    {
        yield 'It cannot construct when character is missing' => [
            'ransomNote' => 'a',
            'magazine' => 'b',
            'expected' => false,
        ];

        yield 'It cannot reuse magazine characters' => [
            'ransomNote' => 'aa',
            'magazine' => 'ab',
            'expected' => false,
        ];

        yield 'It constructs from available characters' => [
            'ransomNote' => 'aa',
            'magazine' => 'aab',
            'expected' => true,
        ];

        yield 'It constructs an empty ransom note' => [
            'ransomNote' => '',
            'magazine' => 'abc',
            'expected' => true,
        ];
    }
}
