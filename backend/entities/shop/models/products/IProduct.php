<?php


namespace app\entities\shop\models;

use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface IProduct extends PrintYourSelf
{
    public function printYourSelf(): array;

    /**
     * @param IForm $changeDescriptionForm - форма, с валидными полями.
     * @return IProduct - вернет копию себя но с изменным описанием, а сам прекратит существовать
     */
    public function changeContent(IForm $changeDescriptionForm): IProduct;

    /**
     * Возвращает комплектации товаров
     * комлпектация в свою очередь зависит от установленных аттрибутов
     * @return
     */
    public function goodsPicking():array;

    /**
     * Возвращает характеристику товара
     * @return array
     */
    public function characteristics(): array ;
}