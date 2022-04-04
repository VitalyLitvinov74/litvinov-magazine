<?php


namespace app\models\shop\images\contracts;


use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface IGallery extends PrintYourSelf
{
    /**
     * @return IImage[]
     */
    public function list(): array;

    public function printYourSelf(): array;
}