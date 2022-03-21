<?php


namespace app\models\shop\products\images;


use vloop\PrintYourSelf\PrintYourSelf;

interface IImage extends PrintYourSelf
{
    public function remove(): void;
}