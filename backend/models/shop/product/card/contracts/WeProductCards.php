<?php


namespace app\models\shop\product\card\contracts;


use app\tables\RowProductCard;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use yii\db\Query;

interface WeProductCards
{
    public function add(IForm $productCardForm): RowProductCard;

    public function remove(IField $id): void;

    public function find(): Query;
}