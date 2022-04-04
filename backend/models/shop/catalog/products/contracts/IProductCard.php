<?php


namespace app\models\shop\catalog\products\contracts;


use app\models\contracts\ToTrash;
use vloop\PrintYourSelf\PrintYourSelf;

interface IProductCard extends PrintYourSelf, ToTrash
{
    public function changeDescriptions(): IProductCard;

    public function changeTitle(): IProductCard;
}