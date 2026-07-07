<?php

declare(strict_types=1);

namespace Separovic\Dsa\LinkedList\Problems;

use Generator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(AddTwoNumbers::class)]
#[CoversClass(ListNode::class)]
final class AddTwoNumbersTest extends TestCase
{
    /**
     * @param list<int> $l1
     * @param list<int> $l2
     * @param list<int> $expected
     */
    #[DataProvider('provideCases')]
    public function testAddsTwoNumbers(array $l1, array $l2, array $expected): void
    {
        $fromArray = static function (array $values): ?ListNode {
            $head = null;

            for ($i = count($values) - 1; $i >= 0; $i--) {
                $head = new ListNode($values[$i], $head);
            }

            return $head;
        };

        $toArray = static function (?ListNode $node): array {
            $values = [];

            while ($node !== null) {
                $values[] = $node->val;
                $node = $node->next;
            }

            return $values;
        };

        $actual = (new AddTwoNumbers)->__invoke(
            $fromArray($l1),
            $fromArray($l2),
        );

        self::assertSame($expected, $toArray($actual));
    }

    public static function provideCases(): Generator
    {
        yield 'It adds same length lists with carry' => [
            'l1' => [2, 4, 3],
            'l2' => [5, 6, 4],
            'expected' => [7, 0, 8],
        ];

        yield 'It adds zero plus zero' => [
            'l1' => [0],
            'l2' => [0],
            'expected' => [0],
        ];

        yield 'It adds different length lists with final carry' => [
            'l1' => [9, 9, 9, 9, 9, 9, 9],
            'l2' => [9, 9, 9, 9],
            'expected' => [8, 9, 9, 9, 0, 0, 0, 1],
        ];
    }

}
