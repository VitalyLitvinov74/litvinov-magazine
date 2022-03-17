<?php


namespace app\models\shop\products\decorators;


use app\models\shop\products\WeProducts;

class WithInfo implements WeProducts
{
    public function __construct(WeProducts $origin)
    {
    }
}