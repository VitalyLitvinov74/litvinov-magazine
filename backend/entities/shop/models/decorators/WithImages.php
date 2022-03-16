<?php


namespace app\entities\shop\models\decorators;

use app\entities\shop\models\IProductModels;
use app\entities\shop\models\ProductModel;
use vloop\entities\contracts\IForm;

class WithImages implements IProductModels
{
    public function __construct(IProductModels $origin)
    {
    }

    public function add(IForm $productModelForm)
    {
        // TODO: Implement add() method.
    }

    /**
     * @return ProductModel[]
     */
    public function list(): array
    {
        // TODO: Implement list() method.
    }

    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        // TODO: Implement printYourSelf() method.
    }
}