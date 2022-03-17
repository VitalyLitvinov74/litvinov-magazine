<?php


namespace app\models\shop\products;


use vloop\entities\yii2\criteria\IImprovedQuery;

class Products implements WeProducts
{
    public function __construct(IImprovedQuery $query)
    {
    }
}