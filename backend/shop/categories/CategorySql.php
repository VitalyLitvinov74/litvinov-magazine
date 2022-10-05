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
     * generate Clousure table tree
     * @param IField $parentId
     * @return $this
     * @throws \Exception
     */
    public function buildTree(IField $parentId): self
    {

        $simpleTree = new TableCategoriesTree([
            'child_id' => $this->id->value(),
            'parent_id' => $parentId->value(),
            'level' => $this->minTreeLevel->value()
        ]);
        $parentSimpleTries = TableCategoriesTree::find()
            ->where(
                "child_id=:childId",
                ['childId' => $parentId]
            )->all();
        $generalTrees = [];
        foreach ($parentSimpleTries as $parentTree) {
            $generalTrees[] = new TableCategoriesTree([
                "parent_id" => $parentTree->parent_id,
                "child_id" => $this->id->value(),
                'level' => $parentTree->level + 1
            ]);
        }
        $allTries = array_merge([$simpleTree], $generalTrees);
        $trx = Yii::$app->db->beginTransaction();
        try {
            foreach ($allTries as $tree) {
                /**@var TableCategoriesTree $tree */
                if (!$tree->save()) {
                    throw new NotSavedData($tree->getErrors(), 400);
                }
            }
            $trx->commit();
        } catch (\Exception $exception) {
            $trx->rollBack();
            throw $exception;
        }
        return $this;
    }
}