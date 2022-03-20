<?php


namespace app\models\shop\products\descriptions;


use vloop\PrintYourSelf\PrintYourSelf;

interface IProductLabel extends PrintYourSelf
{
    public function changeDescription();

    public function changeTitle();

    public function changeShortDescription();
}