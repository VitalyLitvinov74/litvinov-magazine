<?php


namespace app\models\shop\products;


use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface WeProducts extends PrintYourSelf
{
    public function add(IForm $productModelForm): IProduct;

    /**
     * @return Product[]
     */
    public function list(): array ;

    /**
     * Печатает List в виде вложенного массива
     * @return array
     */
    public function printYourSelf(): array;

    public function product(IField $fieldId): IProduct;
}