<?php


namespace app\shop\categories;


use app\algorithms\trees\ClosureTree;
use app\algorithms\trees\MinTreeLevel;
use app\algorithms\trees\structs\NodeOfTree;
use app\shop\categories\contracts\ICategory;
use vloop\entities\contracts\IField;
use Yii;
use yii\db\Exception;
use yii\helpers\VarDumper;

class CategorySql implements ICategory
{
    private $id;
    private $minTreeLevel;
    private $maxTreeLevel;
    private $_allRelatedNodes = null;


    public function __construct(IField $id)
    {
        $this->id = $id;
        $this->minTreeLevel = new MinTreeLevel();
        $this->maxTreeLevel = new Field(999);
    }

    /**
     * generate Closure table tree
     * @param IField $parentId
     * @return $this
     * @throws \Exception
     */
    public function buildTree(IField $parentId): self
    {
        $closureTree = new ClosureTree(
            $this->minTreeLevel,
            $this->maxTreeLevel,
            $this->currentTree()
        );
        $nodes = $closureTree->relateNodes($parentId, $this->id);
        foreach ($nodes as $node){

        }
    }

    /**
     * @return NodeOfTree[]
     */
    private function currentTree(): array {

    }

    private function removeDublies(): array {

    }
}