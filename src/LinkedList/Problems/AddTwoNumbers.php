<?php

declare(strict_types=1);

namespace Separovic\Dsa\LinkedList\Problems;

/**
 * LeetCode 2. Add Two Numbers
 *
 * You are given two non-empty linked lists representing two non-negative
 * integers. The digits are stored in reverse order, and each node contains a
 * single digit. Add the two numbers and return the sum as a linked list.
 *
 * You may assume the two numbers do not contain any leading zero, except the
 * number 0 itself.
 */
final readonly class AddTwoNumbers
{
    public function __invoke(ListNode $l1, ListNode $l2): ListNode
    {
        $start = new ListNode();
        $tail = $start;

        $carry = 0;

        while ($l1 !== null || $l2 !== null || $carry !== 0) {
            $sum = $carry + $l1?->val + $l2?->val;

            $carry = $sum >= 10 ? 1 : 0;

            $tail->next = new ListNode($sum % 10);
            $tail = $tail->next; // Point to next node.

            $l1 = $l1?->next;
            $l2 = $l2?->next;
        }


        return $start->next;
    }
}

final class ListNode
{
    public function __construct(
        public int $val = 0,
        public ?self $next = null,
    ) {
    }
}
