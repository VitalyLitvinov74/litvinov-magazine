<?php


namespace app\models\shop\product\contracts;


use vloop\PrintYourSelf\PrintYourSelf;

interface IWarehouse extends PrintYourSelf
{
    /**
     * @return IProduct[]
     */
    public function list(): array ;
}