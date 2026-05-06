<?php

declare(strict_types=1);

namespace Separovic\Dsa\Tree\LevelOrder;

use Generator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Separovic\Dsa\Tree\Node;
use Separovic\Dsa\Tree\StringNode;
use Separovic\Dsa\Tree\TrackingVisitor;
use Separovic\Dsa\Tree\Visitor;

#[CoversClass(UsingQueue::class)]
#[CoversClass(UsingLevelOrderIterator::class)]
final class LevelOrderTest extends TestCase
{
    #[DataProvider('provideStrategies')]
    public function testLevelOrderTraversal(LevelOrder $strategy, Visitor $visitor): void
    {
        $yoda = new StringNode(
            'Yoda (grand-master)',
            children: [
                new StringNode(
                    'Luke Skywalker (jedi-master)',
                    children: [
                        new StringNode('Anakin Skywalker (jedi-knight)'),
                    ],
                ),
                new StringNode('Rey Skywalker (jedi-master)'),
            ]
        );

        $xoLahru = new StringNode('Xo Lahru (grand-master)');

        $strategy->__invoke([$yoda, $xoLahru]);

        self::assertSame(
            [
                '[lvl:0] Yoda (grand-master)',
                '[lvl:0] Xo Lahru (grand-master)',

                '[lvl:1] Luke Skywalker (jedi-master)',
                '[lvl:1] Rey Skywalker (jedi-master)',

                '[lvl:2] Anakin Skywalker (jedi-knight)',
            ],
            array_map(
                fn(VisitedNode $visited) => sprintf('[lvl:%d] %s', $visited->level, $visited->node->getValue()),
                $visitor->visited,
            )
        );
    }

    public static function provideStrategies(): Generator
    {
        yield 'It does level order traversal using queue.' => [
            new UsingQueue($visitor = new TrackingVisitor()),
            $visitor,
        ];

        yield 'It does level order traversal using level order iterator (basically same as queue).' => [
            new UsingLevelOrderIterator($visitor = new TrackingVisitor()),
            $visitor,
        ];

        yield 'It does level order traversal using array.' => [
            new UsingArray($visitor = new TrackingVisitor()),
            $visitor,
        ];
    }
}
