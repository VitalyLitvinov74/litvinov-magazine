<?php


namespace app\models\shop\products;

use app\models\shop\products\information\IProductInformation;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

/**
 * Не путать с моделями yii2
 * Этот контракт описывает работы семейства продукта.
 */
interface IProduct extends PrintYourSelf
{
    /**
     * @param IForm $contentProductModelForm - форма которая содеражит в себе поля description, short_description, title
     * @return IProduct
     */
    public function changeContent(IForm $contentProductModelForm): IProduct;

    public function changeImages(): IProduct;

    /**
     * @param IField $newPrice - Поле с новой стоимостью
     * @return IProduct - продукт.
     */
    public function changeDefaultPrice(IField $field): IProduct;
}