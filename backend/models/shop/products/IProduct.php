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
    public function changeDescription(IForm $changeDescriptionForm): IProduct;

    /**
     * @param IField    $newPrice - новая стоимость продукта
     * @param ICurrency $currency - валюта
     * @return IProduct - вернет копию себя но с изменным изменной стоимостью продукта
     */
    public function changeAPrice(IField $newPrice, ICurrency $currency): IProduct;

    /**
     * @param IField $currentCount - текущее кол-во товара на складе
     * @return IProduct - вернет копию себя, но с изменным кол-вом на складе (либо в броне)
     */
    public function changeCount(IField $currentCount): IProduct;
}