<?php


namespace app\shop\product\card\contracts;

use app\models\forms\ProductForm;
use app\tables\TableProductImages;
use app\tables\TableProducts;
use vloop\entities\contracts\IForm;

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
    /**
     * Меняет мета данные продукта
     * @param IForm $form
     * @return $this
     */
    public function change(IForm $form): self;
}