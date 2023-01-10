<?php

namespace app\controllers\v1;

use app\shop\carts\Cart;
use vloop\entities\fields\Field;
use vloop\entities\fields\FieldOfForm;
use yii\rest\Controller;

class CartController extends Controller
{
    public function actionAddToCart(){
        $cart = new Cart(
            new FieldOfForm(
                $addToCartForm = new AddToCartForm(),
                'customerToken'
            )
        );
        $cart->addEquipment(
            new FieldOfForm(
                $addToCartForm,
                'equipmentId'
            )
        );
    }
}