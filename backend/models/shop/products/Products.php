<?php


namespace app\models\shop\products;


use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;

class Products implements WeProducts
{


    /**
     * @return array - printing self as array, for frontend.
     *               or represents an object as an array
     */
    public function printYourSelf(): array
    {
        // TODO: Implement printYourSelf() method.
    }

    /**
     * @return IProduct[]
     */
    public function list(): array
    {
        // TODO: Implement list() method.
    }

    /**
     * @param IForm $productForm
     * @return WeProducts - вернет новый объект с добавленными продуктами/товарами.
     */
    public function addProducts(IForm $productForm): WeProducts
    {
        // TODO: Implement addProducts() method.
    }

    /**
     * @param IField $id
     * @return IProduct - Товар полученный из текущей коллекции взятый по ид.
     */
    public function product(IField $id): IProduct
    {
        // TODO: Implement product() method.
    }
}