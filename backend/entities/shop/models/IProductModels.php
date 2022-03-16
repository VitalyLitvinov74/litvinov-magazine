<?php


namespace app\entities\shop\models;


use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface IProductModels extends PrintYourSelf
{
    public function add(IForm $productModelForm);

    /**
     * @return ProductModel[]
     */
    public function list(): array ;
}