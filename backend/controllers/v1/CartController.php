<?php

namespace app\controllers\v1;

use app\models\forms\AddToCartForm;
use app\shop\carts\Cart;
use app\shop\carts\decorators\WithInStockEquipments;
use app\shop\carts\decorators\WithDbUniqueEquipments;
use app\shop\product\equipments\EquipmentList;
use app\tables\TableEquipments;
use vloop\entities\fields\Field;
use vloop\entities\fields\FieldOfForm;
use yii\rest\Controller;

class CartController extends Controller
{
    public function actionAddEquipment()
    {
        $cart =
            new WithInStockEquipments( //с имеющимися остатками комплектацией продуктов
                new WithDbUniqueEquipments( // с уникальной комплектацией продукта, т.е. на уровне бд не создается дублирующая запись а меняется кол-во
                    new Cart( // корзина
                        new FieldOfForm(
                            $addToCartForm = new AddToCartForm(),
                            'customerToken'
                        ),
                        new FieldOfForm(
                            $addToCartForm,
                            'cartToken'
                        ),

                    )
                )
            );
        $cart->addEquipment($addToCartForm);
    }
}