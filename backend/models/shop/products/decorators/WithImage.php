<?php


namespace app\models\shop\products\decorators;


use app\models\shop\products\IProduct;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;

class WithImage implements IProduct
{

    /**
     * @param IForm $contentProductModelForm - форма которая содеражит в себе поля description, short_description, title
     * @return IProduct
     */
    public function changeContent(IForm $contentProductModelForm): IProduct
    {
        // TODO: Implement changeContent() method.
    }



    /**
     * @param IField $newPrice - Поле с новой стоимостью
     * @return IProduct - продукт.
     */
    public function changeDefaultPrice(IField $field): IProduct
    {
        // TODO: Implement changeDefaultPrice() method.
    }

    /**
     * @param IField $field
     * @return IProduct
     */
    public function changeCount(IField $field): IProduct
    {
        // TODO: Implement changeCount() method.
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
     * @param IForm $imagesForm
     * @return IProduct - возвращает новый объект с измененным изображением.
     */
    public function changeImages(IForm $imagesForm): IProduct
    {
        // TODO: Implement changeImages() method.
    }
}