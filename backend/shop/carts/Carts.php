<?php

namespace app\shop\carts;

use app\shop\carts\contracts\WeCarts;
use app\tables\TableCarts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotSavedData;
use yii\db\ActiveQuery;
use yii\db\Query;

class Carts implements WeCarts
{

    public function add(IForm $form): TableCarts
    {
        $cartStruct = new TableCarts($form->validatedFields());
        if ($cartStruct->save()) {
            return $cartStruct;
        }
        throw new NotSavedData($cartStruct->getErrors(), 403);
    }

    public function remove(IField $cartId): void
    {
        $cart = $this->findOne(TableCarts::find()->where(['id' => $cartId->asInt()]));
        if ($cart) {
            $cart->delete();
            return;
        }
        throw new NotFoundEntity('Корзина не найдена', 'Не удалось удалить корзину');
    }

    public function findOne(ActiveQuery $query): TableCarts
    {
        $cart = $query->one();
        if($cart){
            return $cart;
        }
        throw new NotFoundEntity("Не удалось найти корзину пользователя");
    }
}