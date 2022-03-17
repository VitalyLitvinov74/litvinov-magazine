<?php


namespace app\models\shop\products;


use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface WeProducts extends PrintYourSelf
{
    public function add(IForm $productModelForm);

    /**
     * @return Product[]
     */
    public function list(): array ;
}