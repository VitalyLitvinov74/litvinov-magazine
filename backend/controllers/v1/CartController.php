<?php

namespace app\controllers\v1;

use app\models\forms\AddToCartForm;
use app\shop\carts\Cart;
use vloop\entities\fields\Field;
use vloop\entities\fields\FieldOfForm;
use yii\rest\Controller;

class CartController extends Controller
{
    public function actionAddEquipment(){
        $cart = new Cart(
            new FieldOfForm(
                $addToCartForm = new AddToCartForm(),
                'cartToken'
            )
        );
        $cart->addEquipment($addToCartForm);
    }
}