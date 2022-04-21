<?php
namespace app\models\shop\product\decorators;

use app\models\shop\product\contracts\IProduct;
use vloop\entities\contracts\IField;

class WithGallery implements IProduct
{
    public function __construct()
    {
        
    }

    /**
     * @param IField $newPrice - - число умноженное на 100
     * @return IProduct
     */
    public function changePrice(IField $newPrice): IProduct
    {
        // TODO: Implement changePrice() method.
    }

    /**
     * @param IField $newCount - кол-во товара гтоового к продаже (с учетом брони).
     * @return IProduct
     */
    public function changeCount(IField $newCount): IProduct
    {
        // TODO: Implement changeCount() method.
    }

    /**
     * Копирует текущий объект в систему.
     * @return IProduct
     */
    public function copyToSystem(): IProduct
    {
        // TODO: Implement copyToSystem() method.
    }

    /**
     * Переносит объект в корзину
     */
    public function moveToTrash(): void
    {
        // TODO: Implement moveToTrash() method.
    }
}