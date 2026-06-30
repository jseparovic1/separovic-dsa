<?php

declare(strict_types=1);

namespace Separovic\Dsa\Graph;

/** @template T */
final class Graph
{
    /** @var list<Node<T>> */
    private array $adjacency = [];

    /** @var array<string, Node<T>> */
    private array $nodes = [];

    public function __construct()
    {
    }

    /** @param Node<T> $node */
    public function addNode(Node $node): void
    {
        $id = $node->getId();

        $this->nodes[$id] = $node;
        $this->adjacency[$id] ??= [];
    }

    /**
     * @param Node<T> $from
     * @param Node<T> $to
     */
    public function addEdge(Node $from, Node $to): void
    {
        $this->addNode($from);
        $this->addNode($to);

        $this->adjacency[$from->getId()] = $to->getId();
    }

    /**
     * @param Node<T> $node
     * @return list<Node<T>>
     */
    public function neighbors(Node $node): array
    {
        $neighborIds = $this->adjacency[$node->getId()] ?? [];

        return array_map(
            fn(string $id): Node => $this->nodes[$id],
            $neighborIds
        );
    }

    public function hasEdge(Node $from, Node $to): bool
    {
        return in_array(
            $to->getId(),
            $this->adjacency[$from->getId()],
            strict: true
        );
    }
}
