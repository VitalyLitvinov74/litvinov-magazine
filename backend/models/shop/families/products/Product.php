<?php


namespace app\models\shop\families\products;


use app\models\shop\families\products\contracts\IProduct;
use vloop\entities\contracts\IField;

class Product implements IProduct
{
    public function __construct()
    {

    }

    public function remove(): void
    {
        // TODO: Implement remove() method.
    }

    /**
     * @param IField $newCount
     * @return IProduct - возвращает новый объект с изменным кол-вом продукта
     */
    public function changeCount(IField $newCount): IProduct
    {
        // TODO: Implement changeCount() method.
    }

    /**
     * @param IField $newPrice
     * @return IProduct - вернет новый объект с измененной ценой
     */
    public function changePrice(IField $newPrice): IProduct
    {
        // TODO: Implement changePrice() method.
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