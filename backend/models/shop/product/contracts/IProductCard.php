<?php


namespace app\models\shop\product\contracts;


use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface IProductCard extends PrintYourSelf
{
    public function id(): int;

    public function remove(): void;
}