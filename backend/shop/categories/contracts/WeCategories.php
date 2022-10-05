<?php


namespace app\shop\categories\contracts;


use app\shop\categories\CategorySql;
use app\tables\TableCategories;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use yii\db\Query;

interface WeCategories
{
    public function add(IForm $categoryForm): TableCategories;

    public function remove(IField $id): void;

    public function find();
}