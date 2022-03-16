<?php


namespace app\entities\shop\models;

use app\entities\shop\models\information\IProductInformation;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

/**
 * Не путать с моделями yii2
 * Этот контракт описывает работы семейства продукта.
 */
interface IProductModel extends PrintYourSelf
{
    /**
     * @param IForm $contentProductModelForm - форма которая содеражит в себе поля description, short_description, title
     * @return IProductModel
     */
    public function changeContent(IForm $contentProductModelForm): IProductModel;

    public function changeImages(): IProductModel;
}