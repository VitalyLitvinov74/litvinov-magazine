<?php


namespace app\models\shop\products\contracts;


use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use yii\db\Query;

interface WeProductCards
{
    public function add(IForm $form): IProductCard;

    public function remove(IField $id): void;

    public function listByQuery(Query $query);
}