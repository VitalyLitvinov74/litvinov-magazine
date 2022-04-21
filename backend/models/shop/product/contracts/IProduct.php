<?php


namespace app\models\shop\product\contracts;


use app\models\trash\ITrash;
use vloop\entities\contracts\IField;
use vloop\PrintYourSelf\PrintYourSelf;

interface IProduct extends ITrash
{
    /**
     * @param IField $newPrice - - число умноженное на 100
     * @return IProduct
     */
    public function changePrice(IField $newPrice): IProduct;

    /**
     * @param IField $newCount - кол-во товара гтоового к продаже (с учетом брони).
     * @return IProduct
     */
    public function changeCount(IField $newCount): IProduct;

    /**
     * Копирует текущий объект в систему.
     * @return IProduct
     */
    public function copyToSystem(): IProduct;
}