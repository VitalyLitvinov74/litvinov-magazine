<?php


namespace app\shop\categories;


use app\algorithms\trees\ClosureTree;
use app\algorithms\trees\MaxTreeLevel;
use app\algorithms\trees\MinTreeLevel;
use app\shop\categories\contracts\ICategory;
use app\tables\TableCategoriesTree;
use vloop\entities\contracts\IField;
use vloop\entities\exceptions\NotSavedData;
use vloop\entities\exceptions\NotValidatedFields;
use Yii;
use yii\db\Exception;
use yii\helpers\VarDumper;

class CategorySql implements ICategory
{
    private $id;
    private $minTreeLevel;
    private $_allRelatedNodes = null;


    public function __construct(IField $id)
    {
        $this->id = $id;
        $this->minTreeLevel = new MinTreeLevel();
        $closureAlgorithm = new ClosureTree(
            new MinTreeLevel(),
            new MaxTreeLevel(),
            
        )
    }

    /**
     * generate Closure table tree
     * @param IField $parentId
     * @return $this
     * @throws \Exception
     */
    public function buildTree(IField $parentId): self
    {
        if (!$this->childExists($this->id)) {
            $needleTree = $this->simpleTree($parentId, $this->id);
        }else{
            $needleTree = array_merge(
                $this->simpleTree($parentId, $this->id),
                $this->clonnedChildTree($parentId, $this->id)
            );
            if($this->closuresTree($needleTree, $parentId)){
                throw new Exception("Цепочка не может быть создана, т.к. она замыеается");
            }
        }
        try {
            foreach ($needleTree as $descendantNode) {
                if (!$descendantNode->save()) {
                    throw new NotSavedData($descendantNode->errors, 400);
                }
            }
//            $trx->commit();
        } catch (\Exception $e) {
//            $trx->rollBack();
//            throw $e;
        }
        return $this;
    }

    /**
     * @param TableCategoriesTree[] $categoriesTree
     * @param IField $parentId - валидируемый родитель
     * @return bool - проверка замыкания цепочки категорий. (цепочка не должна замыкаться),
     * т.е. никто в цепочке не должен иметь дочернего элемента в виде родителя
     */
    private function closuresTree(array $categoriesTree, IField $parentId): bool
    {
        foreach ($categoriesTree as $treeNode) {
            if($treeNode->child_id == $parentId->value()){
                return false;
            }
        }
        return true;
    }

    /**
     * @param IField $parentId
     * @return bool - проверяет есть ли потомки у родителя
     */
    private function childExists(IField $parentId): bool
    {
        return TableCategoriesTree::find()->where(['parent_id' => $parentId->value()])->exists();
    }

    private function simpleTree(IField $parentId, IField $childId): array
    {
        return [
            new TableCategoriesTree([
                'parent_id' => $parentId->value(),
                'child_id' => $childId->value(),
                'level' => $this->minTreeLevel->value()
            ])
        ];
    }

    /**
     * @param IField $nodeId
     * @return TableCategoriesTree[] - возвращает все связанные с категорией ноды(подкатегории или ее родителей)
     */
    private function allRelatedNodes(IField $nodeId): array
    {
        if(is_null($this->_allRelatedNodes)){
            $this->_allRelatedNodes = TableCategoriesTree::find()
                ->where(['parent_id'=>$nodeId->value()])
                ->all();
        }
        return $this->_allRelatedNodes;
    }

    /**
     * @param IField $childId
     * @return TableCategoriesTree[]
     */
    private function clonnedChildTree(IField $parendId, IField $childId): array {
        $relatedNodes = $this->allRelatedNodes($childId);
        $childTree = [];
        foreach ($relatedNodes as $node){
            $childTree[] = new TableCategoriesTree([
                'parent_id' => $parendId->value(),
                'child_id' => $node->child_id,
                'level' => ++$node->level
            ]);
        }
        return $childTree;
    }

}