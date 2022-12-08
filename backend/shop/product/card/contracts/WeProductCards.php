<?php


namespace app\shop\product\card\contracts;


use app\tables\TableProductCard;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use yii\db\Query;

interface WeProductCards
{
    /**
     * @param IForm $productCardForm
     * @return IProductCard
     */
    public function add(IForm $productCardForm): IProductCard;

    public function remove(IField $id): void;

    public function findBy(): Query;
}