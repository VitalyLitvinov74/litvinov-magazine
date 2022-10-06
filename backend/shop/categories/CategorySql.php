<?php


namespace app\shop\categories;


use app\models\consts\MinTreeLevel;
use app\shop\categories\contracts\ICategory;
use app\tables\TableCategoriesTree;
use vloop\entities\contracts\IField;
use vloop\entities\exceptions\NotSavedData;
use Yii;
use yii\helpers\VarDumper;

class CategorySql implements ICategory
{
    private $id;
    private $minTreeLevel;

    public function __construct(IField $id)
    {
        $this->id = $id;
        $this->minTreeLevel = new MinTreeLevel();
    }

    /**
     * generate Closure table tree
     * @param IField $parentId
     * @return $this
     * @throws \Exception
     */
    public function buildTree(IField $parentId): self
    {
        $ancestorTree = TableCategoriesTree::find()
            ->where(
                'child_id=:ancestor',
                [':ancestor' => $parentId])
            ->orderBy(["level" => SORT_DESC])
            ->all();
        $needleTree = [];
        foreach ($ancestorTree as $ancestorNode) {
            $descendantNode = new TableCategoriesTree([
                'child_id' => $this->id->value(),
                'parent_id' => $ancestorNode->parent_id,
                'level' => ++$ancestorNode->level
            ]);
            $needleTree[] = $descendantNode;
        }
        foreach ($this->destendantTree() as $descendantNode) {
            $ancestorNode = new TableCategoriesTree([
                'child_id' => $descendantNode->child_id,
                'parent_id' => $parentId->value(),
                'level' => ++$descendantNode->level
            ]);
            $needleTree[] = $ancestorNode;
        }
        $needleTree[] = new TableCategoriesTree([
            'child_id' => $this->id->value(),
            'parent_id' => $parentId->value(),
            'level' => $this->minTreeLevel->value()
        ]);
        $trx = Yii::$app->db->beginTransaction();
        try {
            foreach ($needleTree as $descendantNode) {
                if (!$descendantNode->save()) {
                    throw new NotSavedData($descendantNode->errors, 400);
                }
            }
            $trx->commit();
        } catch (\Exception $e) {
            $trx->rollBack();
            throw $e;
        }
        return $this;
    }

    private function destendantTree()
    {
        return TableCategoriesTree::find()
            ->where(
                "parent_id=:descendant",
                [':descendant' => $this->id]
            )
            ->all();
    }

    private function parentTree(){

    }

    private function childTree(){

    }
}