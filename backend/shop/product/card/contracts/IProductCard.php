<?php


namespace app\shop\product\card\contracts;

use app\tables\TableProductImages;
use app\tables\TableProducts;

/**
 * Все свойства доступны через магический метод __get
 * @package app\shop\product\card\contracts
 * @property string $description
 * @property int $id                [int(11)]
 * @property string $title             [varchar(255)]  Наименование товара
 * @property string $short_description Краткое описание товара
 * @property TableProductImages[] $images
 * @property TableProducts[] $products
 */
interface IProductCard
{
    public function asArray(): array;
}