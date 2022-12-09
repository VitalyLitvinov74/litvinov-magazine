<?php


namespace app\shop\product\card\contracts;


use app\tables\TableProductCard;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use yii\db\Query;

interface WeProductCards
{
    public function add(IForm $productCardForm): IProductCard;

    public function remove(IField $id): void;
}