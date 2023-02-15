<?php

namespace app\controllers\v1;

use app\models\forms\EquipmentInCartForm;
use app\shop\carts\Cart;
use app\shop\carts\contracts\ICart;
use app\shop\carts\decorators\WithInStockEquipments;
use app\shop\carts\decorators\WithUniqueEquipments;
use app\shop\product\equipments\EquipmentList;
use app\tables\TableEquipments;
use vloop\entities\fields\Field;
use vloop\entities\fields\FieldOfForm;
use yii\rest\Controller;

class CartController extends Controller
{
    public function actionAddEquipment()
    {
       $this->cart()
           ->addEquipment(new EquipmentInCartForm());
    }

    public function actionRemoveEquipment()
    {
        $this->cart()
            ->removeEquipment(new EquipmentInCartForm());
    }

    private function cart(): ICart
    {
        return new WithInStockEquipments( //с имеющимися остатками комплектацией продуктов
            new WithUniqueEquipments( // с уникальной комплектацией продукта, т.е. на уровне бд не создается дублирующая запись а меняется кол-во
                new Cart( // корзина
                    new FieldOfForm(
                        $addToCartForm = new EquipmentInCartForm(),
                        'customerToken'
                    ),
                    new FieldOfForm(
                        $addToCartForm,
                        'cartToken'
                    ),

                )
            )
        );
    }
}