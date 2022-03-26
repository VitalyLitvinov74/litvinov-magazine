<?php


namespace app\models\shop\families\products\contracts;


use vloop\entities\contracts\IField;
use vloop\PrintYourSelf\PrintYourSelf;

interface IProduct extends PrintYourSelf
{
    public function remove(): void;

    /**
     * @param IField $newCount
     * @return IProduct - возвращает новый объект с изменным кол-вом продукта
     */
    public function changeCount(IField $newCount): IProduct;

    /**
     * @param IField $newPrice
     * @return IProduct - вернет новый объект с измененной ценой
     */
    public function changePrice(IField $newPrice): IProduct;
}