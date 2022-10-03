<?php


namespace app\shop\categories\contracts;


use app\shop\categories\CategorySql;
use app\tables\TableCategories;
use yii\db\Query;

interface WeCategories
{
    public function __construct();

    public function add(): TableCategories;

    public function remove(): void;

    public function find(): ICategory;
}