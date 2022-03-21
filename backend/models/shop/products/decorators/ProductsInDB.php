<?php


namespace app\models\shop\products\decorators;


use app\models\shop\products\IProduct;
use app\models\shop\products\WeProducts;
use vloop\entities\contracts\IField;

class ProductsInDB implements WeProducts
{
    public function __construct(WeProducts $origin)
    {
    }

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
     * @param IProduct[] $products
     * @return WeProducts - вернет новый объект с добавленными продуктами/товарами.
     */
    public function mergeProducts(array $products): WeProducts
    {
        //Здесь Сейвит продукты
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