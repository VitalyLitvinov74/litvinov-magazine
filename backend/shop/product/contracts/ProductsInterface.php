<?php


namespace app\shop\product\contracts;


use app\tables\TableProducts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use yii\db\Query;

interface ProductsInterface extends AddableProductInterface
{
    public function remove(IField $id): void;

    public function findOne(Query $query): TableProducts;

    /**
     * @return TableProducts[]
     */
    public function findAll(Query $query): array;
}