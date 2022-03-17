<?php


namespace app\models\shop\products\decorators;


use app\models\shop\products\IProduct;
use app\models\shop\products\Product;
use app\models\shop\products\WeProducts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;

class ImproveProducts implements WeProducts
{
    public function __construct(WeProducts $products)
    {

    }

    public function add(IForm $productModelForm): IProduct
    {
        // TODO: Implement add() method.
    }

    /**
     * @return Product[]
     */
    public function list(): array
    {
        // TODO: Implement list() method.
    }

    /**
     * Печатает List в виде вложенного массива
     * @return array
     */
    public function printYourSelf(): array
    {
        // TODO: Implement printYourSelf() method.
    }

    public function product(IField $fieldId): IProduct
    {
        // TODO: Implement product() method.
    }
}