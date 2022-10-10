<?php


namespace app\algorithms\trees;


use app\algorithms\trees\structs\NodeOfTree;
use app\models\fields\IField;
use yii\helpers\VarDumper;

class ClosureTree
{
    private $minLevel;
    private $maxLevel;
    private $existedTree;

    /**
     * ClosureTree constructor.
     * @param IField $minLevel
     * @param IField $maxLevel
     * @param NodeOfTree[] $existedTree
     */
    public function __construct(
        IField $minLevel,
        IField $maxLevel,
        array $existedTree = []
    )
    {
        $this->maxLevel = $maxLevel;
        $this->minLevel = $minLevel;
        $this->existedTree = $existedTree;
    }

    /**
     * @param IField $parentId
     * @param IField $nodeId
     * @return NodeOfTree[]
     * @throws \Exception
     */
    public function relateNodes(IField $parentId, IField $nodeId): array
    {
        if (!$this->validated()) {
            throw new \Exception('Not validated tree');
        }
        $missingNodes = [];
        foreach ($this->parentTree($parentId) as $node) {
            foreach ($this->childTree($nodeId) as $childNode) {
                $missingNodes[] = new NodeOfTree(
                    $node->parentId(),
                    $childNode->id(),
                    $childNode->level() + $node->level() + $this->minLevel->asInt()
                );
            }
        }
        $treeAfterRelate = array_merge(
            $missingNodes,
            $this->existedTree
        );

        return $treeAfterRelate;
//        return new self($this->minLevel, $this->maxLevel, $treeAfterRelate);
    }

    /**
     * @param array $comparedArray
     * @return array
     */
    public function removeDublies(array $comparedArray): array {

    }

    /**
     * @param bool $withException - выкидывать ли исключение при ошибке
     * @return bool
     */
    public function validated(bool $withException = false): bool
    {
        return $this->notGrown() and $this->notLooped() and $this->notMissedNodes();
    }

    /**
     * @return bool - проверяет нет ли пропущенных узлов
     */
    private function notMissedNodes(): bool
    {
        return true;
    }

    /**
     * @return bool - проверяет образует ли дерево циклическую связь
     */
    private function notLooped(): bool
    {
        return true;
    }

    /**
     * @return bool - превышает ли новая связь элемента, максимальный размер дерева.
     */
    private function notGrown(): bool
    {
        return true;
    }

    /**
     * @param IField $nodeId
     * @return NodeOfTree[]
     */
    private function parentTree(IField $nodeId): array
    {
        return array_filter(
            $this->existedTree,
            function (NodeOfTree $nodeStruct) use ($nodeId) {
                if ($nodeStruct->id() == $nodeId->asInt()) {
                    return true;
                }
                return false;
            }
        );
    }

    /**
     * @param IField $nodeId
     * @return NodeOfTree[]
     */
    private function childTree(IField $nodeId): array
    {
        return array_filter(
            $this->existedTree,
            function (NodeOfTree $nodeStruct) use ($nodeId) {
                if ($nodeStruct->parentId() == $nodeId->asInt()) {
                    return true;
                }
                return false;
            }
        );
    }
}