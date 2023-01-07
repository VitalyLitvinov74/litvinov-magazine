<?php

namespace app\shop\carts;

use app\shop\carts\contracts\WeCarts;
use app\tables\TableCarts;
use vloop\entities\contracts\IField;
use vloop\entities\contracts\IForm;
use vloop\entities\exceptions\NotFoundEntity;
use vloop\entities\exceptions\NotSavedData;

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
        $cart = TableCarts::find()->where(['id' => $cartId->asInt()])->one();
        if ($cart) {
            $cart->delete();
            return;
        }
        throw new NotFoundEntity('Корзина не найдена', 'Не удалось удалить корзину');
    }
}