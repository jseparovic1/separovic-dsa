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

#[CoversClass(UsingStack::class)]
#[CoversClass(UsingRecursiveIterator::class)]
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
                    children: [new StringNode('Anakin Skywalker (jedi-knight)')],
                ),
                new StringNode('Rey Skywalker (jedi-master)'),
            ]
        );

        $xoLahru = new StringNode('Xo Lahru (grand-master)');

        $strategy->__invoke([$yoda, $xoLahru]);

        self::assertSame(
            [
//                'Yoda (grand-master)',
//                'Xo Lahru (grand-master)',
//
//                'Luke Skywalker (jedi-master)',
//                'Rey Skywalker (jedi-master)',
//
//                'Anakin Skywalker (jedi-knight)',
            ],
            array_map(fn(Node $node) => $node->getValue(), $visitor->visited)
        );
    }

    public static function provideStrategies(): Generator
    {
        yield 'It does level order traversal using queue.' => [
            (new UsingStack($visitor = new TrackingVisitor())),
            $visitor,
        ];

         yield 'It does level order traversal using recursive iterator.' => [
            (new UsingRecursiveIterator($visitor = new TrackingVisitor())),
            $visitor,
        ];
    }
}
