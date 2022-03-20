<?php
namespace app\models\shop\products;

use vloop\entities\contracts\IField;
use vloop\PrintYourSelf\PrintYourSelf;

interface IProduct extends PrintYourSelf
{
    public function changeCount(IField $newCount): IProduct;

    public function changePrice(IField $newPrice): IProduct;

    /**
     * Удаляет себя из системы, при этом вызывая деструктор
     */
    public function remove(): void;
}