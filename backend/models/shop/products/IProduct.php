<?php


namespace app\models\shop\products;


use app\models\currencies\ICurrency;
use vloop\entities\contracts\IField;
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
}