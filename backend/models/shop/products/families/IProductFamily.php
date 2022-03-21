<?php


namespace app\models\shop\products\families;


use vloop\entities\contracts\IField;
use vloop\PrintYourSelf\PrintYourSelf;

interface IProductFamily extends PrintYourSelf
{
    /**
     * Удалит семейство продуктов из системы.
     */
    public function remove(): void ;
}