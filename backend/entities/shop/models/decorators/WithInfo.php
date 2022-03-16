<?php


namespace app\entities\shop\models\decorators;


use app\entities\shop\models\IProductModels;

class WithInfo implements IProductModels
{
    public function __construct(IProductModels $origin)
    {
    }
}