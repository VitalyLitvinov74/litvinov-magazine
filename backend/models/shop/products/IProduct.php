<?php


namespace app\models\shop\products;

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
     * @param IForm $contentProductForm
     * @return IProduct
     */
    public function changeContent(IForm $contentProductForm): IProduct;

    /**
     * @param IForm $imagesForm
     * @return IProduct - возвращает новый объект с измененным изображением.
     */
    public function changeImages(IForm $imagesForm): IProduct;

    /**
     * @param IField $field
     * @return IProduct - продукт.
     */
    public function changeDefaultPrice(IField $field): IProduct;

    /**
     * @param IField $field
     * @return IProduct
     */
    public function changeCount(IField $field): IProduct;
}