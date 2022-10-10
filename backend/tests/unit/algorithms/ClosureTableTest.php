<?php


use app\algorithms\trees\ClosureTree;
use app\algorithms\trees\MaxTreeLevel;
use app\algorithms\trees\MinTreeLevel;
use app\algorithms\trees\structs\NodeOfTree;
use app\models\fields\Field;
use Codeception\Test\Unit;

class ClosureTableTest extends Unit
{
    private $nodes;
    private $minLevel;
    private $maxLevel;

    protected function _before()
    {
        $this->nodes = [
            new NodeOfTree(3, 8, 1),
            new NodeOfTree(3, 5, 2),
            new NodeOfTree(3, 1, 3),
            new NodeOfTree(3, 2, 2),
//            new NodeOfTree(8, 5, 1),
            new NodeOfTree(5, 1, 1),
            new NodeOfTree(8, 1, 2),
//            new NodeOfTree(8, 2, 1),

            new NodeOfTree(6, 7, 1),
            new NodeOfTree(6, 9, 2),
            new NodeOfTree(6, 4, 3),
            new NodeOfTree(6, 10, 4),
            new NodeOfTree(7, 9, 1),
            new NodeOfTree(7, 4, 2),
            new NodeOfTree(7, 10, 3),
            new NodeOfTree(9, 4, 1),
            new NodeOfTree(9, 10, 2),
            new NodeOfTree(4, 10, 1)
        ];
        $this->minLevel = new MinTreeLevel();
        $this->maxLevel = new MaxTreeLevel();
    }

    public function testRelateNodes()
    {
        $closureTree = new ClosureTree(
            $this->minLevel,
            $this->maxLevel,
            $this->nodes
        );
        $tree = $closureTree->relateNodes(
            new Field(9),
            new Field(3)
        );
        $this->assertNotFalse(
            $nodeForValidateLevel = $this->nodeByParams(
                $tree,
                6,
                5
            ),
            "Нет узла для проверки, установленного уровня"
        );;
        $this->assertEquals(
            5,
            $nodeForValidateLevel->level(),
            "Не правильно РАССЧИТАН или изначально УСТАНОВЛЕН уровень дерева"
        );
    }

//    public function testResetMissingNodes(){
//        $tree = $this->nodes;
//        $this->assertNotFalse(
//            $this->nodeByParams(
//                $tree,
//                8,
//                1
//            )
//        );
//    }

    /**
     * @param array $tree
     * @param int $parentId
     * @param int $nodeId
     * @return false|NodeOfTree
     */
    private function nodeByParams(array $tree, int $parentId, int $nodeId)
    {
        return current(
            array_filter(
                $tree,
                function (NodeOfTree $node) use ($parentId, $nodeId) {
                    if ($node->parentId() == $parentId and $node->id() == $nodeId) {
                        return true;
                    }
                    return false;
                }
            )
        );
    }
}