<?php


namespace app\entities\shop\models;


use vloop\entities\yii2\criteria\IImprovedQuery;

class ProductModels implements IProductModels
{
    public function __construct(IImprovedQuery $query)
    {
    }
}