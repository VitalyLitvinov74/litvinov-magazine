<?php


namespace app\shop\product\contracts;

use app\models\forms\ChangeProductForm;
use app\models\forms\CreateProductForm;
use app\models\structs\ProductStruct;
use app\tables\TableEquipmentImages;
use app\tables\TableEquipments;
use vloop\entities\contracts\IForm;

/**
 * Все свойства доступны через магический метод __get
 * @package app\shop\product\card\contracts
 * @property string $description
 * @property int $id                [int(11)]
 * @property string $title             [varchar(255)]  Наименование товара
 * @property string $short_description Краткое описание товара
 * @property TableEquipmentImages[] $images
 * @property TableEquipments[] $products
 */
interface ProductInterface
{
    /**
     * Меняет мета данные продукта
     * @param IForm $form
     * @return $this
     */
    public function change(ChangeProductForm $productForm): self;
}