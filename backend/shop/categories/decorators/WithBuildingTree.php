<?php


namespace app\shop\categories\decorators;


use app\shop\categories\CategorySql;
use app\shop\categories\contracts\ICategory;
use app\shop\categories\contracts\WeCategories;
use app\tables\TableCategories;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\fields\Field;
use vloop\entities\fields\FieldOfForm;

class WithBuildingTree implements WeCategories
{
    private $origin;

    public function __construct(WeCategories $categories)
    {
        $this->origin = $categories;
    }

    public function add(IForm $categoryForm): TableCategories
    {
        $record = $this->origin->add($categoryForm);
        $category = new CategorySql(new Field('id', $record->id));
        $category->buildTree(
            new FieldOfForm(
                $categoryForm,
                'parentId'
            )
        );
        return $record;
    }

    public function remove(IField $id): void
    {
        $this->origin->remove($id);
    }

    public function find(): ICategory
    {

    }
}