<?php


namespace app\shop\product\card\contracts;


use app\tables\TableProductCard;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use yii\db\Query;

interface WeProductCards
{
    public function add(IForm $productCardForm): TableProductCard;

    public function remove(IField $id): void;

    public function findOne(Query $query): TableProductCard;

    /**
     * @return TableProductCard[]
     */
    public function findAll(Query $query): array;
}