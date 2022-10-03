<?php


namespace app\shop\categories;


use app\shop\categories\contracts\ICategory;
use app\tables\TableCategoriesTree;
use vloop\entities\contracts\IField;

class CategorySql implements ICategory
{
    private $id;

    public function __construct(IField $id)
    {
        $this->id = $id;
    }

    public function buildTree(int $parentId): void
    {
//        $tree = TableCategoriesTree::find()->where([''])->all();

    }
}