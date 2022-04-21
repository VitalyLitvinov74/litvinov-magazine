<?php


namespace app\models\shop\contracts;


use app\models\shop\product\card\contracts\IProductCard;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\PrintYourSelf\PrintYourSelf;

interface ICatalog extends PrintYourSelf
{
    public function list();
}