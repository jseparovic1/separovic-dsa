# separovic-dsa

Personal collection of algorithms and data structures, often with multiple
implementations of the same algorithm for comparison.

## Solved LeetCode problems

| # | Problem | Topic | Solutions | Tests |
|---|---------|-------|-----------|-------|
| 1 | [Two Sum](https://leetcode.com/problems/two-sum/) | Array / Hash Map | [hash map](src/Array/Problems/TwoSum.php) | [test](src/Array/Problems/TwoSumTest.php) |
| 2 | [Add Two Numbers](https://leetcode.com/problems/add-two-numbers/) | Linked List | [carry with dummy head](src/LinkedList/Problems/AddTwoNumbers.php) | [test](src/LinkedList/Problems/AddTwoNumbersTest.php) |
| 88 | [Merge Sorted Array](https://leetcode.com/problems/merge-sorted-array/) | Array / Two Pointers | [in-place reverse merge](src/Array/Problems/MergeSortedArray.php) | [test](src/Array/Problems/MergeSortedArrayTest.php) |
| 102 | [Binary Tree Level Order Traversal](https://leetcode.com/problems/binary-tree-level-order-traversal/) | Tree / BFS | [queue](src/Tree/LevelOrder/UsingQueue.php), [level-order iterator](src/Tree/LevelOrder/UsingLevelOrderIterator.php), [array](src/Tree/LevelOrder/UsingArray.php) | [test](src/Tree/LevelOrder/LevelOrderTest.php) |
| 200 | [Number of Islands](https://leetcode.com/problems/number-of-islands/) | Graph / BFS / DFS | [BFS](src/Graph/Problems/NumberOfIslandsUsingBfs.php), [recursive DFS](src/Graph/Problems/NumberOfIslandsUsingRecursiveDfs.php) | [test](src/Graph/Problems/NumberOfIslandsTest.php) |
| 383 | [Ransom Note](https://leetcode.com/problems/ransom-note/) | String / Hash Map | [frequency count](src/Array/Problems/RansomNote.php) | [test](src/Array/Problems/RansomNoteTest.php) |
