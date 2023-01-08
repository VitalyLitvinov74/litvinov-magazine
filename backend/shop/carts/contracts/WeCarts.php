<?php

namespace app\shop\carts\contracts;

use app\tables\TableCarts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use yii\db\ActiveQuery;
use yii\db\Query;

interface WeCarts
{
    public function add(IForm $form): TableCarts;

    public function remove(IField $cartId): void;

    public function findOne(ActiveQuery $query): TableCarts;
}